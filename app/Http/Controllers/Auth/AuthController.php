<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the login interface.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return view('auth.login');
    }

    /**
     * Display the registration interface for enterprise clients.
     */
    public function showRegisterForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return view('auth.register');
    }

    /**
     * Handle enterprise client registration.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'company_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:32'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'terms.accepted' => 'You must accept the Terms of Service and Privacy Policy to create an account.',
        ]);

        $user = User::create([
            'name' => strip_tags($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'password' => $validated['password'], // auto-hashed by User model cast
            'role' => User::ROLE_CUSTOMER,
            'phone' => $validated['phone'] ?? null,
            'status' => User::STATUS_ACTIVE,
            'email_verified_at' => now(),
        ]);

        // If an existing lead matches this email, associate customer_id
        \App\Models\Lead::where('contact_email', $user->email)
            ->whereNull('customer_id')
            ->update(['customer_id' => $user->id]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('client.dashboard')->with(
            'success',
            'Welcome to NileBridge Global! Your enterprise client account has been created successfully.'
        );
    }

    /**
     * Handle authentication attempt.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'status' => User::STATUS_ACTIVE], $remember)) {
            $request->session()->regenerate();

            return $this->redirectBasedOnRole(Auth::user());
        }

        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'The provided credentials do not match our records or your account is inactive.',
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been successfully logged out.');
    }

    /**
     * Route user directly to their respective persona portal.
     */
    protected function redirectBasedOnRole(User $user): RedirectResponse
    {
        return match ($user->role) {
            User::ROLE_ADMIN => redirect()->intended(route('admin.dashboard')),
            User::ROLE_EMPLOYEE => redirect()->intended(route('portal.dashboard')),
            User::ROLE_CUSTOMER => redirect()->intended(route('client.dashboard')),
            default => redirect()->route('home'),
        };
    }
}


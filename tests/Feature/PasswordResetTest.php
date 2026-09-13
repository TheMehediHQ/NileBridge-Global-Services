<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_forgot_password_screen_can_be_rendered(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
        $response->assertSee('Reset Password');
        $response->assertSee('Corporate Email Address');
    }

    public function test_password_reset_link_can_be_requested(): void
    {
        $user = User::factory()->create([
            'email' => 'operations@nilebridge.com',
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_ACTIVE,
        ]);

        $response = $this->post('/forgot-password', [
            'email' => $user->email,
        ]);

        $response->assertSessionHas('status');
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        $response = $this->get('/reset-password/sample-test-token?email=operations@nilebridge.com');

        $response->assertStatus(200);
        $response->assertSee('Set New Password');
        $response->assertSee('operations@nilebridge.com');
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        $user = User::factory()->create([
            'email' => 'client@enterprise.com',
            'password' => Hash::make('old-secret-password'),
            'role' => User::ROLE_CUSTOMER,
            'status' => User::STATUS_ACTIVE,
        ]);

        $token = Password::createToken($user);

        $response = $this->post('/reset-password', [
            'token' => $token,
            'email' => $user->email,
            'password' => 'NewEnterprisePassword123!',
            'password_confirmation' => 'NewEnterprisePassword123!',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('status');
        $this->assertTrue(Hash::check('NewEnterprisePassword123!', $user->fresh()->password));
    }

    public function test_password_cannot_be_reset_with_invalid_token(): void
    {
        $user = User::factory()->create([
            'email' => 'client@enterprise.com',
            'password' => Hash::make('original-password'),
        ]);

        $response = $this->post('/reset-password', [
            'token' => 'invalid-token-string',
            'email' => $user->email,
            'password' => 'NewEnterprisePassword123!',
            'password_confirmation' => 'NewEnterprisePassword123!',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertTrue(Hash::check('original-password', $user->fresh()->password));
    }
}


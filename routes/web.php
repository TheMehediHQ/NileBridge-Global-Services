<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Public\LandingPageController;
use App\Http\Controllers\Public\LeadCaptureController;
use App\Http\Controllers\Public\ServiceController;
use App\Http\Controllers\Public\IndustryController;
use App\Http\Controllers\Public\ResourceController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Employee\LeadController as EmployeeLeadController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

/*
|--------------------------------------------------------------------------
| Public Landing & Lead Capture Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('/leads', [LeadCaptureController::class, 'store'])->name('leads.store');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');
Route::get('/resources/calculator', [ResourceController::class, 'calculator'])->name('resources.calculator');
Route::get('/resources/bpo-guide', [ResourceController::class, 'bpoGuide'])->name('resources.bpo-guide');
Route::get('/resources/case-studies', [ResourceController::class, 'caseStudies'])->name('resources.case-studies');
Route::get('/resources/insights', [ResourceController::class, 'insights'])->name('resources.insights');
Route::get('/privacy-policy', function () {
    return view('pages.privacy');
})->name('privacy');
Route::get('/terms-of-service', function () {
    return view('pages.terms');
})->name('terms');

/*
|--------------------------------------------------------------------------
| Authentication Gateway
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Operations Portal (`/admin` prefix)
| Role Guard: Strictly 'admin'
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/', [AdminLeadController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [AdminLeadController::class, 'index']);
        Route::get('/leads/export', [AdminLeadController::class, 'export'])->name('leads.export');
        Route::get('/leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
        Route::post('/leads/{lead}/assign', [AdminLeadController::class, 'assign'])->name('leads.assign');
        Route::patch('/leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
        Route::post('/leads/{lead}/notes', [AdminLeadController::class, 'addNote'])->name('leads.notes.store');
    });

/*
|--------------------------------------------------------------------------
| Employee Operations Portal (`/portal` prefix)
| Role Guard: 'employee' (Admin authorized via role parameter fallback)
|--------------------------------------------------------------------------
*/
Route::prefix('portal')
    ->name('portal.')
    ->middleware(['auth', 'role:employee,admin'])
    ->group(function () {
        Route::get('/', [EmployeeLeadController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [EmployeeLeadController::class, 'index']);
        Route::get('/leads/{lead}', [EmployeeLeadController::class, 'show'])->name('leads.show');
        Route::patch('/leads/{lead}/status', [EmployeeLeadController::class, 'updateStatus'])->name('leads.status');
        Route::post('/leads/{lead}/notes', [EmployeeLeadController::class, 'storeNote'])->name('leads.notes.store');
    });

/*
|--------------------------------------------------------------------------
| Customer Portal (`/client` prefix)
| Role Guard: Strictly 'customer'
|--------------------------------------------------------------------------
*/
Route::prefix('client')
    ->name('client.')
    ->middleware(['auth', 'role:customer'])
    ->group(function () {
        Route::get('/', [CustomerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [CustomerDashboardController::class, 'index']);
    });

<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BillingController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('LandingPage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        // 'laravelVersion' => Application::VERSION,
        // 'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
    Route::get('/accounts/search/{searchKey}', [AccountController::class, 'search']);
    Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create')->middleware(['permission:create']);
    Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store')->middleware(['permission:create']);
    Route::get('/accounts/view/{account}', [AccountController::class, 'edit'])->name('accounts.edit')->middleware(['permission:view']);
    Route::patch('/accounts/{account}', [AccountController::class, 'update'])->name('accounts.update')->middleware(['permission:edit']);
    Route::post('/accounts/toggle/{account}', [AccountController::class, 'toggleActive'])->name('accounts.toggle')->middleware(['permission:edit']);
    Route::delete('/accounts/{account}', [AccountController::class, 'destroy'])->name('accounts.delete')->middleware('permission:delete');
    
    // Route::get('/accounts/view/{account}/billings', [BillingController::class, 'index'])->name('billings')->middleware(['permission:view']);
    // Route::get('/accounts/view/{account}/billings/send-notice-of-disconnection', [BillingController::class, 'send'])->middleware(['role:editor|admin']);
    Route::group(['middleware' => ['role:editor|admin']], function () {
        Route::get('/accounts/view/{account}/billings', [BillingController::class, 'index'])->name('billings');
        Route::get('/accounts/view/{account}/billings/send-notice-of-disconnection', [BillingController::class, 'send']);
    });
});

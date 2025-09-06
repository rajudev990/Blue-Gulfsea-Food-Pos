<?php


use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\ShopProfileController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Route::get('/cmd', function () {
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Done';
});


// Shop
Route::get('/', [WebsiteController::class, 'home'])->name('index');

Route::post('/shop/login', [LoginController::class, 'shoplogin'])->name('shop.login');
Route::post('/shop/logout', [LoginController::class, 'shoplogout'])->name('shop.logout');


Route::prefix('shop')
    ->middleware(['auth:shop'])
    ->name('shop.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('shop.dashboard');
        })->name('dashboard');

        Route::get('/profile/settings', [ShopProfileController::class, 'settings'])->name('profile.settings');
        Route::put('/profile/settings', [ShopProfileController::class, 'updateSettings'])->name('profile.settings.update');

        Route::get('/change-password', [ShopProfileController::class, 'changePassword'])->name('change.password');
        Route::put('/change-password', [ShopProfileController::class, 'updatePassword'])->name('change.password.update');
    });



Auth::routes(['verify' => true]);


// Route::middleware(['auth', 'no.admin', 'verified'])->group(function () {
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home');

//     Route::get('settings', [HomeController::class, 'settings'])->name('user.settings');
//     Route::get('profile', [HomeController::class, 'profile'])->name('user.profile');
//     Route::get('profile/edit', [HomeController::class, 'profileEdit'])->name('user.profile.edit');
//     Route::put('/profile/update', [HomeController::class, 'update'])->name('user.profile.update');
//     Route::get('password/edit', [HomeController::class, 'passwordEdit'])->name('user.password.edit');
//     Route::post('/password-update', [HomeController::class, 'updatePassword'])->name('user.password.update');
// });



// Admin Auth
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')
    // ->middleware(['auth:admin', 'admin.only', 'role:super-admin'])
    ->middleware(['auth:admin', 'admin.only', 'admin.has.role'])
    ->name('admin.')
    ->group(function () {


        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/profile/settings', [AdminProfileController::class, 'settings'])->name('profile.settings');
        Route::put('/profile/settings', [AdminProfileController::class, 'updateSettings'])->name('profile.settings.update');

        Route::get('/change-password', [AdminProfileController::class, 'changePassword'])->name('change.password');
        Route::put('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change.password.update');


        Route::resource('settings', SettingController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        // Shop
        Route::resource('shops', ShopController::class);
        Route::post('shops/status-update', [ShopController::class, 'updateStatus'])->name('shops.status.update');


        Route::resource('units', UnitController::class);
        Route::resource('products', ProductController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('purchases', PurchaseController::class);
        Route::resource('sales', SalesController::class);
        Route::resource('stocks', StockController::class);
        Route::resource('reports', ReportController::class);
    });


// php artisan migrate:refresh --path=database/migrations/2025_05_12_061213_create_dps_members_table.php

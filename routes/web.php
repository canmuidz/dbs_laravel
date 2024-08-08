<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\BannerController;

use App\Http\Controllers\Admin\BaiVietController;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\BinhLuanController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Middleware\AdminRoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('auth', function () {
//     return view('auth');
// });
// Route::get('/', function () {
//     return view('clients.pages.home');
// });



Route::get('login', [AuthController::class, 'showFormLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');;
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// login bằng google
Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// login bằng facebook
// Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook'])->name('auth.facebook');
// Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback'])->name('auth.facebook.callback');



// đăng nhâp của  user về home
Route::get('/home', [HomeController::class, 'index'])->name('clients.pages.home');

// Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'account_show'])->name('account.quanlytaikhoan.home');
    Route::get('/myaccount', [AccountController::class, 'account_show'])->name('account.quanlytaikhoan.myaccount');
    Route::post('/myaccount', [AccountController::class, 'updateAvatar'])->name('account.quanlytaikhoan.myaccount');
    Route::put('/account/update/{id}', [AuthController::class, 'update_account'])
    ->name('account.quanlytaikhoan.myaccount.update_account');
  

});





// Route::get('/admins', [DanhMucController::class, 'index'])->name('dashborad');

//route admin
Route::middleware(['auth', 'auth.admin'])
    ->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/dashboard', [AuthController::class, 'account_show'])->name('dashboard');

        // Route Danh Mục của Admin
        Route::prefix('danhmucs')
            ->as('danhmucs.')
            ->group(function () {
                Route::get('/', [DanhMucController::class, 'index'])->name('index');
                Route::get('/create', [DanhMucController::class, 'create'])->name('create');
                Route::post('/store', [DanhMucController::class, 'store'])->name('store');
                Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
                Route::get('{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [DanhMucController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
            });
        //              // Route của sản Phẩm admin
        Route::prefix('sanphams')
            ->as('sanphams.')
            ->group(function () {
                Route::get('/', [SanPhamController::class, 'index'])->name('index');
                Route::get('/create', [SanPhamController::class, 'create'])->name('create');
                Route::post('/store', [SanPhamController::class, 'store'])->name('store');
                Route::get('/show/{id}', [SanPhamController::class, 'show'])->name('show');
                Route::get('{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [SanPhamController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
            });


        Route::prefix('banners')
            ->as('banners.')
            ->group(function () {
                Route::get('/', [BannerController::class, 'index'])->name('index');
                Route::get('/create', [BannerController::class, 'create'])->name('create');
                Route::post('/store', [BannerController::class, 'store'])->name('store');
                Route::get('{id}/edit', [BannerController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [BannerController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [BannerController::class, 'destroy'])->name('destroy');
            });


        Route::prefix('baiviets')
            ->as('baiviets.')
            ->group(function () {
                Route::get('/', [BaiVietController::class, 'index'])->name('index');
                Route::get('/create', [BaiVietController::class, 'create'])->name('create');
                Route::post('/store', [BaiVietController::class, 'store'])->name('store');
                Route::get('/show/{id}', [BaiVietController::class, 'show'])->name('show');
                Route::get('{id}/edit', [BaiVietController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [BaiVietController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [BaiVietController::class, 'destroy'])->name('destroy');
            });
    });



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'show_about'])->name('clients.pages.about');




// BlogController
Route::get('/blog', [BlogController::class, 'show_blog'])->name('clients.pages.blog');
Route::get('/blog-detail/{id}', [BlogController::class, 'blog_detail'])->name('clients.pages.blog-detail');
Route::get('/blog-create', [BlogController::class, 'blog_create'])->name('account.quanlytaikhoan.blog-create');
Route::post('/blog_store', [BlogController::class, 'blog_store'])->name('clients.pages.blog_store');
//PoductController

Route::get('/product', [ProductController::class, 'show_sanpham'])->name('clients.pages.product');
Route::get('/product-detail/{id}', [ProductController::class, 'product_detail'])->name('clients.pages.product-detail');

Route::get('/product-create', [ProductController::class, 'product_create'])->name('account.quanlytaikhoan.product-create');
Route::post('/product_store', [ProductController::class, 'product_store'])->name('clients.pages.product_store');


// Hiển thị bình luận cho sản phẩm cụ thể dựa trên san_pham_id
Route::get('/product-detail/{id}/comments', [BinhLuanController::class, 'showBinhLuan'])->name('clients.pages.product-detail');

// Thêm bình luận cho sản phẩm dựa trên san_pham_id
Route::post('/product-detail/{id}/comments', [BinhLuanController::class, 'storeBinhLuan'])->name('clients.pages.product-detail.store');
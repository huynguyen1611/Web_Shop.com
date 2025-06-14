<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FooterController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/san-pham', [FrontendController::class, 'product'])->name('product');
Route::get('/dien-thoai', [FrontendController::class, 'mobile'])->name('mobile');
Route::get('/may-tinh', [FrontendController::class, 'computer'])->name('computer');
Route::get('/man-hinh', [FrontendController::class, 'screen'])->name('screen');
Route::get('/tin-cong-nghe', [FrontendController::class, 'news_technology'])->name('news_technology');
Route::get('/lien-he', [FrontendController::class, 'contact'])->name('contact');
Route::get('/bai-viet', [FrontendController::class, 'article'])->name('article');
Route::get('/bai-viet/ho-tro-khach-hang', [FrontendController::class, 'support'])->name('support');
Route::get('/bai-viet/chinh-sach', [FrontendController::class, 'policy'])->name('policy');
Route::get('/bai-viet/ve-chung-toi', [FrontendController::class, 'news'])->name('news');
Route::get('/gio-hang', [FrontendController::class, 'cart'])->name('cart');
Route::get('/thanh-toan', [FrontendController::class, 'pay'])->name('pay');
//Login
Route::get('/dang-nhap', [FrontendController::class, 'login'])->name('login');
Route::get('/dăng-ki', [FrontendController::class, 'register'])->name('register');
Route::get('/thong-tin', [FrontendController::class, 'edit_user'])->name('edit_user');
//Footer
Route::get('/quy-dinh-mua-hang', [FooterController::class, 'quydinh'])->name('quydinh');
Route::get('/huong-dan-thanh-toan', [FooterController::class, 'thanhtoan'])->name('thanhtoan');
Route::get('/huong-dan-mua-hang', [FooterController::class, 'huongdan'])->name('huongdan');
Route::get('/gioi-thieu', [FooterController::class, 'gioithieu'])->name('gioithieu');
Route::get('/lien-hee', [FooterController::class, 'lienhe'])->name('lienhe');
Route::get('/ve-chung-toi', [FooterController::class, 'vechungtoi'])->name('vechungtoi');
Route::get('/chinh-sach-bao-mat', [FooterController::class, 'baomat'])->name('baomat');
Route::get('/chinh-sach-bao-hanh', [FooterController::class, 'baohanh'])->name('baohanh');
Route::get('/chinh-sach-doi-tra', [FooterController::class, 'doitra'])->name('doitra');
Route::get('/chinh-sach-giao-hang', [FooterController::class, 'giaohang'])->name('giaohang');
//vechungtoi
Route::get('/ve-chung-toi/nhung-cau-hoi-thuong-gap', [FrontendController::class, 'cauhoi'])->name('cauhoi');
Route::get('/ve-chung-toi/lien-he-tu-van', [FrontendController::class, 'lienhetuvan'])->name('lienhetuvan');



//Backend**
Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');

//user
Route::get('user/index', [UserController::class, 'index'])->name('user.index')->middleware('admin');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

//Product
Route::get('category/add', [ProductController::class, 'add_category'])->name('add_category');
Route::get('category', [ProductController::class, 'list_category'])->name('list_category');
Route::get('product/add', [ProductController::class, 'add_product'])->name('add_product');
Route::get('product', [ProductController::class, 'list_product'])->name('list_product');
Route::get('attribute', [ProductController::class, 'list_attribute'])->name('list_attribute');
Route::get('attribute/list', [ProductController::class, 'attribute'])->name('attribute');
Route::post('product/edit', [ProductController::class, 'edit_product'])->name('edit_product');

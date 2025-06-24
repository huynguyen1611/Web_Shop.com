<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\FooterController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

//Frontend**
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/san-pham', [FrontendController::class, 'product'])->name('product');
Route::get('/dien-thoai', [FrontendController::class, 'mobile'])->name('mobile');
Route::get('/may-tinh', [FrontendController::class, 'computer'])->name('computer');
Route::get('/man-hinh', [FrontendController::class, 'screen'])->name('screen');
Route::get('/san-pham/{id}', [FrontendController::class, 'show'])->name('product.show');
// // Danh sách sản phẩm theo danh mục
// Route::get('/san-pham/{slug}', [FrontendController::class, 'category'])->name('category.show');

// // Chi tiết sản phẩm
// Route::get('/san-pham/chi-tiet/{id}', [FrontendController::class, 'show'])->name('product.show');
// Route::get('/danh-muc/{categorySlug}', [FrontendController::class, 'productListByCategory'])->name('category.products');
// Route::get('/san-pham/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');

Route::get('/tin-cong-nghe', [FrontendController::class, 'news_technology'])->name('news_technology');
Route::get('/lien-he', [FrontendController::class, 'contact'])->name('contact');
Route::get('/bai-viet', [FrontendController::class, 'article'])->name('article');
Route::get('/bai-viet/ho-tro-khach-hang', [FrontendController::class, 'support'])->name('support');
Route::get('/bai-viet/chinh-sach', [FrontendController::class, 'policy'])->name('policy');
Route::get('/bai-viet/ve-chung-toi', [FrontendController::class, 'news'])->name('news');


//Login
Route::get('/dang-nhap', [FrontendAuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [FrontendAuthController::class, 'check_login'])->name('check_login');
Route::get('/dang-ki', [FrontendAuthController::class, 'register'])->name('register');
Route::post('/dang-ki', [FrontendAuthController::class, 'store'])->name('register_store');

// Logout luôn truy cập được, không cần đăng nhập
Route::get('/dang-xuat', [FrontendAuthController::class, 'logout'])->name('logout');

// Các route cần khách hàng đăng nhập
Route::middleware('check.customer')->group(function () {
    Route::get('/thong-tin', [FrontendAuthController::class, 'edit_customer'])->name('edit_customer');
    Route::post('/thong-tin', [FrontendAuthController::class, 'update_customer'])->name('update_customer');
    // ... các route khác cần login
    Route::get('/gio-hang', [FrontendController::class, 'cart'])->name('cart');
    Route::get('/thanh-toan', [FrontendController::class, 'pay'])->name('pay');
});

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

//**********************************************************************************************************************/

// Backend**
Route::middleware('login')->group(function () {
    Route::get('admin', [AuthController::class, 'index'])->name('auth.admin');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});

// Route đăng xuất: bắt buộc đã đăng nhập
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('admin');

Route::middleware('role:admin')->group(
    function () {

        // User
        Route::get('user/index', [UserController::class, 'index'])->name('user.index');
        Route::get('register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('register', [AuthController::class, 'register_store'])->name('auth.register_store');
        Route::get('user/edit/{id}', [AuthController::class, 'edit_user'])->name('auth.edit');
        Route::post('user/update/{id}', [AuthController::class, 'update_user'])->name('auth.update');
        Route::get('user/delete/{id}', [AuthController::class, 'delete_user'])->name('auth.delete');

        //Role
        Route::get('role', [RoleController::class, 'index'])->name('roles.index');
        Route::get('role/create', [RoleController::class, 'create_role'])->name('roles.create');
        Route::post('role', [RoleController::class, 'store_role'])->name('roles.store');
        Route::get('role//edit/{id}', [RoleController::class, 'edit_role'])->name('roles.edit');
        Route::post('role/update/{id}', [RoleController::class, 'update_role'])->name('roles.update');
        Route::get('role/delete/{id}', [RoleController::class, 'delete_role'])->name('roles.delete');
    }
);
Route::middleware(['role:sale,admin,marketing'])->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');

    // Category
    Route::get('category', [ProductController::class, 'list_category'])->name('list_category');
    Route::get('category/add', [ProductController::class, 'add_category'])->name('add_category');
    Route::post('category/create', [ProductController::class, 'category_store'])->name('category_store');
    Route::get('category/edit/{id}', [ProductController::class, 'edit_category'])->name('edit_category');
    Route::post('category/update/{id}', [ProductController::class, 'update_category'])->name('update_category');
    Route::get('category/delete/{id}', [ProductController::class, 'delete_category'])->name('delete_category');

    // Product
    Route::get('product', [ProductController::class, 'list_product'])->name('list_product');
    Route::get('product/add', [ProductController::class, 'add_product'])->name('add_product');
    Route::post('product/create', [ProductController::class, 'product_store'])->name('product_store');
    Route::get('product/edit/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::post('product/update/{id}', [ProductController::class, 'update_product'])->name('update_product');
    Route::get('product/delete/{id}', [ProductController::class, 'delete_product'])->name('delete_product');
    // Route::get('/get-sub-categories', [ProductController::class, 'getSubCategories'])->name('get_sub_categories');


    // Attribute
    Route::get('attribute/list', [ProductController::class, 'attribute'])->name('attribute');
    Route::get('attribute/add', [ProductController::class, 'attribute_add'])->name('attribute_add');
    Route::post('attribute/store', [ProductController::class, 'attribute_store'])->name('attribute_store');
    Route::get('attribute/edit/{id}', [ProductController::class, 'attribute_edit'])->name('edit_attribute');
    Route::post('attribute/update/{id}', [ProductController::class, 'attribute_update'])->name('update_attribute');
    Route::get('attribute/delete/{id}', [ProductController::class, 'attribute_delete'])->name('delete_attribute');

    // Attribute_value
    Route::get('attribute_value', [ProductController::class, 'list_attribute'])->name('list_attribute');
    Route::get('attribute_value/create', [ProductController::class, 'attribute_create'])->name('attribute_create');
    Route::post('attribute_value/store', [ProductController::class, 'insert_attribute'])->name('insert_attribute');
    Route::get('attribute_value/edit/{id}', [ProductController::class, 'attri_value_edit'])->name('attri_value_edit');
    Route::post('attribute_value/update/{id}', [ProductController::class, 'attri_value_update'])->name('attri_value_update');
    Route::get('attribute_value/delete/{id}', [ProductController::class, 'attri_value_delete'])->name('attri_value_delete');
});

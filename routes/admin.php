<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\OrderContorller;
use App\Http\Controllers\Dashboard\SubCategoryContoller;
use App\Http\Controllers\Dashboard\ProductSizeController;
use App\Http\Controllers\Dashboard\SubSubCategoryController;

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

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin'], function () {
    Route::resource('roles', RoleController::class);
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //Admins
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/create', [AdminController::class, 'store'])->name('admin.store');
        Route::delete('/{id}/delete', [AdminController::class, 'delete'])->name('admin.delete');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    });

    //Categories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('get-subcategories/{id}', [CategoryController::class, 'getSubcategories'])->name('get-subcategories');
        Route::get('get-subsubcategories/{id}', [CategoryController::class, 'getSubsubcategories'])->name('get-subsubcategories');

        //SubCategories
        Route::get('/subcategory', [SubCategoryContoller::class, 'index'])->name('category.subcategory.index');
        Route::get('subcategory/create', [SubCategoryContoller::class, 'create'])->name('category.subcategory.create');
        Route::post('subcategory/create', [SubCategoryContoller::class, 'store'])->name('category.subcategory.store');
        Route::delete('subcategory/{id}', [SubCategoryContoller::class, 'delete'])->name('category.subcategory.delete');
        Route::get('subcategory/{id}/edit', [SubCategoryContoller::class, 'edit'])->name('category.subcategory.edit');
        Route::post('subcategory/{id}/update', [SubCategoryContoller::class, 'update'])->name('category.subcategory.update');

        //SubSubCategories
        Route::get('/subsubcategory', [SubSubCategoryController::class, 'index'])->name('category.subsub.index');
        Route::get('subsubcategory/create', [SubSubCategoryController::class, 'create'])->name('category.subsub.create');
        Route::post('subsubcategory/create', [SubSubCategoryController::class, 'store'])->name('category.subsub.store');
        Route::delete('subsubcategory/{id}', [SubSubCategoryController::class, 'delete'])->name('category.subsub.delete');
        Route::get('subsubcategory/{id}/edit', [SubSubCategoryController::class, 'edit'])->name('category.subsub.edit');
        Route::post('subsubcategory/{id}/update', [SubSubCategoryController::class, 'update'])->name('category.subsub.update');
    });

    //Products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('product.store');
        Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/{id}/update', [ProductController::class, 'update'])->name('product.update');
    });

    //ProductSizes
    Route::group(['prefix' => 'productSize'], function () {
        Route::delete('/{productSize}/delete', [ProductSizeController::class, 'delete'])->name('product.size.delete');
        Route::get('/{id}/edit', [ProductSizeController::class, 'edit'])->name('product.size.edit');
        Route::post('/{id}/update', [ProductSizeController::class, 'update'])->name('product.size.update');
    });

    //Coupons
    Route::group(['prefix' => 'coupons'], function () {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
        Route::post('/create', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('/coupon/{coupon}', [CouponController::class, 'show'])->name('coupon.show');
        Route::delete('/{id}/delete', [CouponController::class, 'delete'])->name('coupon.delete');
        Route::get('/{id}/edit', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::post('/{id}/update', [CouponController::class, 'update'])->name('coupon.update');
    });

    //Orders
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderContorller::class, 'index'])->name('order.index');
    });
});

//Admins[Login-Register]
Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');

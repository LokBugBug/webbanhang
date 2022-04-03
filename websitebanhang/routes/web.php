<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

//------------------------------------------Route Client-----------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/Home/Products/{id}', [HomeController::class, 'Products'])->name('Products');
Route::get('/Home/Search', [HomeController::class, 'SearchProduct'])->name('SearchProduct');
Route::get('/Home/ProductDetails/{id}', [HomeController::class, 'ProductDetails'])->name('ProductDetails');
Route::get('/Home/Cart', [HomeController::class, 'ShowCart'])->name('Cart');
Route::post('/Home/Cart', [HomeController::class, 'ShowCart'])->name('Cart');
Route::get('/Home/AddCart/{id}', [HomeController::class, 'AddCart'])->name('AddCart');
Route::get('/Home/Delete/{id}', [HomeController::class, 'DeleteCart'])->name('DeleteCart');
Route::post('/Home/Login', [HomeController::class, 'LoginCustomer'])->name('Login');
Route::get('/Home/Login', [HomeController::class, 'LoginCustomer'])->name('Login');
Route::get('/Home/Logout', [HomeController::class, 'LogoutCustomer'])->name('Logout');
Route::get('/Home/CheckOut', [HomeController::class, 'CheckOut'])->name('CheckOut');
Route::get('/Home/Contact', [HomeController::class, 'Contact'])->name('Contact');




//------------------------------------------Route Admin------------------------------------------------------
Route::group(['prefix' => 'Admin'],function(){
    //Trang Chủ Admin
    Route::get('/Home', [AdminController::class, 'Home'])->name('AdminHome');
    Route::post('/Home', [AdminController::class, 'Home'])->name('AdminHome');
    //Đăng Nhập Admin
    Route::get('/Login', [AdminController::class, 'LoginAdmin'])->name('AdminLogin');
    Route::post('/Login', [AdminController::class, 'LoginAdmin'])->name('AdminLogin');
    //Đăng Xuất Admin
    Route::get('/LogoutAdmin', [AdminController::class, 'LogoutAdmin'])->name('AdminLogout');
    //Quản Lí Thành Viên
    Route::get('/Show-Users', [AdminController::class, 'ShowUsers'])->name('AdminShowUsers');
    Route::get('/Show-Users/Edit-User/{id}', [AdminController::class, 'EditUser'])->name('AdminEditUsers');
    Route::post('/Show-Users/Edit-User/{id}', [AdminController::class, 'EditUser'])->name('AdminEditUsers');
    //Quản Lí Danh Mục
    Route::get('/Show-Categorys', [AdminController::class, 'ShowCategorys'])->name('AdminShowCategorys');
    Route::get('/Add-Category', [AdminController::class, 'AddCategory'])->name('AdminAddCategory');
    Route::post('/Add-Category', [AdminController::class, 'AddCategory'])->name('AdminAddCategory');
    Route::get('/Edit-Category/{id}', [AdminController::class, 'EditCategory'])->name('AdminEditCategory');
    Route::post('/Edit-Category/{id}', [AdminController::class, 'EditCategory'])->name('AdminEditCategory');
    Route::get('/Delete-Category/{id}/{category}', [AdminController::class, 'DeleteCategory'])->name('AdminDeleteCategory');
    //Quản Lí Sản Phẩm
    Route::get('/Show-Products', [AdminController::class, 'ShowProducts'])->name('AdminShowProducts');
    Route::get('/Add-Product', [AdminController::class, 'AddProduct'])->name('AdminAddProduct');
    Route::post('/Add-Product', [AdminController::class, 'AddProduct'])->name('AdminAddProduct');
    Route::get('/Edit-Product/{id}', [AdminController::class, 'EditProduct'])->name('AdminEditProduct');
    Route::get('/Delete-Product/{id}/{product}', [AdminController::class, 'DeleteProduct'])->name('AdminDeleteProduct');
    Route::post('/Edit-Product/{id}', [AdminController::class, 'EditProduct'])->name('AdminEditProduct');
    //Quản Lí Đơn Hàng
    Route::get('/Show-Orders', [AdminController::class, 'ShowOrders'])->name('AdminShowOrders');
    Route::get('/Order-Details/{id}', [AdminController::class, 'OrderDetails'])->name('AdminOrderDetails');
    Route::get('/Order-Processing/{id}', [AdminController::class, 'Processing'])->name('AdminOrderProcessing');
    Route::get('/Order-Cancel/{id}', [AdminController::class, 'CancelOrder'])->name('AdminCancelOrder');
    Route::get('/Delete-Order/{id}', [AdminController::class, 'DeleteOrder'])->name('AdminDeleteOrder');
    //Reset Website
    Route::get('/Reset-Website', [AdminController::class, 'ResetWebsite'])->name('AdminResetWebsite');
    Route::post('/Reset-Website', [AdminController::class, 'ResetWebsite'])->name('AdminResetWebsite');
});

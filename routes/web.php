<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','ProfileView')->name('profile.view');
    Route::get('/admin/profile/edit','ProfileEdit')->name('profile.edit');
    Route::post('/admin/profile/store','ProfileStore')->name('profile.store');

    Route::get('/admin/change/password','ChangePassword')->name('change.password');
    Route::post('/admin/update/password','UpdateChangePassword')->name('update.password');
});
//Supplier All Route
Route::controller(SupplierController::class)->group(function(){
    Route::get('/supplier/view','SupplierView')->name('supplier.view');
    Route::get('/supplier/add','SupplierAdd')->name('supplier.add');
    Route::post('/supplier/store','SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}','SupplierEdit')->name('supplier.edit');
    Route::post('/supplier/update/{id}','SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}','SupplierDelete')->name('supplier.delete');
});

//Customer All Route
Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer/view','CustomerView')->name('customer.view');
    Route::get('/customer/add','CustomerAdd')->name('customer.add');
    Route::post('/customer/store','CustomerStore')->name('customer.store');
    Route::get('/customer/edit/{id}','CustomerEdit')->name('customer.edit');
    Route::post('/customer/update/{id}','CustomerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}','CustomerDelete')->name('customer.delete');
});

//Unity all Route
Route::controller(UnitController::class)->group(function(){
    Route::get('/unit/view','UnitView')->name('unit.view');
    Route::get('/unit/add','UnitAdd')->name('unit.add');
    Route::post('/unit/store','UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}','UnitEdit')->name('unit.edit');
    Route::post('/unit/update/{id}','UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}','UnitDelete')->name('unit.delete');
});

//Category all Route
Route::controller(CategoryController::class)->group(function(){
    Route::get('/category/view','CategoryView')->name('category.view');
    Route::get('/category/add','CategoryAdd')->name('category.add');
    Route::post('/category/store','CategoryStore')->name('category.store');
    Route::get('/category/edit/{id}','CategoryEdit')->name('category.edit');
    Route::post('/category/update/{id}','CategoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}','CategoryDelete')->name('category.delete');
});

//Product all Route
Route::controller(ProductController::class)->group(function(){
    Route::get('/product/view','ProductView')->name('product.view');
    Route::get('/product/add','ProductAdd')->name('product.add');
    Route::post('/product/store','ProductStore')->name('product.store');
    Route::get('/product/edit/{id}','ProductEdit')->name('product.edit');
    Route::post('/product/update/{id}','ProductUpdate')->name('product.update');
    Route::get('/product/delete/{id}','ProductDelete')->name('product.delete');
});

//Product all Route
Route::controller(PurchaseController::class)->group(function(){
    Route::get('/purchase/view','PurchaseView')->name('purchase.view');
    Route::get('/purchase/add','PurchaseAdd')->name('purchase.add');

});
//supplier get category
Route::controller(DefaultController::class)->group(function(){
    Route::get('/get-category','GetCategory')->name('get-category');
    Route::get('/get-product','GetProduct')->name('get-product');


});

Route::get('/dashboard', function () {

    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RoleController;



Route::get('/',[HomeController::class, 'home']);
Route::get('/dashboard',[HomeController::class, 'login_home'])->middleware(['auth','verified','two_factor'])->name('dashboard');;
Route::resource(name:'verify',controller:TwoFactorController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth','admin']);
Route::get('view_category',[AdminController::class, 'view_category'])->middleware(['auth','admin']);
Route::post('add_category',[AdminController::class, 'add_category'])->middleware(['auth','admin']);
Route::get('delete_category/{id}',[AdminController::class, 'delete_category'])->middleware(['auth','admin']);
Route::get('edit_category/{id}',[AdminController::class, 'edit_category'])->middleware(['auth','admin']);
Route::post('update_category/{id}',[AdminController::class, 'update_category'])->middleware(['auth','admin']);
Route::get('add_product',[AdminController::class, 'add_product'])->middleware(['auth','admin']);
Route::post('upload_product',[AdminController::class, 'upload_product'])->middleware(['auth','admin']);
Route::get('view_product',[AdminController::class, 'view_product'])->middleware(['auth','admin']);
Route::get('delete_product/{id}',[AdminController::class, 'delete_product'])->middleware(['auth','admin']);
Route::get('update_product/{id}',[AdminController::class, 'update_product'])->middleware(['auth','admin']);
Route::post('edit_product/{id}',[AdminController::class, 'edit_product'])->middleware(['auth','admin']);
Route::get('product_search',[AdminController::class, 'product_search'])->middleware(['auth','admin']);
Route::get('product_details/{id}',[HomeController::class, 'product_details']);
Route::get('shop',[HomeController::class, 'shop']);
Route::get('why',[HomeController::class, 'why']);
Route::get('testmonial',[HomeController::class, 'testmonial']);
Route::get('contacts',[HomeController::class, 'contacts']);
Route::get('add_cart/{id}',[HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycard',[HomeController::class, 'mycard'])->middleware(['auth', 'verified']);
Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});
Route::get('remove/{id}',[HomeController::class, 'remove'])->middleware(['auth', 'verified']);
Route::post('confirm_order',[HomeController::class, 'confirm_order'])->middleware(['auth','verified']);
Route::get('view_order',[AdminController::class, 'view_order'])->middleware(['auth','admin']);
Route::get('on_the_way/{id}',[AdminController::class, 'on_the_way'])->middleware(['auth','admin']);
Route::get('delivered/{id}',[AdminController::class, 'delivered'])->middleware(['auth','admin']);
Route::get('print_pdf/{id}',[AdminController::class, 'print_pdf'])->middleware(['auth','admin']);
Route::get('myorders',[HomeController::class, 'myorders'])->middleware(['auth','verified']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('panel_role',[RoleController::class, 'list'])->middleware(['auth','verified']);
Route::post('add_panel',[RoleController::class, 'add'])->middleware(['auth','verified']);
Route::get('edit_role/{id}',[RoleController::class, 'edit_role'])->middleware(['auth','admin']);
Route::get('delete_role/{id}',[RoleController::class, 'delete_role'])->middleware(['auth','admin']);
Route::post('update_role/{id}',[RoleController::class, 'update_role'])->middleware(['auth','admin']);
Route::get('permission_role/{id}',[RoleController::class, 'permission_role'])->middleware(['auth','admin']);
Route::get('/permissions', [RoleController::class, 'index'])->name('permissions.index');
Route::post('/permissions/assign', [RoleController::class, 'assign'])->name('permissions.assign');




<?php
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController   as AdminOrderController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


// Site public
Route::get('/', [ProductController::class,'index'])->name('home');
Route::get('/product/{slug}', [ProductController::class,'show'])->name('product.show');
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/trai-cay-nhap-khau', [ProductController::class, 'importedFruits'])->name('importedFruits');
Route::get('/trai-cay-viet-nam', [ProductController::class, 'localFruits'])->name('localFruits');

// tim kiem
Route::get('/search', [ProductController::class, 'search'])->name('products.search');


// Auth cần user login
Route::middleware('auth')->group(function(){
  Route::post('/cart/add',[CartController::class,'add'])->name('cart.add');
  Route::get('/cart',      [CartController::class,'index'])->name('cart.index');
  Route::post('/cart/update',[CartController::class,'update'])->name('cart.update');
  Route::post('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');

  Route::get('/checkout',  [OrderController::class,'create'])->name('order.create');
  Route::post('/checkout', [OrderController::class,'store'])->name('order.store');
  Route::get('/orders',    [OrderController::class,'index'])->name('order.index');
});

// Admin routes (cần role=1)
Route::middleware(['auth','can:admin-only'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class)->except(['create', 'store']);


  // thêm routes category, orders nếu cần
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/',[ProductController::class, 'all_products'])->name('allProduct');
Route::get('/add-new-product',[ProductController::class, 'add_new_product'])->name('add.product');
Route::post('/store-product',[ProductController::class, 'store_product'])->name('store.product');
Route::get('/edit-product/{id}',[ProductController::class, 'edit_product'])->name('edit.product');
Route::post('/update-product/{id}',[ProductController::class, 'update_product'])->name('update.product');

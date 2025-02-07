<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CallBackController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CartController;

Route::get('/', [ApplicationController::class, 'showIndex']);

Route::post('/', [ApplicationController::class, 'store']);

Route::get('/c', [CallBackController::class, 'index']);
Route::post('/c', [CallBackController::class, 'storecall']);


Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::post('/staff', [StaffController::class, 'sendEmail'])->name('request');
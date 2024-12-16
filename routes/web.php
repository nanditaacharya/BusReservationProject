<?php

use App\Http\Controllers\AddBusController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'welcome'])->name('home');
Route::get('/viewcategory/{id}',[PagesController::class,'viewcategory'])->name('viewcategory');

Route::get('/bus-route', [BusRouteController::class, 'index'])->name('bus-route.index');
Route::get('/bus-route/create', [BusRouteController::class, 'create'])->name('bus-route.create');
Route::post('/bus-route', [BusRouteController::class, 'store'])->name('bus-route.store');
Route::get('/bus-route/{id}/edit', [BusRouteController::class, 'edit'])->name('bus-route.edit');
Route::put('/bus-route/{id}', [BusRouteController::class, 'update'])->name('bus-route.update');
Route::delete('/bus-route/{id}', [BusRouteController::class, 'destroy'])->name('bus-route.destroy');


Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/addbus',[AddBusController::class,'index'])->name('addbus.index');
Route::get('/addbus/create',[AddBusController::class,'create'])->name('addbus.create');
Route::post('/addbus/store',[AddBusController::class,'store'])->name('addbus.store');
Route::get('/addbus/{id}/edit',[AddBusController::class,'edit'])->name('addbus.edit');
Route::put('/addbus/{id}',[AddBusController::class,'update'])->name('addbus.update');
Route::delete('/addbus/{id}',[AddBusController::class,'destroy'])->name('addbus.destroy');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

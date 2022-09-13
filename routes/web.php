<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//my custom code start with here
 Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
//     main dashboard route
     Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

//     dashboard category route
     Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

//     create category route
     Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);

//     store category route
     Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

//     edit category route
     Route::get('/edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

//     edit category route
     Route::put('/update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

//     delete category route
     Route::get('/delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

 });

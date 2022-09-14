<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//my custom code start with here
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
//     main dashboard route
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


//     category route start //////////////////
//     dashboard category route
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

//     create category route
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);

//     store category route
    Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

//     edit category route
    Route::get('/edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

//     update category route
    Route::put('/update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

//     delete category route
    Route::get('/delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);


//     category route end  //////////////////


//     channels route start  //////////////////


//     dashboard channels route
    Route::get('/channels', [App\Http\Controllers\Admin\ChannelController::class, 'index']);

//    create channel route
    Route::get('/add-channel', [App\Http\Controllers\Admin\ChannelController::class, 'create']);

//    store channel route
    Route::post('/add-channel', [App\Http\Controllers\Admin\ChannelController::class, 'store']);


//     channels route end  //////////////////

});

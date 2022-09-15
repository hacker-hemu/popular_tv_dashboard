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


//     category route end  //////////////////-----


//     channels route start  //////////////////


//     dashboard channels route
    Route::get('/channels', [App\Http\Controllers\Admin\ChannelController::class, 'index']);

//    create channel route
    Route::get('/add-channel', [App\Http\Controllers\Admin\ChannelController::class, 'create']);

//    store channel route
    Route::post('/add-channel', [App\Http\Controllers\Admin\ChannelController::class, 'store']);

//     edit channel route
    Route::get('/edit-channel/{channel_id}', [App\Http\Controllers\Admin\ChannelController::class, 'edit']);

//     update channel route
    Route::put('/update-channel/{channel_id}', [App\Http\Controllers\Admin\ChannelController::class, 'update']);

//     delete channel route
    Route::get('/delete-channel/{channel_id}', [App\Http\Controllers\Admin\ChannelController::class, 'destroy']);

//     channels route end  //////////////////--------


    //     users route start  ////////////////--------

    //     index user route
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);

    //     create user route
    Route::get('/add-user', [App\Http\Controllers\Admin\UserController::class, 'create']);

    //     store  user route
    Route::post('/add-user', [App\Http\Controllers\Admin\UserController::class, 'store']);

    //     edit user route
    Route::get('/edit-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);

    //     update user route
    Route::put('/update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);

    //     delete user route
    Route::get('/delete-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);


    //     users route end  //////////////////--------


});

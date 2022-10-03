<?php

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//     dashboard category route
Route::get('admin/channels', function () {
    $channels = Channel::with('category')->get();

    foreach ($channels as $channel) {
        $channel->image = env('CHANNEL_IMAGE') . '/' . $channel->image;
        $channel->category->image = env('CATEGORY_IMAGE') . '/' . $channel->category->image;
    }

    return $channels;
});


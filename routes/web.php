<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Mail\WelcomeToMiniGram;
use Egulias\EmailValidator\Warning\Comment;
use App\Models\Order;
use Illuminate\Http\Request;

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
//Welcome mail
Route::get('/email', function () {
    return new WelcomeToMiniGram();
});

//authantication
Auth::routes();

//following
Route::post('follow/{user}', [FollowsController::class,'store']);

//timeline
Route::get('/',[PostsController::class,'index']);

//posts routes
Route::get('/p/create', [PostsController::class,'create']);
Route::post('/p', [PostsController::class,'store']);
Route::get('/p/{post}/edit', [PostsController::class,'edit']);
Route::patch('/p/{post}', [PostsController::class,'update']);
Route::get('/p/{post}', [PostsController::class,'show']);
Route::get('/p/{post}/destroy', [PostsController::class,'destroy']);
Route::post('/p/{post}/destroy', [PostsController::class,'destroy']);

//profile routes
Route::get('/profile/{user}', [ProfilesController::class,'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class,'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class,'update'])->name('profile.update');

//search
/*Route::get('/search', function (Request $request) {
    return Order::search($request->search)->get();
});
*/

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BandController::class, 'welcome']);

Route::controller(BandController::class)->middleware(['auth'])->group(function(){
    Route::get('/index', 'index');
    Route::post('/search', 'search');
    Route::get('/create_band', 'create');
    Route::post('/bands', 'store');
    Route::get('/index/{band}', 'show');
    Route::post('/apply', 'apply');
});

Route::controller(ProfileController::class)->middleware(['auth'])->group(function(){
    Route::get('/profile', 'edit');
    Route::put('/profile/{user}', 'update');
    Route::get('/apply', 'show_apply');
    Route::get('/apply/chatroom/user/{user}/{band}', 'user_chatroom')->name('user_chatroom');
    Route::get('/apply/chatroom/band/{myband}/{applicant}', 'band_chatroom')->name('band_chatroom');
    Route::post('/chat/message', 'store');
});




require __DIR__.'/auth.php';

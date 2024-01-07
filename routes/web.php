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
    Route::get('/index', [BandController::class, 'index']);
    Route::get('/create_band', 'create');
    Route::post('/bands', 'store');
    Route::get('/welcome/{band}', 'show');
});

Route::controller(ProfileController::class)->middleware(['auth'])->group(function(){
    Route::get('/profile', 'edit');
    Route::put('/profile/{user}', 'update');
});



require __DIR__.'/auth.php';

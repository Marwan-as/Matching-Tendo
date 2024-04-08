<?php

use App\Http\Controllers\EmailVerifyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OutfitController;
use App\Http\Controllers\SubmittedOutfitController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');
Route::get('/show-outfit/{id}', [HomeController::class, 'show'])->name('user.show');

Route::resource('items', ItemController::class );
Route::resource('outfits', OutfitController::class);

Route::get('/outfits', [OutfitController::class, 'index'])->name('outfits.index');
Route::get('/submitted-items/{$id}',[OutfitController::class, 'show'])->name('submitted-outfits-show');
Route::post('/outfits_store', [OutfitController::class, 'store'])->name('outfits.store');
Route::get('/submitted-outfits',[OutfitController::class, 'index'])->name('submitted-outfits');
Route::get('/edit-outfit/{id}', [OutfitController::class, 'edit'])->name('user.edit');
Route::put('/outfit-update/{id}',[OutfitController::class, 'update'])->name('user.update');
Route::delete('/outfit/{id}',[OutfitController::class, 'destroy'])->name('user.destroy');


require __DIR__.'/auth.php';


<?php

use App\Http\Controllers\CountCommitController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('pages.welcome');
});

Route::prefix('project')->group(function () {        
    Route::get('public', [CountCommitController::class, 'getWithoutKey'])->name('getWithoutKey');
    Route::get('private', [CountCommitController::class, 'getWithKey'])->name('getWithKey');
    Route::get('main', [CountCommitController::class, 'getMain'])->name('getMain');
    Route::post('public/apiwithoutkey', [CountCommitController::class, 'apiWithoutKey'])->name('apiWithoutKey');
    Route::post('private/apiwithkey', [CountCommitController::class, 'apiWithKey'])->name('apiWithKey');
    Route::post('main/apimain', [CountCommitController::class, 'apiMain'])->name('apiMain'); 
});

Route::prefix('tes')->group(function () {        
    Route::get('tes', [CountCommitController::class, 'getTes'])->name('getTes');
    Route::post('tes/hmm', [CountCommitController::class, 'tes'])->name('tes');
});


Route::resource('project', CountCommitController::class);
Route::resource('tes', CountCommitController::class);

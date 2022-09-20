<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RssFeedReaderController;
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
    return view('feed_reader');
});

Route::get('feed_reader',[RssFeedReaderController::class,'index']);
Route::get('feed_reader/store',[RssFeedReaderController::class,'store'])->name('feed_reader.store');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LinkRedirectController;
use App\Http\Controllers\LinkStatisticController;

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
    return view('mainPage');
})->name("mainPage");
Route::resources([
    'links' => LinkController::class,
    'tags' => TagController::class,
]);

Route::get('/statistics', [LinkStatisticController::class, "index"])->name("statistics");

Route::get('/{shortLink}', [LinkRedirectController::class, 'redirect']);

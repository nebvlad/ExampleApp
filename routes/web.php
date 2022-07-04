<?php

use App\Http\Controllers\LinksController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('links.create');
});

Route::get('/create', LinksController::class . '@create')->name('links.create');
Route::post('/store', LinksController::class . '@store')->name('links.store');



Route::get('/{link_id}', LinksController::class . '@show');

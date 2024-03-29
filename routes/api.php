<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('siswa', 'Api\SiswaController');
Route::resource('kategori', 'Api\kategoriController');
Route::resource('tag', 'Api\tagController');
Route::resource('artikel', 'Api\artikelController');

Route::get('latest', 'FrontendController@latest');

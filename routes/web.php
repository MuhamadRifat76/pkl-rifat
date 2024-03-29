<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/admin', function () {
    return view('backend');
});

Route::get('dashboardfrontend', function () {
    return view('dashboardfrontend');
});

Route::get('/admin', function () {
    return view('backend');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/catagory', function () {
    return view('catagory');
});
Route::get('/elements', function () {
    return view('elements');
});

Route::resource('kategori', 'kategoriController');
Route::resource('tag', 'tagController');
Route::resource('artikel', 'ArtikelController');
Route::resource('siswa', 'siswaController');

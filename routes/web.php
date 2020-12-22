<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return Redirect::to('/penduduk/laporan');
});

Route::resource('kartu-keluarga', 'KartuKeluargaController');
Route::get('penduduk/laporan', 'PendudukController@laporan');
Route::resource('penduduk', 'PendudukController');
    
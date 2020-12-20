<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts.app');
});

    Route::resource('jorong', 'JorongController');
    Route::resource('kartu-keluarga', 'KartuKeluargaController');
    Route::resource('kewarganegaraan', 'KewarganegaraanController');
    Route::resource('level-pendidikan', 'LevelPendidikanController');
    Route::resource('nagari', 'NagariController');
    Route::resource('pekerjaan', 'PekerjaanController');
    Route::resource('penduduk', 'PendudukController');
    Route::get('penduduk/laporan', 'PendudukController@laporan');
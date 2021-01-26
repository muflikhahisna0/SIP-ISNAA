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

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/', 'otentikasi\OtentikasiController@login')->name('login');
// Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');
Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

// Route::group(['middleware' => 'CekLoginMiddleware'], function () {
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('index', ['isipesan' => "Selamat datang di panel Digital Development"]);
    })->name('dashboard');
    Route::get('crud', 'CrudController@index')->name('crud');
    Route::get('crud/tambah', 'CrudController@tambah')->name('crud.tambah');
    Route::post('crud/simpan', 'CrudController@simpan')->name('crud.simpan');
    Route::delete('crud/delete/{id}', 'CrudController@delete')->name('crud.delete');
    Route::delete('crud/{id}/edit', 'CrudController@edit')->name('crud.edit');
    Route::delete('crud/{id}', 'CrudController@update')->name('crud.update');

    Route::resource('konfigurasi/setup', 'Konfigurasi\SetupController');
    Route::resource('master-data/divisi', 'MasterData\DivisiController');
    Route::resource('master-data/karyawan', 'MasterData\KaryawanController');

    Route::post('/divisi/destroy/{id}', 'DivisiController@destroy');
    Route::delete('master-data/divisi/{id}', 'DivisiController@delete')->name('divisi.update');
    Route::delete('master-data/selected-divisi', 'DivisiController@deleteCheckedDivisi')->name('divisi.deleteSelected');

    Route::get('master-data/divisi/spreadsheet', 'DivisiController@spreadsheet');
    Route::get('divisiexport', 'DivisiExportController@divisiexport')->name('divisiexport');
    Route::post('divisiimport', 'DivisiExportController@pegawaiimport')->name('divisiimport');

    Route::get('profile', 'UserController@index')->name('profile');
    Route::post('profile', 'UserController@update');


    Route::get('logout', 'otentikasi\OtentikasiController@logout')->name('logout');
});


Route::get('/home', 'HomeController@index')->name('home');

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
    return view('backend.login');
})->name('awal');

Auth::routes();

// Route untuk Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Route untuk Kas Pemasukan
Route::get('/kas-pemasukan', 'KasPemasukanController@index')->name('kas-pemasukan.index');
Route::get('/kas-pemasukan/getdata', 'KasPemasukanController@getData')->name('kas-pemasukan.getdata');
Route::post('/kas-pemasukan/store', 'KasPemasukanController@store')->name('kas-pemasukan.store');
Route::get('/kas-pemasukan/edit', 'KasPemasukanController@edit')->name('kas-pemasukan.edit');
Route::post('/kas-pemasukan/destroy/{id}', 'KasPemasukanController@destroy')->name('kas-pemasukan.destroy');

// Route untuk Kas Pengeluaran
Route::get('/kas-pengeluaran', 'KasPengeluaranController@index')->name('kas-pengeluaran.index');
Route::get('/kas-pengeluaran/getdata', 'KasPengeluaranController@getData')->name('kas-pengeluaran.getdata');
Route::post('/kas-pengeluaran/store', 'KasPengeluaranController@store')->name('kas-pengeluaran.store');
Route::get('/kas-pengeluaran/edit', 'KasPengeluaranController@edit')->name('kas-pengeluaran.edit');
Route::post('/kas-pengeluaran/destroy/{id}', 'KasPengeluaranController@destroy')->name('kas-pengeluaran.destroy');

// Route untuk Kas Rekapitulasi
Route::get('/kas-rekapitulasi', 'KasRekapitulasiController@index')->name('kas-rekapitulasi.index');
Route::get('/kas-rekapitulasi/getdata', 'KasRekapitulasiController@getData')->name('kas-rekapitulasi.getdata');

// Route untuk Dana Sosial Pemasukan
Route::get('/dana-sosial-pemasukan', 'DanaPemasukanController@index')->name('dana-pemasukan.index');
Route::get('/dana-sosial-pemasukan/getdata', 'DanaPemasukanController@getData')->name('dana-pemasukan.getdata');
Route::post('/dana-sosial-pemasukan/store', 'DanaPemasukanController@store')->name('dana-pemasukan.store');
Route::get('/dana-sosial-pemasukan/edit', 'DanaPemasukanController@edit')->name('dana-pemasukan.edit');
Route::post('/dana-sosial-pemasukan/destroy/{id}', 'DanaPemasukanController@destroy')->name('dana-pemasukan.destroy');

// Route untuk Dana Sosial Pengeluaran
Route::get('/dana-sosial-pengeluaran', 'DanaPengeluaranController@index')->name('dana-pengeluaran.index');
Route::get('/dana-sosial-pengeluaran/getdata', 'DanaPengeluaranController@getData')->name('dana-pengeluaran.getdata');
Route::post('/dana-sosial-pengeluaran/store', 'DanaPengeluaranController@store')->name('dana-pengeluaran.store');
Route::get('/dana-sosial-pengeluaran/edit', 'DanaPengeluaranController@edit')->name('dana-pengeluaran.edit');
Route::post('/dana-sosial-pengeluaran/destroy/{id}', 'DanaPengeluaranController@destroy')->name('dana-pengeluaran.destroy');

// Route untuk Kas Rekapitulasi
Route::get('/dana-sosial-rekapitulasi', 'DanaRekapitulasiController@index')->name('dana-rekapitulasi.index');
Route::get('/dana-sosial-rekapitulasi/getdata', 'DanaRekapitulasiController@getData')->name('dana-rekapitulasi.getdata');

//Route untuk cetak laporan kas
Route::get('/laporan-kas', 'LaporanKasController@index')->name('laporan-kas.index');
Route::get('/laporan-data-kas/{tanggal_awal}/{tanggal_akhir}', 'LaporanKasController@laporanKas')->name('cetak-data-kas.laporanKas');

//Route untuk cetak laporan dana sosial
Route::get('/laporan-dana-sosial', 'LaporanDanaSosialController@index')->name('laporan-dana-sosial.index');
Route::get('/laporan-data-dana-sosial/{tanggal_awal}/{tanggal_akhir}', 'LaporanDanaSosialController@laporanDanaSosial')->name('cetak-data-dana-sosial.laporanKas');

// Route untuk Users
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/getdata', 'UsersController@getData')->name('users.getdata');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/edit', 'UsersController@edit')->name('users.edit');
Route::post('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');

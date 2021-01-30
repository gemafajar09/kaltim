<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.auth.login');
});

Route::get('/home', 'TestController@index')->name('home');
Route::get('/grafik-detail', 'TestController@grafik')->name('grafik-detail');
Route::get('/report-polres', 'TestController@reportpolres')->name('report-polres');
Route::get('/report-biro', 'TestController@reportbiro')->name('report-biro');

Route::get('/data-polres', 'TestController@inputpolres')->name('data-polres');
Route::get('/data-biro', 'TestController@inputbiro')->name('data-biro');

// ========================backend=======================
// biro
Route::get('/biro-partner', 'BiroController@index')->name('biro-partner');
Route::post('/biro-partner-save', 'BiroController@save')->name('biro-partner-save');
Route::get('/biro-partner-delete/{id}', 'BiroController@delete')->name('biro-partner-delete');

// polres
Route::get('/kepolisian-resort', 'PolresController@index')->name('polres');
Route::post('/polres-save', 'PolresController@save')->name('polres-save');
Route::get('/polres-delete/{id}', 'PolresController@delete')->name('polres-delete');
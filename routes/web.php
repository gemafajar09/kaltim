<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.auth.login');
});

Route::get('/home', 'TestController@index')->name('home');
Route::get('/grafik-detail', 'TestController@grafik')->name('grafik-detail');
Route::get('/polres', 'TestController@polres')->name('polres');
Route::get('/biro-partner', 'TestController@biro')->name('biro-partner');
Route::get('/report-polres', 'TestController@reportpolres')->name('report-polres');
Route::get('/report-biro', 'TestController@reportbiro')->name('report-biro');

Route::get('/data-polres', 'TestController@inputpolres')->name('data-polres');
Route::get('/data-biro', 'TestController@inputbiro')->name('data-biro');


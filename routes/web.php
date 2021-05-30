<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(session('user_id') != ''):
        return redirect('home');
    else:
        return view('backend.auth.login');
    endif;
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/grafik-detail', 'TestController@grafik')->name('grafik-detail');
Route::get('real-count/{level}/{cabang}','HomeController@realcount');
// ========================backend=======================
// Data User
Route::get('/data-user','LoginController@datauser')->name('data-user')->middleware('Ceklogin');
Route::post('/data-user-add','LoginController@register')->name('data-user-add')->middleware('Ceklogin');
Route::post('/data-user-save','LoginController@registerr')->name('data-user-save')->middleware('Ceklogin');
Route::get('/data-user-hapus/{id}','LoginController@deleteuser')->name('data-user-hapus')->middleware('Ceklogin');
Route::post('/data-user-login','LoginController@login')->name('data-user-login');
Route::get('/data-user-logout','LoginController@logout')->name('data-user-logout');
Route::get('/data-akun-cabang','LoginController@addcabang')->name('data-akun-cabang');

// biro
Route::get('/biro-partner', 'BiroController@index')->name('biro-partner')->middleware('Ceklogin');
Route::get('/data-biro-cabang', 'BiroController@indexx')->name('data-biro-cabang')->middleware('Ceklogin');
Route::post('/data-biro-save-add', 'BiroController@saveadd')->name('data-biro-save-add')->middleware('Ceklogin');
Route::post('/biro-partner-save', 'BiroController@save')->name('biro-partner-save')->middleware('Ceklogin');
Route::get('/biro-partner-delete/{id}', 'BiroController@delete')->name('biro-partner-delete')->middleware('Ceklogin');

// polres
Route::get('/kepolisian-resort', 'PolresController@index')->name('polres')->middleware('Ceklogin');
Route::post('/polres-save', 'PolresController@save')->name('polres-save')->middleware('Ceklogin');
Route::get('/polres-delete/{id}', 'PolresController@delete')->name('polres-delete')->middleware('Ceklogin');

// report polres detail
Route::get('/data-polres-biro', 'DataBiroController@report_polres_biro')->name('data-polres-biro')->middleware('Ceklogin');
Route::get('/report-polres-biro-data/{cabang}/{dari}/{sampai}', 'DataBiroController@datatable_polres');

// input dan report data biro 
Route::get('/data-biro', 'DataBiroController@index')->name('data-biro')->middleware('Ceklogin');
Route::get('/data-biro-input', 'DataBiroController@indexx')->name('data-biro-input')->middleware('Ceklogin');
Route::get('/report-biro', 'DataBiroController@report_biro')->name('report-biro')->middleware('Ceklogin');
Route::get('/report-biro-data/{cabang}/{dari}/{sampai}', 'DataBiroController@datatable');
Route::post('/data-biro-save', 'DataBiroController@save')->name('data-biro-save')->middleware('Ceklogin');
Route::get('/data-biro-delete/{id}', 'DataBiroController@delete')->name('data-biro-delete')->middleware('Ceklogin');
Route::get('/exportexcelbiro/{cabang}/{dari}/{sampai}', 'DataBiroController@exportdetail');
Route::get('/reportharianbiro/{id}/{tgl}', 'DataBiroController@reportharian');
Route::get('/reportbulananbiro/{id}/{tgl}', 'DataBiroController@reportbulanan');

// input dan report polres
Route::get('/data-polres', 'DataPolresController@index')->name('data-polres')->middleware('Ceklogin');
Route::get('/report-polres', 'DataPolresController@report_polres')->name('report-polres')->middleware('Ceklogin');
Route::get('/report-polres-detail/{id}', 'DataPolresController@report_polres_detail')->name('report-polres-detail')->middleware('Ceklogin');

Route::get('/report-polres-edit/{id}', 'DataPolresController@report_polres_edit')->name('report-polres-edit')->middleware('Ceklogin');

Route::post('/data-polres-save', 'DataPolresController@save')->name('data-polres-save')->middleware('Ceklogin');
Route::get('/data-polres-delete/{id}', 'DataPolresController@delete')->name('data-polres-delete')->middleware('Ceklogin');
Route::get('/datatable/{cabang}/{dari}/{sampai}', 'DataPolresController@datatable');
Route::get('/exportexcel/{cabang}/{bulan}', 'DataPolresController@exportexcel');
Route::get('/reportharian/{id}/{tgl}', 'DataPolresController@reportharian');
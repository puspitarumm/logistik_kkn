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

// Route::get('/', function () {
//     return view('/auth.login');
// });
Route::get('/', 'HomeController@checksession');

Route::get('template', function(){
    return view('layouts.master');
});
// Route::get('/', 'DashboardController@checksession');

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'DashboardController@index');
    Route::get('listbarang','BarangController@index');
});
    

// Route::group(['middleware' => ['web']], function() {
//     Route::resource('barang','BarangController');
//     Route::POST('addBarang','BarangControllerr@addBarang');
//     Route::POST('editBarang','PostController@editBarang');
//     Route::POST('deleteBarang','PostController@deleteBarang');
//   });

Route::get('detailsbarang','DetailsBarangController@index');
Route::put('detailsbarang_create','DetailsBarangController@create')->name('create_details');

Route::get('listbarang','BarangController@index');

Route::put('barang_create','BarangController@create')->name('create_brg');

Route::put('barang_update/{id_barang}','BarangController@update')->name('update_brg');

Route::delete('barang_delete/{id_barang}','BarangController@delete')->name('delete_brg');


Route::get('dosen', 'DashboardController@index');


Route::get('ukuranbarang', 'UkuranBarangController@index');

Route::put('ukuranbarang_create','UkuranBarangController@create')->name('create_uk_barang');

Route::put('ukuranbarang_update/{id_ukuran}','UkuranBarangController@update')->name('update_ukuran');

Route::delete('ukuranbarang_delete/{id_ukuran}','UkuranBarangController@delete')->name('delete_ukuran');


Route::get('periode', 'PeriodeController@index');

Route::put('periode_create','PeriodeController@create')->name('create_per');

Route::put('periode_update/{id_periode}','PeriodeController@update')->name('update_per');

Route::delete('periode_delete/{id_periode}','PeriodeController@delete')->name('delete_per');


// Route::group(['middleware' => ['web']], function() {
//     Route::resource('barang','BarangController');
//     Route::POST('addBarang','BarangControllerr@addBarang');
//     Route::POST('editBarang','PostController@editBarang');
//     Route::POST('deleteBarang','PostController@deleteBarang');
//   });

Route::get('barangmasuk', 'BarangMasukController@index');

Route::put('barangmasuk_create','BarangMasukController@create')->name('create_brg_msk');

Route::put('barangmasuk_update/{id_brg_masuk}','BarangMasukController@update')->name('update_brg_msk');

Route::delete('barangmasuk_delete/{id_brg_masuk}','BarangMasukController@delete')->name('delete_brg_msk');


Route::get('barangkeluar', 'BarangKeluarController@index');
Route::put('barangkeluar_create','BarangKeluarController@create')->name('create_brg_keluar');
Route::post('print','BarangKeluarController@printPdf');
Route::post('unggah','BarangKeluarController@uploadBukti');
Route::get('hapus/{id}','BarangKeluarController@deleted');
Route::get('hapus/unggahan/{id}','BarangKeluarController@hapus_unggahan');

Route::put('barangkeluar_update/{id_brg_keluar}','BarangKeluarController@update')->name('update_brg_keluar');

Route::delete('barangkeluar_delete/{id_brg_keluar}','BarangKeluarController@delete')->name('delete_brg_keluar');

Route::get('users', 'AdminController@index');

Route::put('users_create','AdminController@create')->name('create_adm');

Route::put('users_update/{id_admin}','AdminController@update')->name('update_adm');

Route::delete('users_delete/{id_admin}','AdminController@delete')->name('delete_adm');


Route::delete('dokumen_delete/{id_dokumen}','DocumentController@delete')->name('delete_doc');

Route::get('dokumen', 'DocumentController@index');

Route::post('/dokumen/upload', 'DocumentController@create');

Route::Post('dokumen_create','DocumentController@create')->name('create_doc');

Route::put('dokumen_update/{id_dokumen}','DocumentController@update')->name('update_doc');

Route::get('dokumen/{dokumen}/response', 'DocumentController@response')->name('dokumen.response');

Route::get('mahasiswa', 'MahasiswaController@index');

Route::put('datamahasiswa_create','DataMahasiswaController@create')->name('create_mhs');

Route::put('datamahasiswa_update/{nim}','DataMahasiswaController@update')->name('updated_mhs');

Route::delete('datamahasiswa_delete/{nim}','DataMahasiswaController@delete')->name('delete_mhs');

Route::post('/import_excel', 'MahasiswaController@import_excel');
Route::get('mahasiswa', 'MahasiswaController@index');
Route::post('/import_excel/import', 'MahasiswaController@import');

Route::post('import_excel', 'MahasiswaController@import_excel');

Route::post('mahasiswa/import_excel', 'MahasiswaController@import_excel');

Route::get('/mahasiswa', 'MahasiswaController@index');

Route::post('/mahasiswa/import_excel', 'MahasiswaController@import_excel');

Route::get('dashboard', 'DashboardController@index');

Route::get('dokumen2', 'Document2Controller@uploadFile');
Route::post('upload', 'Document2Controller@StoreUploadFile');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('barangmasuk')->group(function() {
    Route::get('tambah_barangmasuk','BarangMasukController@add_masuk');
    Route::post('barangmasuk','BarangMasukController@index');
});
Route::prefix('transaksi')->group(function() {
    Route::get('add','BarangKeluarController@add_keluar');
    Route::post('create','BarangKeluarController@add_create');
    Route::post('save','BarangKeluarController@save_create');
});

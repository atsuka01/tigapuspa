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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home_admin', 'HomeController@index');
        //fungsi pe//

        Route::get('pekingepedisi', 'PeController@index')->name('pe.index');
        Route::post('pe/sotre', 'PeController@store')->name('pe.store');


        Route::group(['middleware' => ['level']], function () {
        Route::get('/home_admin', 'HomeController@admin');
        Route::get('pabrik', 'ProduksiController@index')->name('pabrik.index');
        Route::get('pabrik/create', 'ProduksiController@create')->name('pabrik.create');
        Route::post('produksi', 'ProduksiController@store');
        Route::put('pabrik/{id}', 'ProduksiController@update');
        route::get('pabrik/{id}/edit', 'ProduksiController@edit')->name('pabrik.edit');
        Route::get('pabrik/{id}',  'ProduksiController@show')->name('pabrik.show');
        Route::delete('pabrik/{id}', 'ProduksiController@destroy')->name('pabrik.hapus');
        Route::post('jumlahproduksi', 'ProduksiController@jumlahproduksi')->name('produksi.jumlahproduksi');
        //Costumer Service
        Route::get('cs', 'CsController@index');
        Route::post('cs', 'CsController@store');
        Route::delete('cs/{id}', 'CsController@delete')->name('hapus.cs');
        //fungsi Kantor
        Route::put('kantor/{id}', 'KantorController@update');
        Route::get('kantor', 'KantorController@index')->name('kantor.index');
        Route::get('kantor/create', 'KantorController@create')->name('kantor.create');
        Route::post('kantor', 'KantorController@store')->name('kantor.store');
        Route::post('kantor/stok', 'KantorController@tambahstok')->name('kantor.tambahstok');
        Route::get('kantor/{id}/edit', 'KantorController@edit')->name('kantor.edit');
        Route::any('kantor/{id}/stok', 'KantorController@stok')->name('kantor.stok');
        Route::delete('kantor/{id}', 'KantorController@destroy')->name('kantor.hapus');
        //fungsi Toko
        Route::get('toko', 'TokoController@index')->name('toko.index');
        Route::get('toko/create', 'TokoController@create')->name('toko.create');
        Route::post('toko', 'TokoController@store')->name('toko.store');
        Route::get('toko/{id}', 'TokoController@show')->name('toko.show');
        Route::put('toko/{id}', 'TokoController@update')->name('toko.update');
        Route::get('toko/{id}/edit', 'TokoController@edit')->name('toko.edit');
        Route::delete('toko/{id}', 'TokoController@destroy')->name('toko.delete');
        Route::get('transaksi', 'TokoController@transaksi')->name('toko.transaksi');
        //fungsi transaksi online
        Route::any('public/order/{id}', 'OnlineController@store')->name('toko.orders');
        Route::delete('order/{id}', 'OnlineController@hapus')->name('toko.hapus');
        Route::get('review/{id}', 'HomeController@review')->name('toko.review');
        Route::get('toko/{id}/print', 'HomeController@print')->name('toko.print');
        Route::get('toko/{id}/repeat', 'OnlineController@repeat')->name('toko.repeat');
        Route::post('toko/repeatstore', 'OnlineController@repeatstore')->name('toko.repeatstore');
        //fungsi master dealer
        Route::get('md', 'MasterDealerController@index')->name('md.index');
        Route::post('md', 'MasterDealerController@store')->name('md.store');
        Route::get('md/{id}/edit', 'MasterDealerController@edit')->name('md.edit');
        Route::put('md/{id}', 'MasterDealerController@update')->name('md.update');
        Route::delete('md/{id}', 'MasterDealerController@destroy')->name('md.delete');
        Route::get('md/{id}', 'M asterDealerController@show')->name('md.show');
        Route::post('md/{id}','MasterDealerController@CreateRs')->name('md.rs');
        //Funsi Master Delaer stok
        Route::get('md/{id}/stok', 'MasterDealerController@stok')->name('md.stok');
        Route::get('md/{id}/suratjalan', 'MasterDealerController@suratjalan')->name('md.suratjalan');
        Route::post('stok', 'MasterDealerController@input')->name('md.input');
        Route::get('md/{id}/printinvois', 'MasterDealerController@printinvois')->name('md.printinvois');
        Route::get('md/{id}/produk', 'MasterDealerController@deleteproduk')->name('md.deleteproduk');
        
        Route::post('mdinvois', 'MasterDealerController@mdinvois');
        Route::get('stok/print', 'MasterDealerController@print')->name('md.print');
        route::get('stok/tampilsession', 'MasterDealerController@tampilsession')->name('md.tampilsession');
        Route::post('stok/session', 'MasterDealerController@buatsession')->name('md.session');
        Route::post('stok/tampung', 'MasterDealerController@tampung')->name('md.tampung');
        Route::get('Stok/{id}/Tampung', 'TampungStokMD@index')->name('input.stok');
        //Fungsi Transaksi Master dealer
        Route::any('transaksimd/transaksi', 'TrnsaksiMdController@store')->name('transaksimd.store');
        Route::get('transaksimd', 'TrnsaksiMdController@index');
        Route::get('md/review/{id}', 'TrnsaksiMdController@preview')->name('master.review');
        Route::get('md/print/{id}', 'TrnsaksiMdController@print')->name('master.print');
        Route::get('md/printalamat/{id}', 'TrnsaksiMdController@printalamat')->name('master.printalamat');
        Route::delete('masterdealer/{id}', 'TrnsaksiMdController@hapus')->name('master.hapus');
        Route::post('masterdealer/jualputus', 'MasterDealerController@jualputus')->name('md.jualputus');
        //fungsi Reseler
        Route::get('reseler', 'RsController@index')->name('reseler.index');
        Route::get('reseler/transaksi', 'RsController@transaksirs');
        Route::post('reseler/transaksi', 'RsController@store')->name('reseler.store');
        Route::post('reseler/updateretur', 'RsController@updateretur')->name('update.retur');
        route::get('reseler/review/{id}', 'RsController@review')->name('reseler.review');
        route::get('reseler/print/{id}', 'RsController@print')->name('reseler.print');
        Route::get('reseler/printalamat/{id}', 'RsController@printalamat')->name('reseler.printalmat');
        Route::get('reseler/{id}/stok', 'RsController@stok')->name('reseler.stok');
        Route::get('reseler/{id}/edit', 'RsController@edit')->name('reseler.edit');
        Route::get('reseler/{id}/repeat', 'RsController@reapit')->name('reseler.repeat');
        Route::put('reseler/{id}', 'RsController@update')->name('reseler.update');
        Route::post('reseler/stokinput', 'RsController@proses')->name('rs.stok');
        Route::get('reseler/{id}/delete', 'RsController@delete')->name('reseler.delete');
        //retur
        Route::get('reseler/{id}/retur', 'RsController@retur')->name('reseler.retur');
        //end retur
        
        Route::get('reseler/{id}/printsuratjalan', 'RsController@suratjalan')->name('reseler.suratjalan');
        Route::post('reseler/invois', 'RsController@invois')->name('reseler.invois');
        Route::delete('reseler/{id}', 'RsController@hapus')->name('reseler.hapus');
        //fungsi Apotik
        Route::get('apotik', 'ApotikController@index')->name('apotik.index');
        Route::post('apotik', 'ApotikController@store')->name('apotik.store');
        Route::delete('apotik/{id}', 'ApotikController@hapus')->name('apotik.hapus');
        Route::get('apotik/stok/{id}', 'ApotikController@stok')->name('aptoik.stok');
        route::post('apotik/stok/tambah', 'Apotikcontroller@tambahstok')->name('apotik.tambahstok');
        Route::post('apotik/tambahstok', 'ApotikController@tambahstok')->name('apotik.tambahstok');
        Route::post('apotik/invois', 'ApotikController@apotikinvois')->name('apotik.apotikinvois');
        Route::post('apotik/jualputus', 'ApotikController@jualputus')->name('apotik.jualputus');
        Route::get('print/{id}', 'ApotikController@surajalan')->name('ap.print');
        Route::get('invois/{id}', 'ApotikController@apinvois')->name('ap.invois');
        //fungsi agen
        Route::get('agen', 'AgenController@index')->name('agen.index');
        Route::post('agen/store', 'AgenController@store')->name('agen.store');
        Route::get('agen/{id}/stok', 'AgenController@stok')->name('agen.stok');
        Route::post('agen/tambahstok', 'AgenController@tambahstok')->name('agen.tambahstok');
        Route::post('agen/tambahinvois', 'AgenController@tambahinvois')->name('agen.tambahinvois');
        Route::get('agen/suratjalan/{id}', 'AgenController@suratjalan')->name('agen.suratjalan');
        //Retail
        Route::get('retail', 'RetailController@index')->name('retail.index');
        Route::post('retail/store', 'RetailController@store')->name('retail.store');
        route::get('retail/{id}/invois', 'RetailController@invois')->name('retail.invois');
        route::post('retail/cari', 'RetailController@cari')->name('retail.cari');
        //laporan
        Route::get('laporan', 'LaporanController@index')->name('laporan.index');
        Route::get('laporan/laporanKantor', 'LaporanController@laporanKantor')->name('laporan.kantor');
        Route::get('laporan/laporanPabrik', 'LaporanController@laporanpabrik')->name('laporan.pabrik');
        //Laporan Online
        Route::post('laporan/online', 'LaporanController@laporanonline')->name('laporan.online');
        //laporan master dealer
        Route::post('laporan/md', 'LaporanController@laporanmasterdealer')->name('laporan.md');
        //laporan mReseler
        Route::post('laporan/rs', 'LaporanController@laporanreseler')->name('laporan.rs');
        Route::get('laporan/harian', 'LaporanController@laporanharian')->name('laporan.harian');
        Route::get('laporan/lsy', 'LaporanController@laporanlsy')->name('laporan.lsy');
        //cari ed
        Route::get('ed', 'EdController@index')->name('ed.index');
        Route::post('ed/cari', 'EdController@cari')->name('ed.cari');
        //Laporan LSY
        Route::post('laporan/lsy', 'LaporanController@laporanlsy')->name('laporan.lsy');
        Route::post('laporan/lsy/print', 'LaporanController@lsyprint')->name('laporan.lsyprint');
       //laporan Metama
       Route::get('laporan/metama', 'LaporanController@laporanmetama')->name('laporan.metama');

    });
        Route::get('/home_cs', 'HomeController@cs');
        Route::get('toko', 'TokoController@index')->name('toko.index');
        Route::get('toko/{id}', 'TokoController@show')->name('toko.show');
        Route::get('transaksi', 'TokoController@transaksi')->name('toko.transaksi');
        Route::post('public/order', 'OnlineController@store')->name('toko.orders');
});
Route::get('/admin', 'HomeController@admin')->middleware('cekuser');

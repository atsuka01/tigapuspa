<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantor;
use App\Produksi;
use App\TransaksiOnline;
use App\TransaksiMasterDealer;
use App\TransaksiReseler;
use App\Laporan;
Use App\LaporanLSY;
use App\Lsy;
use App\LaporanLSYQty;
use App\LaporanItemLsy;
use App\LaporanMetama;
use App\LaporanItemMetama;
use App\LaporanItemRheu;
use App\LaporanRheu;
class LaporanController extends Controller
{
    public function index()
    {
        $data['kantor'] = Kantor::all();
        $data['produksi'] = Produksi::all();
        return view('laporan.index', $data);
    }

    public function laporanKantor()
    {
        $kantor = Kantor::all();
        \Excel::create('Laporan Stok Kantor', function($excel) use ($kantor)
        {
            $excel->sheet('Laporan Stok Kantor', function($sheet) use ($kantor)
            {
                $row=1;
                $sheet->row($row, array(
                    'No', 'Kode Produk', 'Produk', 'Jenis Produk', 'Jumlah Stok'
                ));
                $no=1;
                foreach ($kantor as $v) {
                    $sheet->row(++$row,array(
                    $no,
                    $v->kode_produk,
                    $v->nama_produk,
                    $v->jenis_produk,
                    $v->jumlah_stok,
                ));
                $no++;
                }
            });
        })->export('xls');
    }
    public function laporanpabrik()
    {
        $produksi = Produksi::all();
        \Excel::create('Laporan Stok Pabrik', function($excel) use ($produksi)
        {
            $excel->sheet('Laporan Stok Pabrik', function($sheet) use ($produksi)
            {
                $row=1;
                $sheet->row($row, array(
                    'No', 'Kode Produk', 'Produk', 'Jenis Produk', 'Jumlah Stok'
                ));
                $no=1;
                foreach ($produksi as $v) {
                    $sheet->row(++$row,array(
                    $no,
                    $v->kode_produk,
                    $v->nama_produk,
                    $v->jenis_produk,
                    $v->jumlah_stok,
                ));
                $no++;
                }
            });
        })->export('xls');
    }
    public function laporanonline(Request $req)
    {
        $online = TransaksiOnline::whereBetween('created_at', [$req->date1, $req->date2])->get();
        \Excel::create('Laporan Transaksi Kantor', function($excel) use ($online)
        {
            $excel->sheet('Laporan Transaksi Kantor', function($sheet) use ($online)
            {
                $row=2;
                $sheet->row($row, array(
                    'No',  'Produk', 'Jenis Produk',  'Qty', 'Harga', 'Diskon', 'Batch', 'Jumlah', 'Tanggal'
                ));
                
                $no=1;
                foreach ($online as $v) {
                    $sheet->row(++$row,array(
                    $no,
                    $v->product_name,
                    $v->jenis_produk,
                    $v->qty,
                    $v->price,
                    $v->dis,
                    $v->batch,
                    $v->amount,
                    $v->created_at,
                ));
                
                $no++;
                }
            });
        })->export('xls');
    }
    public function laporanmasterdealer(Request $req)
    {
        $md = TransaksiMasterDealer::whereBetween('created_at', [$req->date1, $req->date2])->get();
        \Excel::create('Laporan Transaksi Master Dealer', function($excel) use ($md)
        {
            $excel->sheet('Laporan Transaksi Master Dealer', function($sheet) use ($md)
            {
                $row=2;
                $sheet->row($row, array(
                    'No',  'Kode MD', 'Kode Cs', 'Kode Produk', 'Toko', 'Nama Customer', 'No Handpone', 'Kota', 'Total', 'Nomor Invois', 'Tanggal'
                ));
                
                $no=1;
                foreach ($md as $v) {
                    $sheet->row(++$row,array(
                    $no,
                    $v->kode_md,
                    $v->kode_cs,
                    $v->kode_produk,
                    $v->nama_toko,
                    $v->nama_customer,
                    $v->notlp_customer,
                    $v->kota_customer,
                    $v->subtotal,
                    $v->nomor_invoice,
                    $v->created_at,
                   
                ));
                
                $no++;
                }
            });
        })->export('xls');
    }
    public function laporanreseler(Request $req)
    {
        $rs = TransaksiReseler::whereBetween('created_at', [$req->date1, $req->date2])->get();
        \Excel::create('Laporan Transaksi Master Dealer', function($excel) use ($rs)
        {
            $excel->sheet('Laporan Transaksi Master Dealer', function($sheet) use ($rs)
            {
                $row=2;
                $sheet->row($row, array(
                    'No',  'Nama Toko', 'Kode CS', 'Kode MD', 'Kode RS', 'Kode Produk', 'Nama Customer', 'No Handpone', 'Kota', 'Total', 'Nomor Invoice', 'Tanggal' 
                ));
                
                $no=1;
                foreach ($rs as $v) {
                    $sheet->row(++$row,array(
                    $no,
                    $v->nama_toko,
                    $v->kode_cs,
                    $v->kode_md,
                    $v->kode_rs,
                    $v->kode_produk,
                    $v->nama_customer,
                    $v->notlp_customer,
                    $v->kota_customer,
                    $v->subtotal,
                    $v->nomor_invoice,
                   
                ));
                
                $no++;
                }
            });
        })->export('xls');
    }
    public function laporanharian()
    {
        $laporan = \DB::table('laporan')
                ->join('laporan_items', 'laporan_items.id_laporan', '=', 'laporan.id')
                ->get();
        $data['laporan']  = $laporan;
        $data['costumer'] = Laporan::all();
        return view('laporan.harian', $data);
    }
    public function laporanlsy()
    {
       
        
     
      
        
       
        $laporan= LaporanLSY::all();
        $laporanitemlsy = LaporanItemLsy::all();
        $coba   = LaporanLSYQty::all();
        $produk = LSY::get('produk');
        $join = \DB::table('lsy')
                    ->join('lporan_item_lsy', 'lporan_item_lsy.id_laporan_lsy', '=', 'lsy.id')
                   
                    ->get();
       
        

        return view('laporan.lsy',compact(array('laporan', 'laporanitemlsy', 'join')));
    }
    public function lsyprint(Request $req)
    {
        $online = LaporanLSY::whereBetween('created_at', [$req->date1, $req->date2])->get();
        return $online;
        \Excel::create('Laporan Transaksi Kantor', function($excel) use ($online)
        {
            $excel->sheet('Laporan Transaksi Kantor', function($sheet) use ($online)
            {
                $row=2;
                $sheet->row($row, array(
                    'NO',  'TANGGAL', 'NO INVOIS',  'NAMA', 'ALAMAT', '', 'TELEPON', 'KODE MD/RS'
                ));
                
                $no=1;
                foreach ($online as $v) {
                    $sheet->row(++$row,array(
                    $v->no,
                    $v->tanggal,
                    $v->nomor_invois,
                    $v->nama,
                    $v->alamat,
                    $v->kota_kabupaten,
                    $v->telepon,
                    $v->kode_md_rs,
                    $v->created_at,
                ));
                
                $no++;
                }
            });
        })->export('xls');
    }
    public function laporanmetama()
    {
        $laporan= LaporanMetama::all();
        $laporanitemlsy = LaporanItemMetama::all();
        
        $coba   = LaporanLSYQty::all();
        $produk = LSY::get('produk');
        $join = \DB::table('lsy')
                    ->join('lporan_item_lsy', 'lporan_item_lsy.id_laporan_lsy', '=', 'lsy.id')
                   
                    ->get();
       
        

        return view('laporan.metama',compact(array('laporan', 'laporanitemlsy', 'join')));
       
    }
    public function rheumapas()
    {
        $laporan= LaporanRheu::all();
        $laporanitemlsy = LaporanItemRheu::all();
        
        $coba   = LaporanLSYQty::all();
        $produk = LSY::get('produk');
        $join = \DB::table('lsy')
                    ->join('lporan_item_lsy', 'lporan_item_lsy.id_laporan_lsy', '=', 'lsy.id')
                   
                    ->get();
       
        

        return view('laporan.rheumapas',compact(array('laporan', 'laporanitemlsy', 'join')));
    }
}

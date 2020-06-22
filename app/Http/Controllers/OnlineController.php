<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Kantor;
Use App\TransaksiOnline;
use DB;
use Auth;
use App\Laporan;
use App\User;
use App\LaporanLSY;
use App\RcItemPenjualan;
use App\LaporanItem;
use App\no;
use App\LaporanItemLsy;
use App\LaporanLSYQty;
use App\LaporanMetama;
use App\LaporanItemMetama;
use App\LaporanRheu;
class OnlineController extends Controller
{
    public function store(Request $req)
    {
        
        $id = LaporanLSY::getid();
        $no = no::getno();

        if ($req->kategori == "LSY") {
            $data = new LaporanLSY;
            $data->nama = $req->nama_customer;
            $data->tanggal = $req->tanggal;
            $data->alamat = $req->alamat_customer;
            $data->kota   = $req->kota_kabupaten;
            $data->kode_md_rs = $req->jenis_toko;
            $data->telepon    = $req->notlp_customer;
            $data->disc       = max($req->dis);
            $data->jumlah     = $req->subtotal;
            $data->cs         = $req->kode_cs;
            $data->paking     = 'NITA';
            $data->keterangan = '';
            $data->nomor_invois = $x->nomor_invoice;
            $data->no = LaporanLSY::getno() +1;

            // $data->save();
            foreach ($req->kode_produk as $v => $value) {
                $laporanlsyitem = array(
                    'id_laporan_lsy'=>LaporanLSY::getid(),
                    'produk'=>$req->kode_produk[$v],
                    'qtyin'=>$req->qty[$v],
                    'jumlah'=>$req->amount[$v]
                );
                return $laporanlsyitem;
                LaporanItemLsy::insert($laporanlsyitem);

            }

           //fungsi laporan metama//
        } elseif($req->kategori == "MET") {
            $data = new LaporanMetama;
            $data->nama = $req->nama_customer;
            $data->tanggal = $req->tanggal;
            $data->alamat = $req->alamat_customer;
            $data->kota   = $req->kota_kabupaten;
            $data->kode_md_rs = $req->jenis_toko;
            $data->telepon    = $req->notlp_customer;
            $data->disc       = max($req->dis);
            $data->jumlah     = $req->subtotal;
            $data->cs         = $req->kode_cs;
            $data->paking     = 'NITA';
            $data->keterangan = '';
            // $data->nomor_invois = $x->nomor_invoice;
            $data->no = LaporanMetama::getno() +1;

            $data->save();

            foreach ($req->kode_produk as $v => $value) {
                $LaporanitemMetama = array(
                    'id_laporan_metama'=>LaporanMetama::getid(),
                    'produk'=>$req->kode_produk[$v],
                    'qty'=>$req->qty[$v],
                    'jumlah'=>$req->amount[$v]
                );

                LaporanitemMetama::insert($LaporanitemMetama);

            }
            return redirect('home_admin');

            //fungsi laporan rheumapas
        }elseif($req->kategori == "RHEU"){
            $data = new LaporanRheu;
            $data->nama = $req->nama_customer;
            $data->tanggal = $req->tanggal;
            $data->alamat = $req->alamat_customer;
            $data->kota   = $req->kota_kabupaten;
            $data->kode_md_rs = $req->jenis_toko;
            $data->telepon    = $req->notlp_customer;
            $data->disc       = max($req->dis);
            $data->jumlah     = $req->subtotal;
            $data->cs         = $req->kode_cs;
            $data->paking     = 'NITA';
            $data->keterangan = '';
            $data->nomor_invois = 1;
            $data->no = LaporanRheu::getno() +1;
            $data->save();
            return $data;
        }else{
            return "no";
        }




    $rules = [

            'tanggal'         =>'required',
            'nama_customer'     =>'required',
            'notlp_customer'       =>'required',
            'alamat_customer'       =>'required',
            'desa_kelurahan'       =>'required',
            'kecamtan'       =>'required',
            'kota_kabupaten'       =>'required',
            'provinsi'       =>'required',
            'kode_pos'       =>'required',
    ];
    $messages = [
        'tanggal.required'            =>'Tanggal Masih Kosong',
        'nama_customer.required'       =>'Nama Masih Kosong',
        'notlp_customer.required'     =>'no Handpone Masih Kosong',
        'alamat_customer.required'     =>'Alamat Masih Kosong',
        'desa_kelurahan.required'     =>'Desa/Kelurahan Masih Kosong',
        'kecamtan.required'          =>'Kecamatan Masih Kosong',
        'kota_kabupaten.required'     =>'Kota/Kabupaten Masih Kosong',
        'kode_pos.required'           =>'Kode Pos Masih Kosong',

    ];
        $this->validate($req, $rules, $messages);

        $kode = $req->get('kategori');
        $id = order::getid();
        $b      = date('d');
        $blt    = date('my ');
        $a = 1;

       if ("reset" == $req->reset) {

                $x = new order;
                $x->no = 1;
                $x->kode_cs =      $req->kode_cs;
                $x->jenis_toko     = $req->jenis_toko;
                $x->nama_customer = $req->nama_customer;
                $x->notlp_customer = $req->notlp_customer;
                $x->kota_customer = $req->kota_customer;
                $x->alamat_customer = $req->alamat_customer;

                $x->nomor_invoice = 'TP.OL.'.$kode.'/'.$blt.'/'.$x->no;
                $x->subtotal = $req->subtotal;
                $x->kategori = $req->kategori;
                $x->tanggal  = $req->tanggal;

                $x->provinsi = $req->provinsi;
                $x->kota_kabupaten = $req->kota_kabupaten;
                $x->kecamatan  = $req->kecamtan;
                $x->desa_kelurahan = $req->desa_kelurahan;
                $x->kode_pos = $req->kode_pos;
                // $dis25 = $req->subtotal - ($req->price1 * $req->disrs / 100);
                // $dis15 = $req->subtotal * 15 / 100;
                // $data->dis25 = $dis25;
                // $data->dis15 = $dis15;

                $x->save();

       }else{

        $f = Order::getid() + 1;

        $x = new order;
        $x->no = $f;
        $x->kategori = $req->kategori;
        $x->kode_cs =       $req->kode_cs;
        $x->jenis_toko     = $req->jenis_toko;
        $x->kategori = $req->kategori;
        $x->nama_customer = $req->nama_customer;
        $x->notlp_customer = $req->notlp_customer;
        $x->kota_customer = $req->kota_customer;
        $x->alamat_customer = $req->alamat_customer;

        $x->nomor_invoice = 'TP.OL.'.$kode.'/'.$blt.'/'.$x->no;
        $x->subtotal = $req->subtotal;
        $x->tanggal = $req->tanggal;
        $x->provinsi = $req->provinsi;
        $x->kota_kabupaten = $req->kota_kabupaten;
        $x->kecamatan  = $req->kecamtan;
        $x->desa_kelurahan = $req->desa_kelurahan;
        $x->kode_pos = $req->kode_pos;
        $x->save();

       }

       if (count($req->product_name)>0) {
          foreach ($req->product_name as $item => $v) {
              $data = array([
                  'orders_id'=>$x->id,
                  'product_name'=>$req->product_name[$item],
                  'jenis_produk'=>$req->jenis_produk[$item],
                  'qty'=>$req->qty[$item],
                  'price'=>$req->price[$item],
                  'dis'=>$req->dis[$item],
                  'batch'=>$req->batch[$item],
                'amount'=>$req->amount[$item],
              ]);
              TransaksiOnline::insert($data);

            $ids = $req->input('ids');
            $kode = $req->input('kode_produk');
            $qty  = $req->input('qty');
            $stok =  $req->input('stok');

            foreach ($ids as $v => $ids) {
                $values = array(

                    'jumlah_stok'=>$stok[$v] - $qty[$v]
                );
                \DB::table('kantors')->where('id',$ids)->update($values);

            }


          }

          $id = LaporanLSY::getid();
        $no = no::getno();

        if ($req->kategori == "LSY") {
            $data = new LaporanLSY;
            $data->nama = $req->nama_customer;
            $data->tanggal = $req->tanggal;
            $data->alamat = $req->alamat_customer;
            $data->kota   = $req->kota_kabupaten;
            $data->kode_md_rs = $req->jenis_toko;
            $data->telepon    = $req->notlp_customer;
            $data->disc       = array_sum($req->dis);
            $data->jumlah     = $req->subtotal;
            $data->cs         = $req->kode_cs;
            $data->paking     = 'NITA';
            $data->keterangan = '';
            $data->nomor_invois = $x->nomor_invoice;
            $data->no = LaporanLSY::getno() +1;

            $data->save();
            foreach ($req->kode_produk as $v => $value) {
                $laporanlsyitem = array(
                    'id_laporan_lsy'=>LaporanLSY::getid(),
                    'produk'=>$req->kode_produk[$v],
                    'qtyin'=>$req->qty[$v],
                    'jumlah'=>$req->amount[$v]
                );
                LaporanItemLsy::insert($laporanlsyitem);

            }


        } elseif($req->kategori == "MET") {
            return  "Tamabh Laporan Metama";
        }elseif($req->kategori == "RHEU"){
            return "Tamabah Laporan Rheumapas";
        }else{
            return "no";
        }



          return redirect('home_admin');
       }



    }
    public function hapus($id)
    {
        DB::table("orders")->delete($id);

        return back();

    }
    public function test()
    {
        $data['aa'] = 2;
        return view('toko.show', $data);
    }
    public function repeat($id)
    {
       $data['repeat'] = Order::find($id);
       $data['kantor'] = Kantor::all();
       return view('toko.repeat', $data);
    }
    public function repeatstore(Request $req)
    {






    $rules = [

        'tanggal'         =>'required',
        'nama_customer'     =>'required',
        'notlp_customer'       =>'required',
        'alamat_customer'       =>'required',
        'desa_kelurahan'       =>'required',
        'kecamtan'       =>'required',
        'kota_kabupaten'       =>'required',
        'provinsi'       =>'required',
        'kode_pos'       =>'required',
];
$messages = [
    'tanggal.required'            =>'Tanggal Masih Kosong',
    'nama_customer.required'       =>'Nama Masih Kosong',
    'notlp_customer.required'     =>'no Handpone Masih Kosong',
    'alamat_customer.required'     =>'Alamat Masih Kosong',
    'desa_kelurahan.required'     =>'Desa/Kelurahan Masih Kosong',
    'kecamtan.required'          =>'Kecamatan Masih Kosong',
    'kota_kabupaten.required'     =>'Kota/Kabupaten Masih Kosong',
    'kode_pos.required'           =>'Kode Pos Masih Kosong',

];
    $this->validate($req, $rules, $messages);

    $kode = $req->get('kategori');
    $id = order::getid();
    $b      = date('d');
    $blt    = date('my ');
    $a = 1;

   if ("reset" == $req->reset) {

            $x = new order;
            $x->no = 1;
            $x->kode_cs =      $req->kode_cs;
            $x->jenis_toko     = $req->jenis_toko;
            $x->nama_customer = $req->nama_customer;
            $x->notlp_customer = $req->notlp_customer;
            $x->kota_customer = $req->kota_customer;
            $x->alamat_customer = $req->alamat_customer;

            $x->nomor_invoice = 'TP.OL.'.$kode.'/'.$blt.'/'.$x->no;
            $x->subtotal = $req->subtotal;
            $x->kategori = $req->kategori;
            $x->tanggal  = $req->tanggal;

            $x->provinsi = $req->provinsi;
            $x->kota_kabupaten = $req->kota_kabupaten;
            $x->kecamatan  = $req->kecamtan;
            $x->desa_kelurahan = $req->desa_kelurahan;
            $x->kode_pos = $req->kode_pos;
            // $dis25 = $req->subtotal - ($req->price1 * $req->disrs / 100);
            // $dis15 = $req->subtotal * 15 / 100;
            // $data->dis25 = $dis25;
            // $data->dis15 = $dis15;

            $x->save();

   }else{

    $f = Order::getid() + 1;

    $x = new order;
    $x->no = $f;
    $x->kategori = $req->kategori;
    $x->kode_cs =       $req->kode_cs;
    $x->jenis_toko     = $req->jenis_toko;
    $x->kategori = $req->kategori;
    $x->nama_customer = $req->nama_customer;
    $x->notlp_customer = $req->notlp_customer;
    $x->kota_customer = $req->kota_customer;
    $x->alamat_customer = $req->alamat_customer;

    $x->nomor_invoice = 'TP.OL.'.$kode.'/'.$blt.'/'.$x->no;
    $x->subtotal = $req->subtotal;
    $x->tanggal = $req->tanggal;
    $x->provinsi = $req->provinsi;
    $x->kota_kabupaten = $req->kota_kabupaten;
    $x->kecamatan  = $req->kecamtan;
    $x->desa_kelurahan = $req->desa_kelurahan;
    $x->kode_pos = $req->kode_pos;
    $x->save();

   }

   if (count($req->product_name)>0) {
      foreach ($req->product_name as $item => $v) {
          $data = array([
              'orders_id'=>$x->id,
              'product_name'=>$req->product_name[$item],
              'jenis_produk'=>$req->jenis_produk[$item],
              'qty'=>$req->qty[$item],
              'price'=>$req->price[$item],
              'dis'=>$req->dis[$item],
              'batch'=>$req->batch[$item],
            'amount'=>$req->amount[$item],
          ]);
          TransaksiOnline::insert($data);

        $ids = $req->input('ids');
        $kode = $req->input('kode_produk');
        $qty  = $req->input('qty');
        $stok =  $req->input('stok');

        foreach ($ids as $v => $ids) {
            $values = array(

                'jumlah_stok'=>$stok[$v] - $qty[$v]
            );
            \DB::table('kantors')->where('id',$ids)->update($values);

        }


      }

      $id = LaporanLSY::getid();
    $no = no::getno();

    if ($req->kategori == "LSY") {
        $data = new LaporanLSY;
        $data->nama = $req->nama_customer;
        $data->tanggal = $req->tanggal;
        $data->alamat = $req->alamat_customer;
        $data->kota   = $req->kota_kabupaten;
        $data->kode_md_rs = $req->jenis_toko;
        $data->telepon    = $req->notlp_customer;
        $data->disc       = max($req->dis);
        $data->jumlah     = $req->subtotal;
        $data->cs         = $req->kode_cs;
        $data->paking     = 'NITA';
        $data->keterangan = 'Repeat';
        $data->nomor_invois = $x->nomor_invoice;
        $data->no = LaporanLSY::getno() +1;

        $data->save();
        foreach ($req->kode_produk as $v => $value) {
            $laporanlsyitem = array(
                'id_laporan_lsy'=>LaporanLSY::getid(),
                'produk'=>$req->kode_produk[$v],
                'qtyin'=>$req->qty[$v],
                'jumlah'=>$req->amount[$v]
            );
            LaporanItemLsy::insert($laporanlsyitem);

        }


    } elseif($req->kategori == "MET") {
        return  "Tamabh Laporan Metama";
    }elseif($req->kategori == "RHEU"){
        return "Tamabah Laporan Rheumapas";
    }else{
        return "no";
    }



      return redirect('home_admin');
   }

    }
}

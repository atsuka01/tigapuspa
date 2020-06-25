<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiMasterDealer;
use App\MasterDealer;
use App\Kantor;
use App\Order;
use App\PenjualanMasterDealer;
use App\User;
use App\CostumerService;
use PDF;
use App\LaporanLSY;
class TrnsaksiMdController extends Controller
{
    public function index()
    {
        
        $data['md'] = MasterDealer::get();
        $data['kantor'] = Kantor::get();
        $data['cs'] = CostumerService::get();
        return view('transaksimd.index', $data);
    }
    public function store(Request $req)
    {    
        $id = LaporanLSY::getid();
    
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
        }else if($req->kategori == "MET"){
            return "Buat Laporan MET";
        }else if($req->kategori == "RHEU"){
            return "buat laporan Rheumapas";
        }else{
            return "no";
        }
        $rules = [
            
            'nama_toko'         =>'required',
            'kodem_md'     =>'required',
            'tlp_cs'       =>'required',
            'kode_cs'      =>'required',
        
            'nama_customer'      =>'required',
            'notlp_customer'      =>'required',
            'alamat_customer'       =>'required',
            'desa_kelurahan'       =>'required',
            'kecamatan'       =>'required',
            'kota_kabupaten'       =>'required',
            'provinsi'       =>'required',
            'kodepos'       =>'required',
    ];
    $messages = [
        'nama_toko.required'            =>'Nama Toko Masih Kosong',
      
        'kodem_md.required'            =>'Kode MD Masih Kosong',
        'tlp_cs.required'            =>'No Handpone Cs Masih Kosong',
        'kode_cs.required'            =>'Kode Cs Masih Kosong',
        
        'nama_customer.required'       =>'Nama Masih Kosong',
        'notlp_customer.required'     =>'no Handpone Masih Kosong',
        'alamat_customer.required'     =>'Alamat Masih Kosong',
        'desa_kelurahan.required'     =>'Desa/Kelurahan Masih Kosong',
        'kecamatan.required'          =>'Kecamatan Masih Kosong',
        'kota_kabupaten.required'     =>'Kota/Kabupaten Masih Kosong',
        'kodepos.required'           =>'Kode Pos Masih Kosong',

    ];
        $this->validate($req, $rules, $messages);

       
      
        $id = TransaksiMasterDealer::getid();
        $b      = date('d');
        $blt    = date('my ');
        $reset  = $req->reset;
        if ($reset == "reset") {
            $data = new TransaksiMasterDealer;
            $data->no = 1;
            $data->kode_produk = $req->kode_produk;
            $data->kodem_md =$req->kodem_md;
            $data->tlp_cs =$req->tlp_cs;
            $data->kode_cs =$req->kode_cs;
            $data->kategori =$req->kategori;
            $data->nama_customer =$req->nama_customer;
            $data->alamat_customer =$req->alamat_customer;
            $data->nama_toko =$req->nama_toko;
            $data->notlp_customer =$req->notlp_customer;
            $data->kota_customer =$req->kota_customer;
            $data->subtotal =$req->subtotal;
            $data->provinsi =$req->provinsi;
            $data->kota_kabupaten =$req->kota_kabupaten;
            $data->kecamatan =$req->kecamatan;
            $data->desa_kelurahan =$req->desa_kelurahan;
            $data->kodepos =$req->kodepos;
            $data->nomor_invoice  = 'TP.MD.ALL'.'/'.$data->no;
            $data->tanggal = $req->tanggal;
           
            $data->save();
            
            foreach ($req->product_name as $item => $req->product_nameE) {
                $array = array(
                        'id_transaksimd'=>TransaksiMasterDealer::ambilid(),
                        'product_name'=>$req->product_name[$item],
                        'kodeproduk'=>$req->kode_produk[$item],
                        'dismd'=>$req->dismd[$item],
                        'qty'=>$req->qty[$item],
                        'price'=>$req->price[$item],
                        'dis'=>$req->dis[$item],
                        'dismd'=>$req->dismd[$item],
                        'batch'=>$req->batch[$item],
                        'diskonmd'=>$req->diskonmd[$item],
                        'amount'=>$req->amount[$item],
                        
                );
               \DB::table('penjualan_master_dealers')->insert($array);
                $idp = $req->idp;
                $stok = $req->stok;
                $qty = $req->qty;
                $value = array(
                        'jumlah_stok'=>$stok[$item] - $qty[$item]
                );
                \DB::table('kantors')->where('id', $req->idp[$item])->update($value);
                
            }
            return Redirect('home_admin');

        }else{
            $data = new TransaksiMasterDealer;
            $data->no = TransaksiMasterDealer::getid() + 1;
            
            $data->kode_produk = $req->kode_produk;
            $data->kodem_md =$req->kodem_md;
            $data->tlp_cs =$req->tlp_cs;
            $data->kode_cs =$req->kode_cs;
            $data->kategori =$req->kategori;
            $data->nama_customer =$req->nama_customer;
            $data->alamat_customer =$req->alamat_customer;
            $data->nama_toko =$req->nama_toko;
            $data->notlp_customer =$req->notlp_customer;
            $data->kota_customer =$req->kota_customer;
            $data->subtotal =$req->subtotal;
            $data->provinsi =$req->provinsi;
            $data->kota_kabupaten =$req->kota_kabupaten;
            $data->kecamatan =$req->kecamatan;
            $data->desa_kelurahan =$req->desa_kelurahan;
            $data->kodepos =$req->kodepos;
            $data->nomor_invoice  = 'TP.MD.ALL'.'/'.$data->no;
            $data->tanggal = $req->tanggal;
           
            $data->save();
            
            foreach ($req->product_name as $item => $req->product_nameE) {
                $array = array(
                    'id_transaksimd'=>TransaksiMasterDealer::ambilid(),
                    'product_name'=>$req->product_name[$item],
                    'kodeproduk'=>$req->kode_produk[$item],
                    'dismd'=>$req->dismd[$item],
                    'qty'=>$req->qty[$item],
                    'price'=>$req->price[$item],
                    'dis'=>$req->dis[$item],
                    'dismd'=>$req->dismd[$item],
                    'batch'=>$req->batch[$item],
                    'diskonmd'=>$req->diskonmd[$item],
                    'amount'=>$req->amount[$item],

                        
                );
               \DB::table('penjualan_master_dealers')->insert($array);
               
                
            }
            foreach ($req->idp as $v => $item) {
                $value = array(
                    'jumlah_stok'=>$req->stok[$v] - $req->qty[$v]
                );
                \DB::table('kantors')->where('id', $req->idp[$v])->update($value);
            }
            return Redirect('home_admin');
        }
       
        
    }
   
    public function preview($id)
    {
        $md = \DB::table('penjualan_master_dealers')
                        ->join('transaksi_master_dealers', 'transaksi_master_dealers.id', '=', 'penjualan_master_dealers.id_transaksimd' )
                        ->where('id_transaksimd','=', $id)
                        ->get();
        $data['datapenjualanmd'] = $md;
        $data['datatransaksimd'] = TransaksiMasterDealer::find($id);
        return view('masterdealer.review', $data);
    }
    public function printalamat($id)
    {
        $data['datatransaksimd'] = TransaksiMasterDealer::find($id);
        $data['penjualanmd'] = PenjualanMasterDealer::orderBy('id_transaksimd', 'ASC');
        return view('masterdealer.printalamat', $data);
    }
    public function hapus($id)
    {
        \DB::table("transaksi_master_dealers")->delete($id);

        return back();

    }
    public function print($id)
    {
        $join = \DB::table('transaksi_master_dealers')
                ->join('penjualan_master_dealers', 'penjualan_master_dealers.id_transaksimd', '=', 'transaksi_master_dealers.id')
                ->where('id_transaksimd', '=', $id)
                ->get();
        $data['penjualanmd'] = $join;
        $data['transaksimd'] = TransaksiMasterDealer::find($id);
        $pdf = PDF::loadview('masterdealer.print', $data);
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
    }
   
}

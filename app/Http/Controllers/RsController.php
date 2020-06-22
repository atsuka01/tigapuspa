<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reseler;
use App\MasterDealer;
use App\Kantor;
use App\CostumerService;
use App\TransaksiReseler;
use App\PenjualanReseler;
use App\StokReseler;
use App\tampungStokRs;
use App\InvoisRs;
use App\NoInvoice;
use PDF;

use Auth;
class RsController extends Controller
{
    public function reapit($id)
    {
        $md = \DB::table('master_dealers')
                ->join('reselers', 'reselers.id_md', '=', 'master_dealers.id')
                ->get();
        $data['rs'] = $md;
        $data['kantor'] = Kantor::get();
        $data['transaksirs'] = TransaksiReseler::find($id);
        $data['cs'] = CostumerService::get(); 
       
        return view('reseler.reapit', $data);
    }
    public function index()
    {
       $md = \DB::table('master_dealers')
                ->join('reselers', 'reselers.id_md', '=', 'master_dealers.id')
                ->get();
        $data['md'] = $md;
        $data['reseler'] = Reseler::all();
        return view('reseler.index', $data, ['Reseler'=>\App\Reseler::paginate(10)]);
    }
    public function edit($id)
    {
        $penjualanrs = \DB::table('penjualan_reselers')
                        ->join('transaksi_reselers', 'transaksi_reselers.id', '=', 'penjualan_reselers.id_transaksireseler')
                        ->where('transaksi_reselers.id', $id)
                        ->get();
                  
        $data['penjualanrs'] = $penjualanrs;
        $data['rs'] = TransaksiReseler::find($id);
        return view('reseler.edittransaksi', $data);
    }
    public function update($id, Request $req)
    {
        
        
       $update = PenjualanReseler::where('id_transaksireseler', '=', $req->id)->first();
       if ($update) {
            $rs = TransaksiReseler::find($req->id);
            $rs->nama_customer = $req->nama_customer;
            $rs->alamat_customer = $req->alamat_customer;
            $rs->kota_customer   = $req->kota_customer;
            $rs->notlp_customer   = $req->notlp_customer;
            $rs->tanggal   = $req->tanggal;
            $rs->kode_md   = $req->kode_md;
            $rs->kode_rs   = $req->kode_rs;
            $rs->kode_cs   = $req->kode_cs;
            $rs->update();
           
          
       }else{
           return "no";
       }
       $penjualan = PenjualanReseler::where('id_transaksireseler', '=', $req->id)->where('kodeproduk', $req->kodeproduk)->first();
       if ($penjualan) {
          $penjualan = PenjualanReseler::find($penjualan->id);
          return $penjualan;
        
       }
       
    }
    public function transaksirs()
    {

        $md = \DB::table('master_dealers')
                ->join('reselers', 'reselers.id_md', '=', 'master_dealers.id')
                ->get();
        $data['rs'] = $md;
        $data['kantor'] = Kantor::get();
        $data['cs'] = CostumerService::get(); 
        return view('reseler.transaksirs', $data);
    }
    public function store(Request $req)
    {
    
     $rules = [
        'nama_toko'=>'required',
        'tlp_cs'=>'required',
        'kode_cs'=>'required',
        'kode_rs'=>'required',
        'kode_md'=>'required',
        'tanggal'         =>'required',
        'nama_customer'     =>'required',
        'notlp_customer'       =>'required',
        'alamat_customer'       =>'required',
        'desa_kelurahan'       =>'required',
        'kecamatan'       =>'required',
        'kota_kabupaten'       =>'required',
        'provinsi'       =>'required',
        'kode_pos'       =>'required',
];
$messages = [
    'nama_toko'=>'Masih Kosong',
    'tlp_cs'=>'Masih Kosong',
    'kode_cs'=>'Masih Kosong',
    'kode_rs'=>'Masih Kosong',
    'kode_md'=>'Masih Kosong',
    'tanggal.required'            =>'Tanggal Masih Kosong',
    'nama_customer.required'       =>'Nama Masih Kosong',
    'notlp_customer.required'     =>'no Handpone Masih Kosong',
    'alamat_customer.required'     =>'Alamat Masih Kosong',
    'desa_kelurahan.required'     =>'Desa/Kelurahan Masih Kosong',
    'kecamatan.required'          =>'Kecamatan Masih Kosong',
    'kota_kabupaten.required'     =>'Kota/Kabupaten Masih Kosong',
    'kode_pos.required'           =>'Kode Pos Masih Kosong',

];
    $this->validate($req, $rules, $messages);
        
        $kode = $req->get('kategori');
        $id = TransaksiReseler::getid();
        $b      = date('d');
        $blt    = date('my ');
        $no     = TransaksiReseler::getno() + 1; 
        

        if ("reset" == $req->reset) {
           $data = new TransaksiReseler;
           $data->nama_toko = $req->nama_toko;
           $data->tlp_cs = $req->tlp_cs;
           $data->kode_cs = $req->kode_cs;
           $data->kode_rs = $req->kode_rs;
           $data->kode_md = $req->kode_md;
           $data->kode_produk = $req->kode_produk;
           $data->subtotal = $req->amount;
           $data->nama_customer = $req->nama_customer;
           $data->notlp_customer = $req->notlp_customer;
           $data->alamat_customer = $req->alamat_customer;
           $data->desa_kelurahan = $req->desa_kelurahan;
           $data->kecamatan = $req->kecamatan;
           $data->kota_kabupaten = $req->kota_kabupaten;
           $data->nomor_invoice = 'TP.RS.ALL'.'/'.$no;
           $data->provinsi = $req->provinsi;
           $data->kode_pos = $req->kode_pos;
           $data->tanggal = $req->tanggal;
           $data->no= $no;
           $data->dis = max($req->dis);
           $data->disrs = array_sum($req->price) * array_sum($req->qty)  - array_sum($req->disrs) / 100;
           $data->dismd = array_sum($req->price) * array_sum($req->qty)  - array_sum($req->dismd) / 100;
          
          
           $data->subtotal = $req->subtotal;
           $data->save();
          
            foreach ($req->kodeproduk as $item => $value) {
               $dataSet = array (
                        'id_transaksireseler'=> TransaksiReseler::getid(),
                        'produk'=>$req->product_name[$item],
                        'kodeproduk'=>$req->kodeproduk[$item],
                        'batch'=>$req->batch[$item],
                        'qty'=>$req->qty[$item],
                        'price'=>$req->price[$item],
                        'batch'=>$req->batch[$item],
                        'amount'=>$req->amount[$item]
               );
               \DB::table('penjualan_reselers')->insert($dataSet);
            }
            
            foreach ($req->idproduk as $v => $value) {
                $value = array(
                    'jumlah_stok'=>$req->stok[$v] - $req->qty[$v]
                );
                \DB::table('kantors')->where('id', $req->idproduk[$v])->update($value);
               
            }
            return redirect('home_admin');
        }else{
            $data = new TransaksiReseler;
            $data->nama_toko = $req->nama_toko;
            $data->tlp_cs = $req->tlp_cs;
            $data->kode_cs = $req->kode_cs;
            $data->kode_rs = $req->kode_rs;
            $data->kode_md = $req->kode_md;
            $data->kode_produk = $req->kode_produk;
            $data->subtotal = $req->amount;
            $data->nama_customer = $req->nama_customer;
            $data->notlp_customer = $req->notlp_customer;
            $data->alamat_customer = $req->alamat_customer;
            $data->desa_kelurahan = $req->desa_kelurahan;
            $data->kecamatan = $req->kecamatan;
            $data->kota_kabupaten = $req->kota_kabupaten;
            $data->nomor_invoice = 'TP.RS.ALL'.'/'.$no;
            $data->provinsi = $req->provinsi;
            $data->kode_pos = $req->kode_pos;
            $data->tanggal = $req->tanggal;
            $data->no= $no;
            $data->dis = max($req->dis);
            $data->disrs = array_sum($req->price) * array_sum($req->qty)  - array_sum($req->disrs) / 100;
            $data->dismd = array_sum($req->price) * array_sum($req->qty)  - array_sum($req->dismd) / 100;
           
           
            $data->subtotal = $req->subtotal;
            $data->save();
           
             foreach ($req->kodeproduk as $item => $value) {
                $dataSet = array (
                         'id_transaksireseler'=> TransaksiReseler::getid(),
                         'produk'=>$req->product_name[$item],
                         'kodeproduk'=>$req->kodeproduk[$item],
                    
                         'qty'=>$req->qty[$item],
                         'price'=>$req->price[$item],
                         'batch'=>$req->batch[$item],
                         'amount'=>$req->amount[$item]
                );
                \DB::table('penjualan_reselers')->insert($dataSet);
             }
             
             foreach ($req->idproduk as $v => $value) {
                 $value = array(
                     'jumlah_stok'=>$req->stok[$v] - $req->qty[$v]
                 );
                 \DB::table('kantors')->where('id', $req->idproduk[$v])->update($value);
                
             }
             return redirect('home_admin');
           
        }
        
    }
    public function review($id)
    {
        $PenjualanReseler = \DB::table('penjualan_reselers')
                        ->join('transaksi_reselers', 'transaksi_reselers.id', '=', 'penjualan_reselers.id_transaksireseler')
                        ->where('id_transaksireseler', $id)
                        ->get();
        $data['penjualanrs'] = $PenjualanReseler;
        $data['transaksirs'] = TransaksiReseler::find($id);
        return view('reseler.review', $data);
    }
    public function printalamat($id)
    {
        $data['transaksirs'] = TransaksiReseler::find($id);
        return view('reseler.printalamat', $data);
    }
    public function hapus($id)
    {
        \DB::table("transaksi_reselers")->delete($id);

        return back();

    }
    public function stok($id)
    {
        $invoisrs = InvoisRs::all()->sortByDesc($id);
        $record = StokReseler::all()->sortByDesc($id);
        $data['tampung'] = tampungStokRs::where('idrs', '=', $id)->get();   
        $data['kantor'] = Kantor::get();
        $data['rs'] = Reseler::find($id);
        return  view('reseler.stok', $data,[
            'record'=>$record,
            'record'=> \App\StokReseler::where('idrs', '=', $id)->simplePaginate(3),
            'invoisrs'=>$invoisrs,
            'invoisrs'=> \App\InvoisRs::where('idrs', '=', $id)->simplePaginate(3)
        ]);
    }
    public function nomor(Request $request)
    {
        $data['x'] = 20;
        return view('reseler.stok', $data);
    }
    public function proses(Request $request)
    {
    return  $req->all();
    }
    public function invois(Request $request)
    {
        $kode = $request->get('kode_produk');
        $id = InvoisRs::getid();
        $b = date('d');
        $blt = date('my');
        $x = InvoisRs::get('no')->sum(1);
        foreach ($id as $v) {
           
            if ($b == 1) {
                $x = $x ;
                if ($b > $x  ) {
                    $x++;
                }else{
                    $x++;
                }
            }else{
            str_replace("0", "", "0001");
             $x++;
            }
        }
        $no    = 'TP.RS.'.$kode.'/'.$blt.'/'.$x;
        $data = new InvoisRs($request->all());
        $data->nomorinvois = $no;
        $data->no = $x;
        $data->kode_md;
        $data->product_name;
        $data->jenis_produk;
        $data->qtyin;
        $data->ed;
        $jumlah = $data->qtyin * $request->harga;
        $total  = $jumlah * $request->diskon / 100;
        $data->jumlah = $jumlah;
        $data->total  = $total;
        $grandtotal = $jumlah - $total;
        $data->grandtotal = $grandtotal; 
        $data->save();

        $tampungStokRs  = tampungStokRs::where('idrs', '=', $request->idrs)->where('kodeproduk', '=', $request->kode_produk)->first();
          if ($tampungStokRs) {
              if ($tampungStokRs->jumlah_stok > 0 ) {
                $stokrs = tampungStokRs::where('idrs', '=', $request->idrs)->where('kodeproduk', '=', $request->kode_produk)->get();
                $x = $stokrs->sum('jumlah_stok') - $request->qtyin;
                $data['nomor_suratjalan'] = $data->nomorinvois;
                $data['nama'] = $request->nama;
                $data['qty'] = $request->qtyin;
                $data['alamat'] = $request->alamat;
              $tampungStokRs = tampungStokRs::where('kodeproduk', '=', $request->kode_produk)->update([
                            'jumlah_stok'=>$x
                    ]);
                    $pdf = PDF::loadview('reseler.invoisrs', $data);
                    $custome = array(0,0, 648, 396);
                    $pdf->setPaper($custome);
                    return $pdf->stream();
              }else{
                    return "stok Kosong";
              }
          } else {
              return "sdfdsfds";
          }
       
    }
    public function print($id)
    {
      
       $join = \DB::table('transaksi_reselers')
                ->join('penjualan_reselers', 'penjualan_reselers.id_transaksireseler', '=', 'transaksi_reselers.id')
                ->where('id_transaksireseler', '=', $id)
                ->get();
        $data['penjualanrs'] = $join;
        $data['rs'] = TransaksiReseler::find($id);
       
        $pdf = PDF::loadview('reseler.print', $data);
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
    }
    public function retur($id, Request $req)
    {
        

        $join = \DB::table('transaksi_reselers')
        ->join('penjualan_reselers', 'penjualan_reselers.id_transaksireseler', '=', 'transaksi_reselers.id')
        ->join('kantors', 'kantors.id', '=', 'penjualan_reselers.id_produk')
        ->where('id_transaksireseler', '=', $id)
        ->get();
        $data['penjualanrs'] = $join;
        $data['rs'] = TransaksiReseler::find($id);
        return view('reseler.retur', $data);
        
    }
    public function updateretur(Request $req)
    {
       
        
       
       
       
        $kodeproduk = $req->kodeproduk;
        $idproduk   = $req->idproduk;
        $stok       = $req->stok;
        $qty = $req->qty;
        foreach ($idproduk as $v => $idproduk) {
            $value = array(
                'jumlah_stok'=>$stok[$v] + $qty[$v]
            );
            
            
            // \DB::table('kantors')->where('id',$idproduk)->update($value);
        }
        
    }
    public function delete($id,Request $req)
    {
       $transaksi_Rs = TransaksiReseler::find($id)->delete();
       $penjualan_rs = PenjualanReseler::where('id_transaksireseler', $id)->delete();
       return redirect('home_admin');
    }
    public function printinvois($id)
    {
        $join = \DB::table('transaksi_reselers')
        ->join('penjualan_reselers', 'penjualan_reselers.id_transaksireseler', '=', 'transaksi_reselers.id')
        ->where('id_transaksireseler', '=', $id)
        ->get();
        $data['penjualanrs'] = $join;
        $data['rs'] = TransaksiReseler::find($id);
        return view('reseler.print', $data);
    }
}

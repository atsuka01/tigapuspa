<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apotik;
use App\Kantor;
use App\StokApotik;
use App\TampungStokAp;
use App\InvoisApotik;
use App\InvoisProdukAp;
use PDF;
class ApotikController extends Controller
{
    public function index()
    {
        $data['apotik'] = Apotik::all();
        
        return view('apotik.index', $data, ['apotik'=>\App\Apotik::paginate(10)]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Apotik::create($data);
        return back();
    }
    public function hapus($id)
    {
        $data = Apotik::find($id);
        $data->delete();
        return redirect()->back()->with(["masg", "shdfsjkfhjsdfh"]);
    }
    public function stok($id)
    {
        $data['tampungstok'] = TampungStokAp::where('idap', '=', $id)->get();
        $data['invois_ap']  = InvoisApotik::find($id);
        $data['kantor'] = Kantor::get();
        $data['apotik'] = Apotik::find($id);
        $stokapotik = StokApotik::all()->sortByDesc($id);
        $invoisapotik = InvoisApotik::all()->sortByDesc($id);
        return view('apotik.stok', $data, [
            'stokapotik'=>$stokapotik,
            'stokapotik'=> \App\StokApotik::where('idap', '=', $id)->simplePaginate(3),
            'invoisapotik'=>$invoisapotik,
            'invoisapotik'=> \App\InvoisApotik::where('idap', '=', $id)->orderBy('id', 'desc')->simplePaginate(3),
        ]);
    }
    public function tambahstok(Request $req)
    {
     $id = StokApotik::getid();
     
      if ($id < 1) {
          $data = new StokApotik;
          $data->no = 1;
          $data->nama_ap = $req->nama_ap;
          $data->idap = $req->idap;
          $data->tlp_ap = $req->tlp_ap;
          $data->alamat_ap = $req->alamat_ap;
          $data->kode_ap  =$req->kode_ap;
          $data->ed = $req->ed;
          $data->qty = $req->qty;
          $data->nomor_suratjalan = 'TP.MD.ALL'.'/'.date('my').'/'.$data->no;
          $data->product_name = $req->product_name;
          $data->kode_produk = $req->kode_produk;
          $data->jenis_produk =$req->jenis_produk;
          $data->save();
          $tampungap = TampungStokAp::where('idap', $req->idap)->where('kodeproduk', $req->kode_produk)->first();
         
          if ($tampungap) {
              $data = TampungStokAp::find($tampungap->id);
              $data->jumlah_stok = $tampungap->jumlah_stok + $req->qty;
              $data->save();
          }else{
             $data = new TampungStokAp;
             $data->idap = $req->idap;
             $data->kodeproduk = $req->kode_produk;
             $data->product_name = $req->product_name;
             $data->jenis_produk = $req->jenis_produk;
             $data->jumlah_stok = $req->qty;
             $data->harga = $req->harga;
             $data->save();
          }

      }else{
         $data = new StokApotik;
          $data->no = StokApotik::getno() + 1;
          $data->nama_ap = $req->nama_ap;
          $data->idap = $req->idap;
          $data->tlp_ap = $req->tlp_ap;
          $data->alamat_ap = $req->alamat_ap;
          $data->kode_ap  =$req->kode_ap;
          $data->ed = $req->ed;
          $data->qty = $req->qty;
          $data->nomor_suratjalan = 'TP.MD.ALL'.'/'.date('my').'/'.$data->no;
          $data->product_name = $req->product_name;
          $data->kode_produk = $req->kode_produk;
          $data->jenis_produk =$req->jenis_produk;
          $data->save();
          $tampungap = TampungStokAp::where('idap', $req->idap)->where('kodeproduk', $req->kode_produk)->first();
         
          if ($tampungap) {
              $data = TampungStokAp::find($tampungap->id);
              $data->jumlah_stok = $tampungap->jumlah_stok + $req->qty;
              $data->save();
          }else{
             $data = new TampungStokAp;
             $data->idap = $req->idap;
             $data->kodeproduk = $req->kode_produk;
             $data->product_name = $req->product_name;
             $data->jenis_produk = $req->jenis_produk;
             $data->jumlah_stok = $req->qty;
             $data->harga = $req->harga;
             $data->save();
          }
          
      }
      return back();
    }
    public function apotikinvois(Request $req)
    {
       $no = InvoisApotik::getno();
       if ($no < 1) {
           
        $data = new InvoisApotik;
        $data->idap = $req->idap;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->kode_ap = $req->kode_ap;
        $data->no = $no + 1;
        $data->total = array_sum($req->harga);
        $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - (array_sum($req->harga)* array_sum($req->qtyin) * array_sum($req->diskon) / 100) ;
        
        $data->diskon = max($req->diskon);
        $data->nomorinvois = 'TP.ALL.AP'.'/'.date('my').'/'.$data->no;
        $data->save();
        foreach ($req->kode_produk as $v => $item) {
            $invoisproduk = array (
                   'id_invoisap'=>InvoisApotik::getid(),
                   'kode_produk'=>$req->kode_produk[$v],
                    'produk'=>$req->produk[$v],
                    'harga'=>$req->harga[$v],
                    'diskon'=>$req->diskon[$v],
                    'qtyin'=>$req->qtyin[$v],
                    'jumlah'=>$req->jumlah[$v],
                    
            );
            
            InvoisProdukAp::insert($invoisproduk);
            
        }
        foreach ($req->kode_produk as $item => $req->kode_produk) {
            $stok = array(
                'jumlah_stok'=>$req->stok[$item] - $req->qtyin[$item],
            );

            
        }
            
       }else{
        $data = new InvoisApotik;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->idap = $req->idap;
        $data->kode_ap = $req->kode_ap;
        $data->no = $no + 1;
        $data->total = array_sum($req->harga);
        $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - (array_sum($req->harga)* array_sum($req->qtyin) * array_sum($req->diskon) / 100) ;
        
        $data->diskon = max($req->diskon);
        $data->nomorinvois = 'TP.ALL.AP'.'/'.date('my').'/'.$data->no;
        $data->save();
        foreach ($req->kode_produk as $v => $item) {
            $invoisproduk = array (
                   'id_invoisap'=>InvoisApotik::getid(),
                   'kode_produk'=>$req->kode_produk[$v],
                    'produk'=>$req->produk[$v],
                    'harga'=>$req->harga[$v],
                    'diskon'=>$req->diskon[$v],
                    'qtyin'=>$req->qtyin[$v],
                    'jumlah'=>$req->jumlah[$v],
                    
            );
            
            InvoisProdukAp::insert($invoisproduk);
            
        }
        foreach ($req->kode_produk as $item => $req->kode_produk) {
            $stok = array(
                'jumlah_stok'=>$req->stok[$item] - $req->qtyin[$item],
            );

            
        }
       }
       
       \DB::table('tampung_stok_aps')->where('id', $req->idp)->where('kodeproduk', $req->kode_produk)->update($stok);
       return back();

    }
    public function surajalan($id)
    {
        $data['stokap'] = \DB::table('stok_apotiks')->find($id);
        $pdf = PDF::loadview('apotik.suratjalan', $data);
                    $custome = array(0,0, 648, 396);
                    $pdf->setPaper($custome);
                    return $pdf->stream();
        
    }
    public function apinvois($id)
    {
        $a = \DB::table('invois_apotiks')
                ->join('invois_produk_ap', 'invois_produk_ap.id_invoisap', '=', 'invois_apotiks.id')
                ->where('id_invoisap', $id)
                ->get();
        $data['invoisap'] = $a;
        $data['apotik']  = InvoisApotik::find($id);
       
        
        $pdf = PDF::loadview('apotik.invoisap', $data);
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
    }
    public function jualputus(Request $req)
    {
        $no = InvoisApotik::getno();
        if ($no < 1) {
            
         $data = new InvoisApotik;
         $data->idap = $req->idap;
         $data->nama = $req->nama;
         $data->alamat = $req->alamat;
         $data->kode_ap = $req->kode_ap;
         $data->no = $no + 1;
         $data->total = array_sum($req->harga);
         $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - (array_sum($req->harga)* array_sum($req->qtyin) * array_sum($req->diskon) / 100) ;
         
         $data->diskon = max($req->diskon);
         $data->nomorinvois = 'TP.ALL.AP'.'/'.date('my').'/'.$data->no;
         $data->save();
         foreach ($req->kode_produk as $v => $item) {
             $invoisproduk = array (
                    'id_invoisap'=>InvoisApotik::getid(),
                    'kode_produk'=>$req->kode_produk[$v],
                     'produk'=>$req->produk[$v],
                     'harga'=>$req->harga[$v],
                     'diskon'=>$req->diskon[$v],
                     'qtyin'=>$req->qtyin[$v],
                     'jumlah'=>$req->jumlah[$v],
                     
             );
             
             InvoisProdukAp::insert($invoisproduk);
             
         }
         foreach ($req->kode_produk as $item => $req->kode_produk) {
             $stok = array(
                 'jumlah_stok'=>$req->stok[$item] - $req->qtyin[$item],
             );
 
             
         }
             
        }else{
         $data = new InvoisApotik;
         $data->nama = $req->nama;
         $data->alamat = $req->alamat;
         $data->idap = $req->idap;
         $data->kode_ap = $req->kode_ap;
         $data->no = $no + 1;
         $data->total = array_sum($req->harga);
         $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - (array_sum($req->harga)* array_sum($req->qtyin) * array_sum($req->diskon) / 100) ;
         
         $data->diskon = max($req->diskon);
         $data->nomorinvois = 'TP.ALL.AP'.'/'.date('my').'/'.$data->no;
         $data->save();
         foreach ($req->kode_produk as $v => $item) {
             $invoisproduk = array (
                    'id_invoisap'=>InvoisApotik::getid(),
                    'kode_produk'=>$req->kode_produk[$v],
                     'produk'=>$req->produk[$v],
                     'harga'=>$req->harga[$v],
                     'diskon'=>$req->diskon[$v],
                     'qtyin'=>$req->qtyin[$v],
                     'jumlah'=>$req->jumlah[$v],
                     
             );
             
             InvoisProdukAp::insert($invoisproduk);
             
         }
         foreach ($req->kode_produk as $item => $req->kode_produk) {
             $stok = array(
                 'jumlah_stok'=>$req->stok[$item] - $req->qtyin[$item],
             );
 
             
         }
        }
        
        \DB::table('kantors')->where('id', $req->idp)->update($stok);
        return back();
    }
}

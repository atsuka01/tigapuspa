<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agen;
use App\Kantor;
use App\StokAgen;
use App\TampungStokAgen;
use App\InvoisAgen;
use PDF;
class AgenController extends Controller
{
    public function index()
    {
        $agen = Agen::all();
  
        return view('agen.index', [
            'agen'=>$agen,
            
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Agen::create($data);
        return back();
    }
    public function stok($id)
    {
        $invoisagen  = InvoisAgen::all();
        $StokAgen    = StokAgen::all(); 
        $tampungstok = TampungStokAgen::all();
        $data['kantor'] = Kantor::get();
        $data['agen'] = Agen::find($id);
        return view('agen.stok', $data,[
            'tampungstok'=>$tampungstok,
            'tampungstok'=>\App\TampungStokAgen::where('idag', '=', $id)->simplePaginate(5),
            'stokagen'=>$StokAgen,
            'stokagen'=>\App\StokAgen::where('idag', '=', $id)->simplePaginate(3),
            'invoisagen'=>$invoisagen,
            'invoisagen'=>\App\InvoisAgen::where('idag', '=', $id)->simplePaginate(3)
        ]);
    }
    public function tambahstok(Request $req)
    {
        
        $no = StokAgen::getno();
        
        
        if ($no < 1) {
            $data = new StokAgen;
            $data->no = 1;
            $data->idag = $req->idag;
            $data->harga = $req->harga;
            $data->kode_ag = $req->kode_ag;
            $data->nama_ag = $req->nama_ag;
            $data->tlp_ag = $req->tlp_ag;
            $data->alamat_ag = $req->alamat_ag;
            $data->nomor_suratjalan = 'LSY.SJ.AG'.'/'.date('dy').'/'.$data->no;
            $data->qty = $req->qty;
            $data->total = $req->harga * $req->qty;
            $data->grandtotal = $data->total;
            $data->ed  = $req->ed;
            $data->product_name = $req->product_name;
            $data->jenis_produk = $req->jenis_produk;
            $data->kode_produk = $req->kode_produk;
           $data->save();
           $kantor = Kantor::where('id', $req->idp)->update([
            'jumlah_stok'=>$req->stok - $req->qty
        ]);
        return back();
        }else{
            $data = new StokAgen;
            $data->no = $no+1;
            $data->idag = $req->idag;
            $data->harga = $req->harga;
            $data->kode_ag = $req->kode_ag;
            $data->nama_ag = $req->nama_ag;
            $data->tlp_ag = $req->tlp_ag;
            $data->alamat_ag = $req->alamat_ag;
            $data->nomor_suratjalan = 'LSY.SJ.AG'.'/'.date('dy').'/'.$data->no;
            $data->qty = $req->qty;
            $data->ed  = $req->ed;
            $data->total = $req->harga * $req->qty;
            $data->grandtotal = $data->total;
            $data->product_name = $req->product_name;
            $data->jenis_produk = $req->jenis_produk;
            $data->kode_produk = $req->kode_produk;
            
           $data->save();
            $kantor = Kantor::where('id', $req->idp)->update([
                'jumlah_stok'=>$req->stok - $req->qty
            ]);
           
            
        }
        $tampungag = TampungStokAgen::where('idag', $req->idag)->where('kodeproduk', $req->kode_produk)->first();
        if ($tampungag) {
            $data = TampungStokAgen::find($tampungag->id);
            $data->jumlah_stok = $tampungag->jumlah_stok + $req->qty;
            $data->save();
        }else{
            $data = new TampungStokAgen;
            $data->idag = $req->idag;
            $data->kodeproduk = $req->kode_produk;
            $data->product_name = $req->product_name;
            $data->jenis_produk = $req->jenis_produk;
            $data->jumlah_stok = $req->qty;
            $data->save();
        }
        return back();
        
    }
    public function tambahinvois(Request $request)
    {
        $kode = $request->get('kode_produk');
        $id = InvoisAgen::getid();
        $b = date('d');
        $blt = date('my');
        $x = InvoisAgen::get('no')->sum(1);
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
        $no    = 'TP.AG.'.$kode.'/'.$blt.'/'.$x;
        $data = new InvoisAgen($request->all());
        $data->nomorinvois = $no;
        $data->no = $x;
        $data->kode_ag;
        $data->product_name;
        $data->diskon;
        $data->harga = $request->harga;
        $jumlah = $data->harga * $data->qtyin;
        $total = $jumlah * $data->diskon / 100;
        $grandtotal = $jumlah - $total;
        $data->grandtotal = $grandtotal;
        $data->total = $total;
        $data->jumlah = $jumlah;
        $data->jenis_produk;
        $data->qtyin;
    
        $data->save();

        $tampungStokAg  = TampungStokAgen::where('idag', '=', $request->idag)->where('kodeproduk', '=', $request->kode_produk)->first();
          if ($tampungStokAg) {
              if ($tampungStokAg->jumlah_stok > 0 ) {
                $stokap = TampungStokAgen::where('idag', '=', $request->idag)->where('kodeproduk', '=', $request->kode_produk)->get();
              $x = $stokap->sum('jumlah_stok') - $request->qtyin;
              $data['nama_ag'] = $request->nama_ag;
              $data['alamat_ag'] = $request->alamat_ag;
              $data['notlp_ag'] = $request->notlp_ag;
              $tampungStokAg = TampungStokAgen::where('kodeproduk', '=', $request->kode_produk)->update([
                            'jumlah_stok'=>$x
                    ]);
                    $pdf = PDF::loadview('agen.invoisagen', $data);
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
    public function suratjalan($id)
    {
        $data['agen'] = StokAgen::find($id);
        
        $pdf = PDF::loadview('agen.suratjalan', $data);
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
    }
    
}

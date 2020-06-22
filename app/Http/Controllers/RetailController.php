<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantor;
use App\DataRetail;
use App\TransaksiRetail;
use PDF;

class RetailController extends Controller
{
    public function index()
    {

         $retail = DataRetail::all(); 
         $data['kantor'] = Kantor::get();
         return view('retail.index', $data,[
             'retail'=>$retail,
             'retail'=>\APP\DataRetail::paginate(5)->sortByDesc('id')
             
         ]);
    }
    public function store(Request $req)
    {
        $rules = [
            
            'nama_retail'         =>'required',
            'notlp'     =>'required',
            'alamat'       =>'required',

    ];
    $messages = [
        'nama_retail.required'            =>'Nama Masih Kosong',
        'notlp.required'       =>'No Handpone Masih Kosong',
        'alamat.required'     =>'Alamat Masih Kosong',
        

    ];
        $this->validate($req, $rules, $messages);
       $no = DataRetail::getno();
     
       if ($no < 1) {
        $data = new DataRetail;
        $data->nama_retail  = $req->nama_retail;
        $data->notlp        = $req->notlp;
        $data->alamat       = $req->alamat;
        $data->no           = 1;
        $data->subtotal     = array_sum($req->price) * array_sum($req->qty) - array_sum($req->price) * array_sum($req->qty) * array_sum($req->dis) / 100 ;
        $data->kode_produk  = $req->kode_produk;
        $data->nomor_invoice = 'TP.ALL'.'/'.date('my').'/'.$data->no;
        $data->save();
        foreach ($req->product_name as $v => $value) {
            $array = array(
                'id_retail'=>DataRetail::getid(),
                'produk'=>$req->product_name[$v],
                'jenis_produk'=>$req->jenis_produk[$v],
                'qty'=>$req->qty[$v],
                'price'=>$req->price[$v],
                'dis'=>$req->dis[$v],
                'amount'=>$req->amount[$v],
                'batch'=>$req->batch[$v],
            );
            \DB::table('transaksi_retails')->insert($array);
            
        }
        

       }else{
        $data = new DataRetail;
        $data->nama_retail  = $req->nama_retail;
        $data->notlp        = $req->notlp;
        $data->alamat       = $req->alamat;
        $data->no           = $no + 1;
        $data->subtotal     = array_sum($req->price) * array_sum($req->qty) - array_sum($req->price) * array_sum($req->qty) * array_sum($req->dis) / 100 ;
        $data->kode_produk  = $req->kode_produk;
        $data->nomor_invoice = 'TP.ALL'.'/'.date('my').'/'.$data->no;
        $data->save();
        foreach ($req->product_name as $v => $value) {
            $array = array(
                'id_retail'=>DataRetail::getid(),
                'produk'=>$req->product_name[$v],
                'jenis_produk'=>$req->jenis_produk[$v],
                'qty'=>$req->qty[$v],
                'price'=>$req->price[$v],
                'dis'=>$req->dis[$v],
                'amount'=>$req->amount[$v],
                'batch'=>$req->batch[$v],
            );
            \DB::table('transaksi_retails')->insert($array);
            
        }
       }
       foreach ($req->product_name as $v => $value) {
           $data = array(
                'jumlah_stok'=>$req->stok[$v] - $req->qty[$v]
           );
           \DB::table('kantors')->where('id', $req->idp[$v])->update($data);
           
       }
       return back();
    }
    public function invois($id)
    {
        
        $transaksi = \DB::table('transaksi_retails')
                ->join('data_retails', 'data_retails.id','=','transaksi_retails.id_retail')
                ->where('id_retail', '=', $id)
                ->get();

        $data['transaksi'] = $transaksi;
        $data['retail'] = DataRetail::find($id);
        
        $pdf = PDF::loadview('retail.invois', $data);
                
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
    }
    public function cari(Request $request)
    {
        $key = $request->get('nama_retail');
        $data['retail'] =  \App\DataRetail::where("nama_retail", '=', $key)->paginate(5);
        $data['kantor'] = Kantor::get();
        return view('retail.index', $data);
    }
}

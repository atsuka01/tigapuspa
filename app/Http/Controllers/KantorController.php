<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantor;
use App\Produksi;
use App\JumlahProduksi;
use App\TransaksiOnline;

class KantorController extends Controller
{
    public function index()
    {
        $kantor = Kantor::all();
        return view('kantor.index', compact('kantor'));
    }
    public function create()
    {
        $data['produksi']      = Produksi::get();
        $data['jumlahproduksi'] = JumlahProduksi::get();
        return view('kantor.create', $data);
    }
    public function store(Request $request)
    {
    $rules = [
            'nama_produk'       =>'required',
            'jenis_produk'      =>'required',
            'harga_produk'      =>'required',
            'kode_produk'       =>'required',
           
    ];
    $messages = [
        'nama_produk.required'      =>'kolom nama Produk  Masih Kosong',
        'harga_produk.required'     =>'kolom harga Produk Masih Kosong',
        'jenis_produk.required'     =>'kolom jenis Produk Masih Kosong',
        'kode_produk.required'      =>'kolom kode Produk Masih Kosong',
      
    ];
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        Kantor::create($data);
        return redirect('kantor')->with('success', 'berhasil di Tambahkan');
    }
    public function edit($id)
    {
        $data['kantor'] = Kantor::find($id);
        return view('kantor.edit', $data); 
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_produk'    =>'required',
            'jenis_produk'   =>'required',
            'harga_produk'   =>'required',
            
            'jumlah_stok'   =>'required',
    ];
    $messages = [
        'nama_produk.required'    =>'kolom nama Produk  Masih Kosong',
        'harga_produk.required'   =>'kolom harga Produk Masih Kosong',
        'jenis_produk.required'   =>'kolom jenis Produk Masih Kosong',
       
        'jumlah_stok.required'    =>'kolom Jumlah Stok Masih Kosong',
    ];
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        $kantor = Kantor::find($id);
        $kantor->update($data);
        return redirect('kantor');

    }
    public function destroy($id)
    {
        $data = Kantor::find($id);
        $data->delete();
        return redirect('kantor');
    }
    public function stok($id)
    {
        $tr   =7;
        $a    = Kantor::where('id', '=', $id)->sum('jumlah_stok');
        
        if ($a <= 0) {
            return "stok sudah kosong Gan";
        }else{
            $i    = $a - $tr;
        }
        $data = Kantor::where('id', '=', $id)->update(
            [
                'jumlah_stok'=>$i
            ]
    );
        
        return $i;
    }
    public function tambahstok(Request $request )
    {
       $kantor = Kantor::where('kode_produk','=', $request->kode_produk)->first();
       $produksi = Produksi::where('kode_produk', $request->kode_produk)->first();
       if ($produksi->jumlah_stok > 0) {
           $kantor = Kantor::find($kantor->id);
           $kantor->kode_produk = $request->kode_produk;
           $kantor->nama_produk = $request->nama_produk;
           $kantor->jenis_produk = $request->jenis_produk;
           $kantor->jumlah_stok  = $kantor->jumlah_stok + $request->jumlah_stok;
           $kantor->save();

           $produksi = Produksi::find($produksi->id);
           $produksi = $produksi->jumlah_stok - $request->jumlah_stok;
           $produksi = Produksi::where('kode_produk', '=', $request->kode_produk)->update([
               'jumlah_stok'=>$produksi
           ]);
           
       } else {
           return "Stok Pabrik Habis";
       }
       
 
    }
}

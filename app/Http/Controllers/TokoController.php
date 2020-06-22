<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantor;
use App\User;
use App\CostumerService;
use App\Toko;
use App\LaporanLSY;
use App\Order;

class TokoController extends Controller
{
    public function index()
    {
       
        $toko = Toko::all();
        $repeat = Order::all();
        return view('toko.index', compact('toko','repeat'));
    }
    public function create()
    {
        $data['cs'] = CostumerService::get();
        
        return view('toko.create', $data);
    }
    public function store(Request $request)
    {
        $rules = [
            'kode_cs'   =>'required',
            'nama_toko'   =>'required',
            'jenis_toko'   =>'required',
    ];
    $messages = [
        'kode_cs.required'     =>'kolom kode cs Produk  Masih Kosong',
        'nama_toko.required'   =>'kolom nama toko Masih Kosong',
        'jenis_toko.required'   =>'kolom jenis toko Masih Kosong',
    ];
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        Toko::create($data);
        return redirect('toko');
    }
    public function edit($id)
    {
        $toko['toko'] = Toko::find($id);
        return view('toko.edit', $toko);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $toko = Toko::find($id);
        $toko->update($data);
        return redirect('toko');
    }
    public function show($id)
    {
        
        $data['kantor'] = Kantor::get();
        $data['toko'] = Toko::find($id);
        return view('toko.show',  $data);
    }
    public function destroy($id)
    {
        $data = Toko::find($id);
        $data->delete();
        return redirect('toko');
    }
    public function transaksi()
    {
        $data['kantor'] =  Kantor::get();
        return view('toko.transaksi',$data);
    }
}

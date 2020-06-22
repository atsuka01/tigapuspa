<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produksi;
use Auth;
use App\JumlahProduksi;
use App\Http\Eroors;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produksi = Produksi::all();
        return view('pabrik.index', compact('produksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pabrik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_produk'   =>'required',
            'jenis_produk'   =>'required',
            'harga_produk'   =>'required',
    ];
    $messages = [
        'nama_produk.required'   =>'kolom nama Produk  Masih Kosong',
        'harga_produk.required'   =>'kolom harga Produk Masih Kosong',
        'jenis_produk.required'   =>'kolom jenis Produk Masih Kosong',
    ];
       $getid = Produksi::getid();
       $id_produk = Produksi::where('id_produk', '>', 0)->first(); 
       if ($id_produk) {
           
        if ($id_produk = $getid) {
            $x = $id_produk;
            $x++;
            $data = new Produksi;
            $data->kode_produk = $request->kode_produk;
            $data->nama_produk = $request->nama_produk;
            $data->id_produk  = $x;
            $data->jenis_produk = $request->jenis_produk;

            $data->save();
            return back();
        }
           
            
           
       }else{
           $x = $id_produk;
           $x++;
           $data = new Produksi;
           $data->kode_produk = $request->kode_produk;
           $data->nama_produk = $request->nama_produk;
           $data->id_produk  = $x;
           $data->jenis_produk = $request->jenis_produk;

           $data->save();
           return back();
       }
      
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $jumlah_produksi = \DB::table('jumlah_produksis')
                        ->join('produksis', 'produksis.id_produk', '=', 'jumlah_produksis.id_produksi')
                        ->where('user_id', '=', $id)
                        ->paginate(10);
       $data['jumlah_produksi'] = $jumlah_produksi;
       $data['produksi'] = Produksi::find($id);
       return view('pabrik.stok', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produksi['produksi'] = Produksi::find($id);
        return view('pabrik.edit', $produksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_produk'   =>'required',
            'jenis_produk'   =>'required',
            'harga_produk'   =>'required',
    ];
    $messages = [
        'nama_produk.required'   =>'kolom nama Produk  Masih Kosong',
        'harga_produk.required'   =>'kolom harga Produk Masih Kosong',
        'jenis_produk.required'   =>'kolom jenis Produk Masih Kosong',
    ];
        $this->validate($request, $rules, $messages);
       $data  = $request->all();
      $produksi = Produksi::find($id);
      $produksi->update($data);
       return redirect('pabrik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $data = Produksi::find($id);
     $data->delete();
     return redirect('pabrik');
    }
    public function jumlahproduksi(Request $request)
    {
     $rules = [
            'kode_nb'   =>'required',
            'kode_ed'   =>'required',
            'jumlah_produksi'   =>'required',
    ];
    $messages = [
        'koden_nb.required'             =>'kolom  kode NB  Masih Kosong',
        'kode_ed.required'              =>'kolom kode MD Masih Kosong',
        'jumlah_produksi.required'      =>'kolom Jumlah Produksi Masih Kosong',
    ];
        $this->validate($request, $rules, $messages);

        // $data = $request->all();
        // JumlahProduksi::create($data);
        $produksi = new JumlahProduksi;
        $produksi->user_id    = $request->user_id;
        $produksi->id_produksi = $request->id_produk;
        $produksi->kode_produk = $request->kode_produk;
        $produksi->kode_nb     = $request->kode_nb;
        $produksi->kode_ed  = $request->kode_ed;
        $produksi->jumlah_produksi = $request->jumlah_produksi;
        $produksi->save();
        
        $produk = Produksi::where('kode_produk', '=', $request->kode_produk)->where('id_produk', '=', $request->id_produk)->first();
        if ($produk  ) {
            $produk = Produksi::find($produk->id);
            $produk->jumlah_stok = $produk->jumlah_stok + $request->jumlah_produksi;
            $produk->save();
            return redirect()->route('pabrik.index')->with('status', 'profile is update');
        } else {
           return "tidak sama";
        }
        
        
    }
     
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterDealer;
use App\Reseler;
use App\Kantor;
use App\StokMasterdealer;
use App\invoismd;
use App\tampungStokMd;
use PDF;
use App\ProdukMd;
use App\InvoisProdukMd;
class MasterDealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $md = MasterDealer::all();
        return view('masterdealer.index', compact('md'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_md'       =>'required',
            'no_md'         =>'required',
            'alamat_md'     =>'required',
            'kode_md'       =>'required',
    ];
    $messages = [
        'nama_md.required'     =>'Nama Masih Kosong',
        'no_md.required'       =>'No Handpone Masih Kosong',
        'kode_md.required'     =>'Kode Md Masih Kosong',
        'alamat_mb.required'     =>'Alamat Masih Kosong',
    ];
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        MasterDealer::create($data);
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reseler = \DB::table('reselers')
                ->join('master_dealers', 'master_dealers.id', 'reselers.id_md')
                ->where('id_md', $id)
                ->get();
        $data['reseler'] = $reseler;
        $data['md'] = MasterDealer::find($id);
        
        return view('masterdealer.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $md['md'] = MasterDealer::find($id);
        return view('masterdealer.edit', $md);
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
            'nama_md'       =>'required',
            'no_md'         =>'required',
            'alamat_md'     =>'required',
            'kode_md'       =>'required',
    ];
    $messages = [
        'nama_md.required'     =>'Nama Masih Kosong',
        'no_md.required'       =>'No Handpone Masih Kosong',
        'kode_md.required'     =>'Kode Md Masih Kosong',
        'alamat_mb.required'     =>'Alamat Masih Kosong',
    ];
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        $md   = MasterDealer::find($id);
        $md->update($data);
        return redirect('md');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MasterDealer::find($id);
        $data->delete();
        return back();

    }
    public function CreateRs(Request $request)
    {
        $rules = [
            'nama_rs'       =>'required',
            'kode_rs'         =>'required',
        
            
            'no_rs'       =>'required',
    ];
    $messages = [
        'nama_rs.required'     =>'Nama Masih Kosong',
        'no_rs.required'       =>'No Handpone Masih Kosong',
        'kode_rs.required'     =>'Kode Rs Masih Kosong',
        
    ];
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        Reseler::create($data);
        return back()->with('success','Item created successfully!');
    }
   public function stok($id)
   {
       
       $stok = \DB::table('tampung_stok_mds')
            ->join('master_dealers', 'master_dealers.id', '=', 'tampung_stok_mds.idmd')
            ->where('idmd', $id)
            ->get();
       $invoismd = \DB::table('invoismds')
                    ->join('invois_produk_md', 'invois_produk_md.idmd', '=', 'invoismds.idmd')
                    ->where('invoismds.idmd', $id)
                    ->get();
       
        
       $data['invoismd'] = invoismd::where('idmd', $id)->orderBy('id', 'desc')->simplePaginate(5);
       $data['stok'] = $stok;
       $data['kantor'] = Kantor::get();
       $data['md'] = MasterDealer::find($id);
       $data['tampung'] = tampungStokMd::get()->where('idmd', '=', $id);
        
       $stokmd = StokMasterdealer::where('idmd', '=', $id)->orderBy('id', 'desc')->get();
       
       return view('masterdealer.stok', $data,[
           'stokmd'=>$stokmd,
           'stokmd'=> \App\StokMasterdealer::where('idmd', $id)->orderBy('id', 'desc')->simplePaginate(5)
       ]);
   }
   public function input(Request $request)
   {
       
        $kode   = $request->get('kategori');
        $id     = StokMasterdealer::getid();
        $b      = date('d');
        $blt    = date('my ');
        if ($b == 01) {
            $x      = StokMasterdealer::where('no', '=', 1)->first();
           
            if ($x->no == 1) {
                $a                  = StokMasterdealer::orderBy('id', 'DESC', 'limit', 1)->first();
               $f                   = $a->no + 1;
              
               $x                   = new StokMasterdealer;
               $x->no                  = 1;
                $x->nama                = $request->nama;
                $x->alamat              = $request->alamat;
                $x->idmd                = $request->idmd;
                $x->qty                 = $request->qty;
                $x->jenis_produk        = $request->product_name;
                $x->nomor_suratjalan    = 'TP.SJ.RS'.'/'.$kode.'/'.$blt.'/'.$x->no;
                $x->kode_md             = $request->kode_md;
                $x->kategori            = $request->kategori;
                $x->ed                  = $request->batch;
                $x->tanggal             = $request->tanggal;
               $x->save();
            } else {
                $x                  = new StokMasterdealer;
              
                $x->no                  = 1;
                
                $x->nama                = $request->nama;
                $x->alamat              = $request->alamat;
                $x->idmd                = $request->idmd;
                $x->kategori            = $request->kategori;
                $x->nomor_suratjalan    = 'TP.SJ.MD'.'/'.$kode.'/'.$blt.'/'.$x->no;
                $x->kode_md             = $request->kode_md;
                $x->jenis_produk        = $request->product_name;
                $x->qty                 = $request->qty;
                $x->ed                  = $request->batch;
                $x->tanggal             = $request->tanggal;
                 // $dis25 = $req->subtotal - ($req->price1 * $req->disrs / 100);
                // $dis15 = $req->subtotal * 15 / 100;
                // $data->dis25 = $dis25; 
                // $data->dis15 = $dis15;
                $x->save();
            }
            
        } else {
            $x      = StokMasterdealer::where('no', '=', 1)->first();
            if ($x) {
               $a = StokMasterdealer::orderBy('id', 'DESC', 'limit', 1)->first();
               $f = $a->no + 1;
              
               $x = new StokMasterdealer;
               $x->no               = $f;
               $x->nama                = $request->nama;
                $x->alamat              = $request->alamat;
                $x->idmd                = $request->idmd;
                $x->jenis_produk        = $request->product_name;
                $x->nomor_suratjalan    = 'TP.SJ.MD'.'/'.$kode.'/'.$blt.'/'.$x->no;
                $x->kode_md             = $request->kode_md;
                $x->kategori            = $request->kategori;
                $x->ed                  = $request->batch;
                $x->tanggal             = $request->tanggal;
                $x->qty                 = $request->qty;
               $x->save();
            } else {
                $x = new StokMasterdealer;
                $x->no                  = 1;
                $x->nama                = $request->nama;
                $x->alamat              = $request->alamat;
                $x->idmd                = $request->idmd;
                $x->kategori            = $request->kategori;
                $x->jenis_produk        = $request->product_name;
                $x->nomor_suratjalan    = 'TP.SJ.MD'.'/'.$kode.'/'.$blt.'/'.$x->no;
                $x->kode_md             = $request->kode_md;
                $x->qty                 = $request->qty;
                $x->ed                  = $request->batch;
                $x->tanggal             = $request->tanggal;
               
                 // $dis25 = $req->subtotal - ($req->price1 * $req->disrs / 100);
                // $dis15 = $req->subtotal * 15 / 100;
                // $data->dis25 = $dis25; 
                // $data->dis15 = $dis15;
                $x->save();
            
            }
           
            

        }
        
    
            $tampungStokMd  = tampungStokMd::where('idmd', '=', $request->idmd)->where('kodeproduk', '=', $request->kode_produk)->first();
            if ($tampungStokMd) {
                $tampungStokMd = tampungStokMd::find($tampungStokMd->id);
                $tampungStokMd->kodeproduk = $request->kode_produk;
                $tampungStokMd->product_name = $request->product_name;
                $tampungStokMd->price = $request->price;
                $tampungStokMd->jumlah_stok = $tampungStokMd->jumlah_stok + $request->qty;
                $tampungStokMd->save();
         
                $kantor = Kantor::where('kode_produk', '=', $request->kode_produk)->update([
                    'jumlah_stok'=>$request->stok - $request->qty
                ]);
                
            }else{
                
                
                $tampungStokMd = new tampungStokMd;
                $tampungStokMd->idmd = $request->idmd;
                $tampungStokMd->kodeproduk = $request->kode_produk;
                $tampungStokMd->product_name = $request->product_name;
                $tampungStokMd->price = $request->price;
                $tampungStokMd->id_produk = $id;
                $tampungStokMd->jumlah_stok = $request->qty;
                $tampungStokMd->save();
                
                $kantor = Kantor::where('kode_produk', '=', $request->kode_produk)->update([
                    'jumlah_stok'=>$request->stok - $request->qty
                ]);
            }
           
            $xc['nama'] = $request->nama;
            $x['x'] = $request->x;
            $x['produk'] = $request->product_name;
            $x['qty'] = $request->qty;
            $x['batch'] = $request->batch;
            $x['kategori'] = $request->kategori;
         
            

                  
               
        
        
        // $tampungStokMd = tampungStokMd::where('kodeproduk', $request->kode_produk)->first();
        // $test = $request->get('idmd');
        // if ($tampungStokMd ) {
        //     $tampungStokMd = tampungStokMd::find($tampungStokMd->id);
        //     $tampungStokMd->kodeproduk = $request->kode_produk;
        //     $tampungStokMd->product_name = $request->product_name;
        //     $tampungStokMd->jenis_produk = $request->jenis_produk;
        //     $tampungStokMd->jumlah_stok = $tampungStokMd->jumlah_stok + $request->qty;
        //     $tampungStokMd->save();
         
       
        
        // } else {            
        //     $tampungStokMd = new tampungStokMd;
        //     $tampungStokMd->idmd = $request->idmd;
        //     $tampungStokMd->kodeproduk = $request->kode_produk;
        //     $tampungStokMd->product_name = $request->product_name;
        //     $tampungStokMd->jenis_produk = $request->jenis_produk;
        //     $tampungStokMd->jumlah_stok = $request->qty;
        //     $tampungStokMd->save();
        // }
        // $cekmd = tampungStokMd::where('idmd', $request->idmd)->first();
        // if ($cekmd) {
        //     return "ok";
        // }
        // return view('masterdealer.suratjalan', $data);
        //end asep
      
       
        return back();
       
   
   }
   public function suratjalan($id, Request $req)
   {
       $data['data'] = StokMasterdealer::find($id);
       $pdf = PDF::loadview('masterdealer.suratjalan', $data);
                
       $custome = array(0,0, 648, 396);
       $pdf->setPaper($custome);
       return $pdf->stream();
   }
   public function print(Request $request)
   {
       $data['print'] = $request->all();
       return view('masterdealer.print', $data);
   }
   

   public function mdinvois(Request $req )
   {
        
    $a = array_sum($req->jumlah);
       $no = invoismd::getid();
       $tanggal = date('my');
   
       if (count($no) < 1 ) {
           $data = new invoismd;
           $data->idmd = $req->idmd;
           $data->kode_md = $req->kode_md;
           $data->no = 1;
           $data->nama = $req->nama;
           $data->diskon = array_sum($req->diskon);
           $data->total = $a;
           $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - array_sum($req->jumlah) ;
           $data->nomorinvois = 'TP.ALL.MD'.'/'.$tanggal.'/'.$data->no;
           
           $data->save();
        $dataSet = [];
        foreach ($req->kode_produk as $item => $value) {
            $dataSet[] = [
                    'idmd'=>$req->idmd,
                    'kode_produk'=>$req->kode_produk[$item],
                    'produk'=>$req->produk[$item],
                    'harga'=>$req->harga[$item],
                    'diskon'=>$req->diskon[$item],
                    'qtyin'=>$req->qtyin[$item],
                    'jumlah'=>$req->jumlah[$item],
                    'id_invoismds'=>invoismd::ambilid()

                    
            ];
            
        }
        \DB::table('invois_produk_md')->insert($dataSet);
           
           $idp = $req->input('idp');
         
           $qtyin = $req->input('qtyin');
           $stok  = $req->input('stok');
           
           foreach ($req->idp as $v => $req->idp) {
               $values = array(
                  'jumlah_stok'=>$stok[$v] - $qtyin[$v]
               );
               \DB::table('tampung_stok_mds')->where('id_produk', $req->idp)->update($values);
               
           }
           return  back();
             

       }else{
          
        $data = new invoismd;
        $data->idmd = $req->idmd;
        $data->kode_md = $req->kode_md;
        $data->nama = $req->nama;
        $nomor = invoismd::getid();
        $data->no = count($nomor) + 1;
        $data->total = $a;
        $data->diskon = array_sum($req->diskon);
        $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - array_sum($req->jumlah) ;
        $data->nomorinvois = 'TP.ALL.MD'.'/'.$tanggal.'/'.$data->no;
      
        $data->nomorinvois = 'TP.ALL.MD'.'/'.$tanggal.'/'.$data->no;
       
        $data->save();
       
        foreach ($req->produk as $item => $v) {
             
            
             
            $dataSet = [];
            foreach ($req->kode_produk as $item => $value) {
                $dataSet[] = [
                        'idmd'=>$req->idmd,
                        'kode_produk'=>$req->kode_produk[$item],
                        'produk'=>$req->produk[$item],
                        'harga'=>$req->harga[$item],
                        'diskon'=>$req->diskon[$item],
                        'qtyin'=>$req->qtyin[$item],
                        'jumlah'=>$req->jumlah[$item],
                        'id_invoismds'=> invoismd::ambilid()

    
                        
                ];
                
            }
            \DB::table('invois_produk_md')->insert($dataSet);
             

             $idp = $req->input('idp');
         
             $qtyin = $req->input('qtyin');
             $stok  = $req->input('stok');
             
             foreach ($req->idp as $v => $req->idp) {
                 $values = array(
                    'jumlah_stok'=>$stok[$v] - $qtyin[$v]
                 );
                 \DB::table('tampung_stok_mds')->where('id', $req->idp)->wherein('kodeproduk', $req->kode_produk)->update($values);
                 
             }
             
             foreach ($req->kode_produk as $item => $value) {
                 $coba[] = [
                    'qtyin'=>$req->qtyin[$item],
                    'kode_produk'=>$req->kode_produk[$item],
                    'harga'=>$req->harga[$item],
                    'diskon'=>$req->diskon[$item],
                    'jumlah'=>$req->jumlah[$item],
                    'id_invoismds'=>$data->no
                  
                 ];
                
             }
            
       
             return  back();
        }
       }
    
    return $no;
       
               
   }
  
   public function tampung(Request $request)
   {
      $tampung = tampungStokMd::distinct()->select('kodeproduk')->where('kodeproduk', '=', 'kodeproduk')->groupBy('kodeproduk')->get();
      if ($tampung == "MET") {
          return $tampung;
      }else{
          $data = $request->all();
          tampungStokMd::create($data);
          return back();
      }     
       
   }
   public function printinvois($id)
   {
     $invoismd= \DB::table('invoismds')
                ->join('invois_produk_md', 'invois_produk_md.id_invoismds', 'invoismds.id')
                ->where('invoismds.id', $id)
                ->get();
    $data['invois'] = $invoismd;
    
    $pdf = PDF::loadview('masterdealer.invoismd', $data,[
        'a'=>invoismd::where('id', $id)->sum('total')
    ]);
                
    $custome = array(0,0, 648, 396);
    $pdf->setPaper($custome);
    return $pdf->stream();
   
   
   
   }
   public function deleteproduk($id)
   {
    $data = tampungStokMd::find($id);
    $data->delete();
    return back();
   }
   public function jualputus(Request $req)
   {
    $no = invoismd::getno();
   
    if (empty($no)) {
        $a = array_sum($req->jumlah);
        $no = invoismd::getid('id');
       
        $tanggal = date('my');
        $data = new invoismd;
        $data->idmd = $req->idmd;
        $data->kode_md = $req->kode_md;
        $data->no = 1;
        $data->nama = $req->nama;
        $data->total = $a;
        $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - array_sum($req->jumlah) ;
        $data->nomorinvois = 'TP.ALL.MD'.'/'.$tanggal.'/'.$data->no;
        
        $data->save();
        foreach ($req->produk as $item => $v) {
             
            
             
            $dataSet = [];
            foreach ($req->kode_produk as $item => $value) {
                $dataSet[] = [
                        'idmd'=>$req->idmd,
                        'kode_produk'=>$req->kode_produk[$item],
                        'produk'=>$req->produk[$item],
                        'harga'=>$req->harga[$item],
                        'diskon'=>$req->diskon[$item],
                        'qtyin'=>$req->qtyin[$item],
                        'jumlah'=>$req->jumlah[$item],
                        'id_invoismds'=> invoismd::ambilid()

    
                        
                ];
                
            }
            \DB::table('invois_produk_md')->insert($dataSet);
             

             $idp = $req->input('idp');
         
             $qtyin = $req->input('qtyin');
             $stok  = $req->input('stok');
             
             foreach ($req->idp as $v => $req->idp) {
                 $values = array(
                    'jumlah_stok'=>$stok[$v] - $qtyin[$v]
                 );
                 \DB::table('kantors')->where('id', $req->idp)->update($values);
                 
             }
             
            
            
       
             return  back();
        }
    } else {
        $a = array_sum($req->jumlah);
        $no = invoismd::getno();
        
        $tanggal = date('my');
        $data = new invoismd;
        $data->idmd = $req->idmd;
        $data->kode_md = $req->kode_md;
        $data->no = $no +1;
        $data->nama = $req->nama;
        $data->total = $a;
        $data->grandtotal = array_sum($req->harga) * array_sum($req->qtyin) - array_sum($req->jumlah) ;
        $data->nomorinvois = 'TP.ALL.MD'.'/'.$tanggal.'/'.$data->no;
        
        $data->save();
        foreach ($req->produk as $item => $v) {
             
            
             
            $dataSet = [];
            foreach ($req->kode_produk as $item => $value) {
                $dataSet[] = [
                        'idmd'=>$req->idmd,
                        'kode_produk'=>$req->kode_produk[$item],
                        'produk'=>$req->produk[$item],
                        'harga'=>$req->harga[$item],
                        'diskon'=>$req->diskon[$item],
                        'qtyin'=>$req->qtyin[$item],
                        'jumlah'=>$req->jumlah[$item],
                        'id_invoismds'=> invoismd::ambilid()

    
                        
                ];
                
            }
            \DB::table('invois_produk_md')->insert($dataSet);
             

             $idp = $req->input('idp');
         
             $qtyin = $req->input('qtyin');
             $stok  = $req->input('stok');
             
             foreach ($req->idp as $v => $req->idp) {
                 $values = array(
                    'jumlah_stok'=>$stok[$v] - $qtyin[$v]
                 );
                 \DB::table('kantors')->where('id', $req->idp)->update($values);
                 
             }
             
            
            
       
             return  back();
        }
    }
    
    return $no;

  
   }
}

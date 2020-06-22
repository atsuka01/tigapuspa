<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Response;
class EdController extends Controller
{
    public function index()
    {

        
        $pdf = PDF::loadview('ed.index');
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
        
    }
    public function cari()
    {
        $data = \DB::table('stok_agens')
                ->join('stok_apotiks', 'stok_apotiks.kode_produk', 'stok_agens.kode_produk')
          
                ->get();
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\TransaksiOnline;
use App\Kantor;
use App\Produk;
use App\Toko;
use App\Produksi;
use PDF;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\PenjualanMasterDealer;
use App\TransaksiMasterDealer;
use App\PenjualanReseler;
use App\TransaksiReseler;
use App\InvoisApotik;
use App\DataRetail;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home_admin');
    }
    public function admin(Request $req)
    {
        $transaksi = \DB::table('transaksi_onlines')
            ->join('users', 'users.id', '=', 'transaksi_onlines.orders_id')
            ->where('orders_id', '=', 'user_id')
            ->select('qty')
            ->get();
        
        $total = Order::where('subtotal', '>', 1)->sum('subtotal');
        $totalrs = TransaksiReseler::where('subtotal', '>', 1)->sum('subtotal');
        $totalmd = TransaksiMasterDealer::where('subtotal', '>', 1)->sum('subtotal');
       $pabrik = \DB::table('jumlah_produksis')
                    ->join('produksis', 'produksis.id', '=', 'jumlah_produksis.id_produksi')
                   ->where('id_produksi', '=', 'id')
                    ->get();
        $kantor = Kantor::get();
        $penjualan = \DB::table('penjualan_master_dealers')
                    ->join('transaksi_master_dealers', 'transaksi_master_dealers.id', '=', 'penjualan_master_dealers.id_transaksimd')
                    ->where('id_transaksimd', 'id')
                    ->get();
        $data['penjualanmd'] = $penjualan;
        $data['transaksimd'] = TransaksiMasterDealer::get()->sortByDesc('id');
        $data['user'] = User::get();
        $data['order']  = Order::get()->sortByDesc('id');
        
        $penjualanreseler = \DB::table('penjualan_reselers')
                        ->join('transaksi_reselers', 'transaksi_reselers.id', '=', 'penjualan_reselers.id_transaksireseler')
                        ->where('id_transaksireseler', 'id')
                        ->get();
        $data['penjualanrs'] = $penjualanreseler;
        $data['transaksirs'] = TransaksiReseler::get()->sortByDesc('id');
        $data['invoisapotik'] = InvoisApotik::sum('grandtotal');
        $data['dataretail'] = DataRetail::sum('subtotal');
        $order = TransaksiOnline::sum('amount');
        $rs    = PenjualanReseler::sum('amount');
        $md    = PenjualanMasterDealer::sum('amount');
        $mdi   = \db::table('invoismds')->sum('grandtotal');
        $apotik = \db::table('invois_apotiks')->sum('grandtotal');
        $retail = \db::table('data_retails')->sum('subtotal');
        $total = $order + $rs + $md + $mdi + $apotik + $retail;
        $data['total'] = $total;
        return view('home_admin', $data, [
           
            'total'=> $total,
            'kantor'=>$kantor,
            'pabrik'=>$pabrik,
            'totalrs'=>$totalrs,
            'totalmd'=>$totalmd
            
        ]);
                    
    }
    
    public function revmd($id)
    {
       
    }
    public function review($id)
    {
        $transaksi = \DB::table('transaksi_onlines')
            ->join('orders', 'orders.id', '=', 'transaksi_onlines.orders_id')
            ->where('orders_id', $id, 'user')
            
            ->get();
        $data['transaksi'] = $transaksi;
        $data['order']  = Order::find($id);
        return view('toko.review', $data, ['transaksi'=> $transaksi]);
    }
    public function print($id)
    {
        $transaksi = \DB::table('transaksi_onlines')
            ->join('orders', 'orders.id', '=', 'transaksi_onlines.orders_id')
            
            ->where('orders_id', $id)
            ->get();
        $data['toko']      = Toko::first();
        $data['transaksi'] = $transaksi;
        $data['order']  = Order::find($id);
        
        $pdf = PDF::loadview('toko.print', $data);
        $custome = array(0,0, 648, 396);
        $pdf->setPaper($custome);
        return $pdf->stream();
       
    }
    public function export_excel()
    {

    }

    public function cs()
    {
        return view('costumerservis');
       
    }
    public function total()
    {
        $data['a'] = TransaksiReseler::sum('subtotal');
        
        return view('home_admin', $data);
    }
}

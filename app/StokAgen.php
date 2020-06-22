<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokAgen extends Model
{
    protected $table    = 'stok_agens';
    protected $fillable = [
        'no',
        'idag',
        'nama_ag',
        'tlp_ag',
        'alamat_ag',
        'kode_ag',
        'nomor_suratjalan',
        'qty',
        'product_name',
        'jenis_produk',
        'kode_produk',
        'ed',
        'harga',
        'total',
        'grandtotal'
    ];
    
    public static function getid()
    {
        return $geid = \DB::table('stok_agens')->orderBy('no', 'ASC')->get();
    }
    public function apotik()
    {
       return $this->hasMany('App\StokApotik');
    }
    public static function getno()
    {
        return $geid = \DB::table('stok_agens')->max('no');
    }
}

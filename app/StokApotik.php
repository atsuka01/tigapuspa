<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokApotik extends Model
{
    protected $table    = 'stok_apotiks';
    protected $fillable = [
        'no',
        'idap',
        'nama_ap',
        'tlp_ap',
        'alamat_ap',
        'kode_ap',
        'nomor_suratjalan',
        'qty',
        'product_name',
        'jenis_produk',
        'kode_produk',
        'ed',
    ];

    public static function getid()
    {
        return $geid = \DB::table('stok_apotiks')->max('id');
    }
    public static function getno()
    {
        return $geid = \DB::table('stok_apotiks')->max('no');
    }
    
    public function agen()
    {
        return $this->belongsTo('App/StokAgen');
    }
}

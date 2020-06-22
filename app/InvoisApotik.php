<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoisApotik extends Model
{
    protected $table = 'invois_apotiks';
    protected $fillable = [
        'idap',
        'nomorinvois',
        'kode_produk',
        'kode_ap',
        'product_name',
        'no',
        'harga',
        'jenis_produk',
        'qtyin',
        'diskon',
        'jumlah',
        'total',
        'grandtotal',
        'nama',
        'idap',
];
public static function getno()
    {
        return $geid = \DB::table('invois_apotiks')->max('no');
    }
    public static function getid()
    {
        return $geid = \DB::table('invois_apotiks')->max('id');
    }
}

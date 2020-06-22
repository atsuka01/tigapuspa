<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoismd extends Model
{
    protected $tbale = 'invoismds';
    protected $fillable = [ 
        'idmd',
        'product_name',
        'nomorinvois',
        'nama',
        'total',
        'no',
        'harga',
        'jenis_produk',
        'qtyin',
        'idmd',
        'kode_md',
        'idmd',
        'diskon',
        'jumlah',
];
public static function getid()
    {
        return $geid = \DB::table('invoismds')->orderBy('no', 'ASC')->get();
    }
    public static function ambilid()
    {
        return $geid = \DB::table('invoismds')->max('id');
    }
    public static function getno()
    {
        return $geid = \DB::table('invoismds')->max('no');
    }

}

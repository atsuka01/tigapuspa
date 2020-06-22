<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoisRs extends Model
{
    protected $table = 'invois_rs';
    protected $fillable = [
        'idrs',
        'nomorinvois',
        'kode_produk',
        'kode_rs',
        'product_name',
        'no',
        'harga',
        'jenis_produk',
        'qtyin',
        'diskon',
        'jumlah',
        'total',
        'grandtotal'
];
public static function getid()
    {
        return $geid = \DB::table('invois_rs')->orderBy('no', 'ASC')->get();
    }
}

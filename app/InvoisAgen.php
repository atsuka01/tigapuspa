<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoisAgen extends Model
{
    protected $table = 'invois_agens';
    protected $fillable = [
        'idag',
        'nomorinvois',
        'kode_produk',
        'kode_ag',
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
        return $geid = \DB::table('invois_agens')->orderBy('no', 'ASC')->get();
    }
}

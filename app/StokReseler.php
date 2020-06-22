<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokReseler extends Model
{
    protected $table = 'stok_reselers';
    protected $fillable = [
        'no',
        'idrs',
        'nama',
        'alamat',
        'kode_produk',
        'nomor_suratjalan',
        'kode_rs',
        'qty',
        'harga',
        'product_name',
        'jenis_produk',
        'ed',
];
public static function getid()
    {
        return $geid = \DB::table('stok_reselers')->orderBy('no', 'ASC')->get();
    }

}

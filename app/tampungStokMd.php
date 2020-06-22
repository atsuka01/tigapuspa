<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tampungStokMd extends Model
{
    protected $table = 'tampung_stok_mds';
    protected $fillable = [
        'kodeproduk',
        'nama_produk',
        'price',
        'jumlah_stok',
        'idmd',
        'id_produk'
        
];
public static function getid()
    {
        return $geid = \DB::table('tampung_stok_mds')->max('id');
    }

}


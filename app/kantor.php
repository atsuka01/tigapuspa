<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kantor extends Model
{
    protected $table = 'kantors';
    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'harga_produk',
        'jumlah_stok',
        'kode_produk',
        'kategori',
];
public static function getid()
    {
        return $geid = \DB::table('kantors')->orderBy('id')->get();
    }
}

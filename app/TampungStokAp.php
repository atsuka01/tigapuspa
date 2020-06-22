<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TampungStokAp extends Model
{
    protected $table = 'tampung_stok_aps';
    protected $fillable = [
        'idap',
        'kodeproduk',
        'product_name',
        'jenis_produk',
        'jumlah_stok',
        'harga',
];
}

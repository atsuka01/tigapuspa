<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tampungStokRs extends Model
{
    protected $table = 'tampung_stok_rs';
    protected $fillable = [
    'idrs',
    'kodeproduk',
    'product_name',
    'jenis_produk',
    'jumlah_stok',
];
}

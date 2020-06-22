<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TampungStokAgen extends Model
{
    protected $table = 'tampung_stok_agens';
    protected $fillable = [
        'idap',
        'kodeproduk',
        'product_name',
        'jenis_produk',
        'jumlah_stok',
];
}

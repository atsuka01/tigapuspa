<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukMd extends Model
{
    protected $table = 'produk_mds';
    protected $fillable = [
        'kode_produk',
        'produk',
        'qtyin',
        'harga',
        'diskon',
        'jumlah',
        'total',
        'grandtotal',
    ];
}

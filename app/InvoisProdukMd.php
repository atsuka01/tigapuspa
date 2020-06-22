<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoisProdukMd extends Model
{
    protected $table = 'invois_produk_md';
    protected $fillable = [
        'idmd',
        'kode_produk',
        'produk',
        'harga',
        'qtyin',
        'jumlah',
        'total',
        'id_invoismds'
    ];
}

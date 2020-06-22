<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanReseler extends Model
{
    protected $table = 'penjualan_reselers';
    protected $fillable = [
        'oders_id',
        'produk',
        'jenis_produk',
        'qty',
        'price',
        'dis',
        'batch',
        'amount',
        'kode_produk',
        'disrs',
        'dis25',
        'dis15',
        'id_produk',
];

}

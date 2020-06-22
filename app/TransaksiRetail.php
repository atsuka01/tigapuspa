<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiRetail extends Model
{
    protected $table = 'transaksi_retails';
    protected $fillable = [
        'id_retail',
        'oders_id',
        'produk',
        'jenis_produk',
        'qty',
        'price',
        'dis',
        'batch',
        'amount',
     
];
}

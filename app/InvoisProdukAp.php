<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoisProdukAp extends Model
{
    protected $table = 'invois_produk_ap';
    protected $fillable = [
        'idap',
        'id_invoisap',
        'kode_produk',
        'produk',
        'harga',
        'diskon',
        'qtyin',
        'jumlah',
        'total',
        'grandtotal'
    ];
    
}

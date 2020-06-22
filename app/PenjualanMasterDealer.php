<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanMasterDealer extends Model
{
    protected $table = 'penjualan_master_dealers';
 
    protected $fillable = [
        'id_transaksimd',
        'dismd',
        'produk',
        'jenis_produk',
        'qty',
        'price',
        'dis',
        'batch',
        'amount',
        'diskonmd',
     
];
public function transaksimd()
{
    return $this->hasMany(TransaksiMasterDealer::class);
}
}

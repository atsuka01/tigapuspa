<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiOnline extends Model
{
    protected $table = 'transaksi_onlines';
    protected $primaryKey = 'orders_id';
    protected $fillable = [
        'oders_id',
        'kategori',
        'produk',
        'jenis_produk',
        'qty',
        'price',
        'dis',
        'batch',
        'amount',
     
];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function orderDetail(){
        return $this->hasMany(TransaksiOnline::class, 'orders_id');
    }
}

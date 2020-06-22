<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderOnline extends Model
{
    protected $table = 'order_onlines';
    protected $fillable = [
        'nama_pelanggan',
        'nohandpone_pelanggan',
        'alamat_pelanggan',
        'kota_pelanggan',
        
];
}

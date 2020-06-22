<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LunasMD extends Model
{
    protected $table = 'lunas_m_d_s';
    protected $fillable = [
        'no',
        'nama',
        'alamat',
        'idmd',
        'kode_produk',
        'nomor_lunas',
        'kode_md',
        'qty',
        'product_name',
        'jenis_produk'
];

}

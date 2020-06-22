<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRetail extends Model
{
    protected $table = 'data_retails';
    protected $fillable =[
        'no',
        'nama_retail',
        'nomor_invoice',
        'subtotal',
        'kode_produk',
        'notlp',
        'alamat',
];
public static function getno()
    {
        return $geid = \DB::table('data_retails')->max('no');
    }
    public static function getid()
    {
        return $geid = \DB::table('data_retails')->max('id');
    }
}

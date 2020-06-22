<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanItem extends Model
{
    protected $table = 'laporan_items';
    protected $fillable = [
        'id_laporan',
        'produk',
        'qty',
        'diskon',
        'jumlah',

    ];
    public static function getid()
    {
        return $geid = \DB::table('laporan')->max('id');
    }
}

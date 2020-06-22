<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokMasterdealer extends Model
{
    protected $table        = 'stok_masterdealers';
    protected $fillable      = [
        'kode_produk',
        'kode_md',
        'product_name',
        'jenis_produk',
        'qty',
        'status_stok',
        'nomor_suratjalan',
        'no',
        'idmd',
        'nama',
        'tanggal',
        'ed',
        'kategori',
        'batch'
];
public function stokmd(){
    return $this->hasMany('App/MasterDealer');
}
public static function getid()
    {
        return $geid = \DB::table('tampung_stok_mds')->orderBy('no', 'ASC')->max('id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table ='produksis';
    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'id_produk',
        'kode_produk',
        'jumlah_stok'
];
    public function jumlah_produksi()
    {
        return $this->hasMany(JumlahProduksi::class);
    }
    public static function getid()
    {
        return $geid = \DB::table('produksis')->orderBy('id_produk')->sum('id_produk');
    }
}

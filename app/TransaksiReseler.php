<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiReseler extends Model
{
    protected $table = 'transaksi_reselers';
    protected $fillable = [
        'nama_toko',
        'tlp_cs',
        'kode_produk',
        'kode_md',
        'kode_rs',
        'kode_cs',
        'nama_customer',
        'notlp_customer',
        'alamat_customer',
        'kota_customer',
        'subtotal',
        'nomor_invoice',
        'user_id',
        'pembayaran',
        'dis',
        'disrs',
        'dismd',
        'tanggal',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'desa_kelurahan',
        'kode_pos',
];
public static function getid()
    {
        return $geid = \DB::table('transaksi_reselers')->max('id');
    }
    public static function getno()
    {
        return $geid = \DB::table('transaksi_reselers')->max('no');
    }
}

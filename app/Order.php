<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable =[
        'kode_cs',
        'kategori',
        'jenis_toko',
        'nama_customer',
        'alamat_customer',
        'notlp_customer',
        'kota_customer',
        'subtotal',
        'nomor_invoice',
        'pembayaran',
        'nomor_invoice',
        'kode_produk',
        'user_id',
        'no',
        'tanggal',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'desa_kelurahan',
        'kode_pos',
        
];
    public function transaksi()
    {
        return $this->hasMany('App\user');
    }
    public static function getid()
    {
        return $geid = \DB::table('orders')->max('no');
    }
}

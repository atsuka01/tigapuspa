<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiMasterDealer extends Model
{
    protected $table = 'transaksi_master_dealers';
    protected $fillable = [
        'kode_cs',
        'no',
        'nama_md',
        'kode_produk',
        'kodem_md',
        'nama_toko',
        'tlp_cs',
        'nama_customer',
        'alamat_customer',
        'kota_customer',
        'notlp_customer',
        'kota_customer',
        'nomor_invoice',
        'user_id',
        'subtotal',
        'kategori',
        'status',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'desa_kelurahan',
        'kodepos',
        'tanggal'
        
];
public function penjualan()
{
    return $this->bengsTo(PenjualanMasterDealer::class);
}
public static function getid()
    {
        return $geid = \DB::table('transaksi_master_dealers')->max('no');
    }
    public static function ambilid()
    {
        return $geid = \DB::table('transaksi_master_dealers')->max('id');
    }

}

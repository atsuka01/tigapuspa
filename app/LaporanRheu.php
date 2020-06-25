<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanRheu extends Model
{
    protected $table = 'laporan_rheu';
    protected $fillable = [
        'tanggal',
        'nomor_invois',
        'alamat',
        'kota',
        'telepon',
        'kode_md_rs',
        'produk',
        'cs',
        'no',
        '0',
        'qty',
        'paking_expedisi',
        'keterangan',
        'nama_reseler',
        'subtotal'
    ];
   
    public static function getid()
    {
        return $geid = \DB::table('laporan_rheu')->max('id');
    }
    public static function getno()
    {
        return $geid = \DB::table('lporan_lsy')->max('no');
    }
    public function laporanitemrheumapas()
    {
        return $this->hasMany(LaporanItemRheu::class,'id_laporan_rheu');
    }
    public function coba()
    {
        return $this->hasMany(LaporanItemLsy::class,'id_laporan_lsy');
    }
    public static function lsys()
    {
        return $geid = \DB::table('lporan_item_lsy')->where('produk', 'LSY_S')->max('id');
    }
}

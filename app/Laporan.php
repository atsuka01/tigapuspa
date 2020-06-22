<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table ='laporan';
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'telepon',
        'kode_md_rs',
        'produk',
        'disc',
        'jumlah',
        'cs',
        'parking_expedisi',
        'keterangan',
        'nama_reseler',
        'lsy'
    ];
}

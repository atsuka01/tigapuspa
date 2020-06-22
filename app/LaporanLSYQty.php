<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanLSYQty extends Model
{
    protected $table = 'laporan_lsy_qty';
    protected $fillable = [
        'id_laporan',
        'qty',
        'id_laporanitemlsy'
    ];
    public function laporanlsy()
    {
        return $this->belongsTo(LaporanItemLsy::class);
    }
}

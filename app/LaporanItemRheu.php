<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanItemRheu extends Model
{
    protected $table = 'laporan_item_rheu';
    protected $fillable = [
       'id_laporan_metama',
       'produk',
       'qtyin',
       'diskon',
       'jumlah',
    ];
    public function laporanlsy()
    {
        return $this->belongsTo(LaporanLSY::class);
    }
    public function coba()
    {
        return $this->hasMany(LaporanLSYQty::class,'id_laporanitemlsy');
    }
    public function lsy()
    {
        return $this->belongsTo(Lsy::class);
    }
    public static function lsys()
    {
        return $geid = \DB::table('lporan_item_lsy')->where('produk', 'LSY_S')->get(['produk','qtyin']);
    }
}

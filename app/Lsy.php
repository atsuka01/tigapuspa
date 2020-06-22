<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsy extends Model
{
    protected $table = 'lsy';
    protected $fillable = [
        'produk'
    ];
    public function qty()
    {
        return $this->hasMany(LaporanItemLsy::class, 'id_laporan_lsy');
    }
}

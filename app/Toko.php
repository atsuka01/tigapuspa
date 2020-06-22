<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'tokos';
    protected $fillable = [
        'kode_cs',
        'nama_toko',
        'jenis_toko'
];
}

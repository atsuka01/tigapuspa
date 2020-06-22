<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apotik extends Model
{
    protected $table = "apotiks";
    protected $fillable = [
        'kode_apotik',
        'nama_apotik',
        'tlp_apotik',
        'alamat_apotik',
];
}

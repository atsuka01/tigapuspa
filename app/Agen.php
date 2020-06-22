<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'agens';
    protected $fillable = [
        'kode_agen',
        'nama_agen',
        'notlp_agen',
        'alamat_agen',
];
}

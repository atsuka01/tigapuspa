<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseler extends Model
{
    protected $table = 'reselers';
    protected $fillable = [
        
            'nama_rs',
            'kode_rs',
            'no_rs',
            'alamat_rs',
            'id_md',
];
public function getMd()
{
   return $this->hasMany('App\MasterDealer');
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDealer extends Model
{
   protected $table     = "master_dealers";
    protected $fillable = [
        'nama_md',
        'no_md',
        'alamat_md',
        'kode_md'
];
public function getReseler()
{
    return $this->belongsTo('App\Reseler');
} 
public static function getid()
    {
        return $geid = \DB::table('transaksi_reselers')->max('id');
    }  
}

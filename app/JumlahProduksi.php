<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JumlahProduksi extends Model
{
    protected $table = 'Jumlah_produksis';
    protected $fillable = [
        'id_produksi',
        'kode_nb',
        'kode_ed',
        'jumlah_produksi',
        'kode_produk'
    ] ;
    public function produksi(){
        return $this->belongsTo(Produksi::class);
    }
}

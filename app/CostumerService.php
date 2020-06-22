<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostumerService extends Model
{
    protected $table = 'costumer_services';
    protected $fillable = ['nama_cs', 'kode_cs', 'tlp_cs'];
}


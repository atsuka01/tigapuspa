<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoInvoice extends Model
{
    protected $table = 'invoisno';
    protected $fillable = [
        'nomor_urut',
        'day'
];
}

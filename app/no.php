<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class no extends Model
{
    protected $table = 'no';
    protected $fillable = [
        'no'
    ];
    public static function getno()
    {
        return $geid = \DB::table('no')->max('no');
    }
}

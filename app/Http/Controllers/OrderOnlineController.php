<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderOnline;
use App\TransaksiOnline;
use App\Item;

class OrderOnlineController extends Controller
{
    public function store( Request $request)
    {
       $data    = $request->all();
       $lastid  = OrderOnline::create($data)->id; 
       if (count($request->product_name) > 0) {
           # code...
       }
    }
}

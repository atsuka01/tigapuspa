<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pe;

class PeController extends Controller
{
    public function index()
    {
        return view('pe.index');
    }
}

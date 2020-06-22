<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CostumerService;

class CsController extends Controller
{
    public function index()
    {
        $cs = CostumerService::all();
        return view('cs.index', compact('cs'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        CostumerService::create($data);
        return back();
    }
    public function delete($id)
    {
        $data = CostumerService::find($id);
        $data->delete($id);
        return back();
    }
}

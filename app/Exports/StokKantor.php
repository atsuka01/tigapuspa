<?php

namespace App\Exports;

use App\Kantor;
use Maatwebsite\Excel\Concerns\FromCollection;

class StokKantor implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kantor::all();
    }
}

<?php

namespace App\Exports;
use App\DataPolresModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportPolda implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPolresModel::all();
    }
}

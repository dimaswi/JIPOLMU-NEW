<?php

namespace App\Exports;

use App\Models\BukuInduk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExportPeserta implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('export.peserta', [
            'peserta' => BukuInduk::all(),
        ]);
    }
}

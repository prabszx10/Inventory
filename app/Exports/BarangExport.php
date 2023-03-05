<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Barang::all();
    // }

    protected $history_barang;

    public function __construct(array $history_barang)
    {
        $this->history_barang = collect($history_barang);
    }

    public function collection()
    {
        return $this->history_barang;
    }
}

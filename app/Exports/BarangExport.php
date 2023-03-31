<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BarangExport implements FromCollection, WithHeadings, WithMapping
{
    private $history_barang;

    public function __construct($history_barang)
    {
        $this->history_barang = $history_barang;
    }

    public function collection()
    {
        return collect($this->history_barang);
    }

    public function map($row): array
    {
        static $counter = 1; // initialize counter to 1
        return [
            $counter++,
            $row['barang']['barang_nama'],
            $row['history_barang_status'],
            $row['history_barang_tanggal'],
            $row['history_barang_stock'],
            $row['barang']['barang_satuan'],
        ];
    }

    public function headings(): array
    {
        return ['NO', 'Nama' ,'Tipe', 'Tanggal','Stock','Satuan'];
    }
}

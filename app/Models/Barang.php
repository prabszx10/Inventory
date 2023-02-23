<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'barang_nama',
        'barang_keterangan',
        'barang_stock',
        'barang_satuan',
        'barang_status',
        'barang_file',
        'barang_created_at',
    ];

    public function history_barang()
    {
        return $this->hasMany(HistoryBarang::class);
    }
}

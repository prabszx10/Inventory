<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'history_barang_id',
        'history_barang_barang_id',
        'history_barang_stock',
        'history_barang_tanggal',
        'history_barang_status'
    ];

    // public function barang()
    // {
    //     return $this->belongsTo(Barang::class,'history_barang_barang_id');
    // }
}

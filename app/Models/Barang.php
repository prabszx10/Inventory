<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Barang extends Model
{
    use HasFactory;

    protected $primaryKey = 'barang_id';
    protected $fillable = [
        'barang_id',
        'barang_nama',
        'barang_harga',
        'barang_keterangan',
        'barang_stock',
        'barang_satuan',
        'barang_status',
        'barang_file',
        'barang_created_at',
    ];

    // public function history_barang()
    // {
    //     return $this->hasMany(HistoryBarang::class);
    // }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            $uuid = Uuid::uuid4();
            $model->barang_id = Str::substr($uuid->getHex(), 0, 16);
        });
    }
}

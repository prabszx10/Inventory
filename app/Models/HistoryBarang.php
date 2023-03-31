<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class HistoryBarang extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_barang_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'history_barang_id',
        'history_barang_barang_id',
        'history_barang_stock',
        'history_barang_tanggal',
        'history_barang_status'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class,'history_barang_barang_id');
    }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            $uuid = Uuid::uuid4();
            $model->history_barang_id = Str::substr($uuid->getHex(), 0, 16);
        });
    }
}

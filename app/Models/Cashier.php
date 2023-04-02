<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    use HasFactory;

    protected $primaryKey = 'cashier_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'cashier_jumlah_item',
        'cashier_total',
        'barang_keterangan',
        'cashier_diterima',
        'cashier_dikembalikan',
        'cashier_keterangan',
    ];

    public function cashier_detail()
    {
        return $this->hasMany(CashierDetail::class);
    }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            $uuid = Uuid::uuid4();
            $model->cashier_id = Str::substr($uuid->getHex(), 0, 16);
        });
    }
}

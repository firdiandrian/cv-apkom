<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'barang_id', 'quantity', 'customer_name' , 'customer_notelp', 'customer_alamat'
    ];

    public function barangs()
    {
        return $this->belongsTo(Barangs::class, 'barang_id');
    }
    public function pembayarans()
    {
        return $this->belongsTo(Pembayarans::class, 'barang_id');
    }
}
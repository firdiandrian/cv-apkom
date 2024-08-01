<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayarans extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'pemesanan_id','Bukti', 'Konfirmasi'
    ];

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'pemesanan_id');
    }
}
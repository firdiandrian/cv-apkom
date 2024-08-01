<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
        'NamaBarang', 'Stok', 'Harga', 'Foto'

    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'Stok'); // Sesuaikan dengan nama foreign key Anda
    }
    
}
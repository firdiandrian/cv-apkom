<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    protected $table = 'market';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
        'NamaBrg', 'StokBrg', 'HargaBrg'
    ];
}
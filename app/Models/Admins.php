<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
        'Nama', 'Email', 'Password'
    ];
}
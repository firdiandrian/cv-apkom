<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
        'NamaPengirim', 'EmailPengirim', 'NoTelpPengirim', 'Massage'
    ];
}
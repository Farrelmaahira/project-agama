<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    use HasFactory;

    protected $dates = ['tanggal'];
    protected $fillable = [
        'judul',
        'tanggal',
        'jam',
        'description',
        'foto'
    ];
}



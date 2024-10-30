<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sunnah extends Model
{
    use HasFactory;
    protected $fillable = [
        "judul",
        "foto",
        "description"
    ];
}

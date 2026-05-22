<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepie extends Model
{
    use HasFactory;

    protected $fillable = [
        'recepie_name',
        'price',
        'description',
        'ingredients'
    ];
}
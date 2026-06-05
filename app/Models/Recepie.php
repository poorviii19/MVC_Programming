<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Recepie extends Model
// {
//     protected $fillable = [
//         'recepie_name',
//         'price',
//         'description',
//         'ingredients'
//     ];
// }



namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Recepie extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'recepies';

    protected $fillable = [
        'recepie_name',
        'price',
        'description',
        'ingredients'
    ];
}
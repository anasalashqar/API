<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'transmission',
        'fuel_type',
        'mileage',
        'price',
        'description',
        'is_available',
        "image_url"
    ];
}

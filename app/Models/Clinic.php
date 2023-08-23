<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;


    public $defaultSelect = [
        'id',
        'firstname',
        'lastname',
        'date_of_birth',
        'address',
        'gender',
        'city_id',
        'country_id',
        'about'
    ];

    // public $with  = ['user',
    // 'avatar',
    // 'specialCases'];


}

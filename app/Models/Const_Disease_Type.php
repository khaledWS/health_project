<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Const_Disease_Type extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $table = 'const_disease_types';

    public $timestamps = false;
}

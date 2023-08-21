<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CONST_Doctor_Specialty extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'CONST_Doctor_Specialty';
}

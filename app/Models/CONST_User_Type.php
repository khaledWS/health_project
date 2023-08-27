<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CONST_User_Type extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'const_user_type';

    public $timestamps = false;



    public const PATIENT = 1;
}

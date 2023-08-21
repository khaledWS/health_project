<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CONST_System_Language extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'CONST_System_Language';
}

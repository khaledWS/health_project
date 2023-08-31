<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Const_Test_Types extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'const_test_types';

    public $timestamps = false;


    public const TYPE_SINGLE = 1;
    public const TYPE_PROFILE = 2;
    public const TYPE_MACHINE = 3;
}

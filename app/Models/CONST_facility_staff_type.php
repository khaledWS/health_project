<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CONST_facility_staff_type extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $table = 'const_facility_staff_types';

    public $timestamps = false;
}

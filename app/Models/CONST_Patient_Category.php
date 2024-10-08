<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CONST_Patient_Category extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'const_patient_categories';

    public $timestamps = false;

}

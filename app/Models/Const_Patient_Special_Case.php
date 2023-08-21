<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Const_Patient_Special_Case extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'const_patient_special_cases';

    public $timestamps = false;
}

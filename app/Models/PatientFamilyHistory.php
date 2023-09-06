<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientFamilyHistory extends Model
{
    use SoftDeletes;

    protected $table = "patient_family_history";
}

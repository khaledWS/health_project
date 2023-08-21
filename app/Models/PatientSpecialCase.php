<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientSpecialCase extends Model
{
    use SoftDeletes;

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function specialCase()
    {
        return $this->belongsTo(Const_Patient_Special_Case::class,'special_case_id');
    }
}

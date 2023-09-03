<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientCarePlan extends Model
{
    use SoftDeletes;


    protected $fillable =  [
        'patient_id',
        'doctor_id',
        'clinic_id',
        'assessment',
        'nursing_diagnosis',
        'nursing_interventions',
        'rationale',
        'evaluations',
        'created_by',
    ];

    public  static $select =  [
        'id',
        'patient_id',
        'doctor_id',
        'clinic_id',
        'assessment',
        'nursing_diagnosis',
        'nursing_interventions',
        'rationale',
        'evaluations',
        'created_by',
        'status',
        'created_at'
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}

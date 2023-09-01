<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientSoap extends Model
{
    use SoftDeletes;


    protected $fillable =  [
        'diagnosis_id',
        'patient_id',
        'doctor_id',
        'clinic_id',
        'subjective',
        'objective',
        'assessment',
        'plan',
        'outcomes',
        'notes',
        'status',
        'created_by',
        'updated_by',
    ];

    public  static $select =  [
        'id',
        'diagnosis_id',
        'patient_id',
        'doctor_id',
        'clinic_id',
        'subjective',
        'objective',
        'assessment',
        'plan',
        'outcomes',
        'notes',
        'status',
        'created_at'
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

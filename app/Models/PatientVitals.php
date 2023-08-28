<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientVitals extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'clinic_id',
        'doctor_id',
        'patient_id',
        'patient_id',
        'height',
        'weight',
        'pulseRate',
        'temperature',
        'bp_systolic',
        'bloodSugar',
        'respiratory',
        'spo_two',
        'bp_diastolic',
        'head_circumference',
        'urine',
        'bmi',
        'weight_status',
        'pain_scale',
        'datetime',
        'created_by',
        'updated_by',
    ];

    public $with = ['doctor'];

    /**
     * Relationships
     */

    /**
     * vitals doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * vitals doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    /**
     * vitals clinic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    /**
     * vitals patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}

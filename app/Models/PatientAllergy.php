<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientAllergy extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'patient_id',
        'allergen_id',
        'allergy_id',
        'severity_id',
        'reaction',
        'clinic_id',
        'status',
        'created_by'
    ];


    public static $select = [
        'patient_id',
        'allergen_id',
        'allergy_id',
        'severity_id',
        'reaction',
        'clinic_id',
        'status',
        'created_by'
    ];

    public static $resource = "PatientAllergyResource";

    /**
     * Relationships
     */

    /**
     * Allergy
     */
    public function allergy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(allergy::class, 'allergy_id');
    }

    /**
     * Allergen
     */
    public function allergen(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Allergen::class, 'allergen_id');
    }

    /**
     * Severity
     */
    public function severity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(severity::class, 'severity_id');
    }

    /**
     * Doctor
     */
    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'created_by');
    }

    /**
     * Clinic
     */
    public function clinic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    /**
     * Patient
     */
    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}

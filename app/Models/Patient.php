<?php

namespace App\Models;

use App\Models\Scopes\PatientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;


        /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new PatientScope);
    }


    public function user()
    {
        return $this->hasOne(User::class,'user_type_reference_id')->where('user_type_id', CONST_User_Type::PATIENT);
    }

    public function specialCases()
    {
        return $this->hasMany(PatientSpecialCase::class,'patient_id');
    }
}

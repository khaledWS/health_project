<?php

namespace App\Models;

use App\Models\Scopes\DoctorsScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes, HasFactory;

    public const USER_TYPE = 2;


    public $defaultSelect = [
        'id',
        'firstname',
        'lastname',
        'date_of_birth',
        'address',
        'gender',
        'city_id',
        'country_id',
        'about',
        'speciality_id'
    ];


    public $with = ['user'];


    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new DoctorsScope);
    }



    /**
     * Relationships
     */

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_type_reference_id')->where('user_type_id', static::USER_TYPE);
    }

    public function specialty(){
        return $this->belongsTo(CONST_Doctor_Specialty::class,'speciality_id');
    }
}

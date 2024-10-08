<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
        // 'password' => 'md5',
    ];


    // public $with = ['identity'];


    public const USER_TYPE_PATIENT = 1;
    public const USER_TYPE_DOCTOR = 2;
    public const USER_TYPE_LAB = 3;
    public const USER_TYPE_Pharmacist = 4;
    public const USER_TYPE_Facility_Administrator = 5;
    public const USER_TYPE_Country_Administrator = 6;
    public const USER_TYPE_System_Administrator = 7;
    public const USER_TYPE_STAFF = 8;


    public function identity()
    {
        $model_name = CONST_User_Type::findOrFail($this->user_type_id)->model_name;
        return $this->belongsTo($model_name, 'user_type_reference_id');
    }
}

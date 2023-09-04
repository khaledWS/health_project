<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allergen extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'allergy_type_id',
        'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Relationships
     */

     public function type():\Illuminate\Database\Eloquent\Relations\BelongsTo
     {
        return $this->belongsTo(CONST_allergy_types::class ,'allergy_type_id');
     }
}

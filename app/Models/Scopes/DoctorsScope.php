<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class DoctorsScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->user()->hasRole('facility_admin')) {
            //get doctors whos clinics belong to the facility
        }

        if (auth()->user()->hasRole('nurse')) {
            //get doctors whos clinics belong to the facility that the nurse belongs to
        }

        if (auth()->user()->hasRole('country_admin')) {
            //get doctors whos clinics belong to the country
        }

        if (auth()->user()->hasRole('reception')) {
            //get doctors whos in the s ame clinic as the reception
        }
    }
}

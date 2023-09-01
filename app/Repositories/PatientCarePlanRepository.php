<?php

namespace App\Repositories;

use App\Models\PatientCarePlan;
use Illuminate\Support\Collection;

class PatientCarePlanRepository
{
    public function all(): Collection
    {
        return PatientCarePlan::all();
    }

    public function find(String $id): ? PatientCarePlan
    {
        return PatientCarePlan::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $PatientCarePlan = PatientCarePlan::insert($attributes);
        return $PatientCarePlan;
    }

    public function update(String $id, array $attributes): Bool
    {
        $PatientCarePlan = PatientCarePlan::find($id);
        return $PatientCarePlan->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $PatientCarePlan = PatientCarePlan::find($id);
        return $PatientCarePlan->delete();
    }
}

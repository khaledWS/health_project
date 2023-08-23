<?php

namespace App\Repositories;

use App\Models\PatientVitals;
use Illuminate\Support\Collection;

class patientVitalsRepository
{
    // public function all(): Collection
    // {
    //     return PatientVitals::all();
    // }

    public function paginate(string $patient_id)
    {
        return PatientVitals::query()->where('patient_id', $patient_id)->paginate(10);
    }

    // public function find(String $id): ?PatientVitals
    // {
    //     return PatientVitals::find($id);
    // }

    // public function insert(array $attributes): Bool
    // {
    //     $PatientVitals = PatientVitals::insert($attributes);
    //     return $PatientVitals;
    // }

    // public function update(String $id, array $attributes): Bool
    // {
    //     $PatientVitals = PatientVitals::find($id);
    //     return $PatientVitals->update($attributes);
    // }

    // public function delete(String $id): Bool
    // {
    //     $PatientVitals = PatientVitals::find($id);
    //     return $PatientVitals->delete();
    // }
}

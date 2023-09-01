<?php

namespace App\Repositories;

use App\Models\Diagnosis;
use Illuminate\Support\Collection;

class DiagnosisRepository
{
    public function all(): Collection
    {
        return Diagnosis::all();
    }

    public function find(String $id): ? Diagnosis
    {
        return Diagnosis::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $Diagnosis = Diagnosis::insert($attributes);
        return $Diagnosis;
    }

    public function update(String $id, array $attributes): Bool
    {
        $Diagnosis = Diagnosis::find($id);
        return $Diagnosis->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $Diagnosis = Diagnosis::find($id);
        return $Diagnosis->delete();
    }
}

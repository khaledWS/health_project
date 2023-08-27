<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Collection;

class DoctorRepository
{
    public function all(): Collection
    {
        return Doctor::all();
    }

    public function find(String $id): ? Doctor
    {
        return Doctor::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $Doctor = Doctor::insert($attributes);
        return $Doctor;
    }

    public function update(String $id, array $attributes): Bool
    {
        $Doctor = Doctor::find($id);
        return $Doctor->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $Doctor = Doctor::find($id);
        return $Doctor->delete();
    }
}

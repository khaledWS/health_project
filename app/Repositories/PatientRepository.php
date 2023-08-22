<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Support\Collection;

class PatientRepository
{
    public function all(): Collection
    {
        return Patient::all();
    }

    public function paginate()
    {
        return Patient::query()
            ->select('id','firstname','lastname' ,'date_of_birth', 'address', 'gender','city_id','country_id','about')
            ->with(['user' => function ($user) {
                $user->select('id', 'username', 'email', 'national_id', 'phone', 'user_type_reference_id', 'user_type_id');
            },
            'specialCases',
            'avatar' => function ($avatar){
                $avatar->select('id','full_small_path');
            }

            ])->paginate(10);
    }

    public function find(String $id): ?Patient
    {
        return Patient::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $Patient = Patient::insert($attributes);
        return $Patient;
    }

    public function update(String $id, array $attributes): Bool
    {
        $Patient = Patient::find($id);
        return $Patient->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $Patient = Patient::find($id);
        return $Patient->delete();
    }
}

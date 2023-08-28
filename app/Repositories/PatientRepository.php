<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PatientRepository
{
    public function all(): Collection
    {
        return Patient::all();
    }

    public function paginate($attributes)
    {
        $reformed_attributes = reformPaginateAttributes($attributes);

        $patients =   $this->doctorPatientsPageQuery($reformed_attributes)->get();
        $patients_count = $this->doctorPatientsPageQuery($reformed_attributes)->count();

        return compact('patients','patients_count');
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

    public function doctorPatientsPageQuery($reformed_attributes)
    {
        return Patient::query()
            ->select('id', 'firstname', 'lastname', 'date_of_birth', 'address', 'gender', 'city_id', 'country_id', 'about')
            ->with([
                'user' => function ($user) {
                    $user->select('id', 'username', 'email', 'national_id', 'phone', 'user_type_reference_id', 'user_type_id');
                },
                'specialCases',
                'avatar' => function ($avatar) {
                    $avatar->select('id', 'full_small_path');
                }

            ])
            ->where(function ($query) use ($reformed_attributes) {
                if (isset($reformed_attributes['search_value'])) {
                    $query->where('firstname', $reformed_attributes['search_value'])->orwhere('lastname', $reformed_attributes['search_value']);
                }
            })
            ->orderBy($reformed_attributes['order_by'], $reformed_attributes['order_direction'])
            ->offset($reformed_attributes['start'])
            ->limit($reformed_attributes['length']);
    }
}

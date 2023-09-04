<?php

namespace App\Repositories;

use App\Http\Traits\SpaPaginationTrait;
use App\Models\PatientAllergy;
use Illuminate\Support\Collection;

class PatientAllergyRepository
{
    use SpaPaginationTrait;

    public function all(): Collection
    {
        return PatientAllergy::all();
    }

    public function find(String $id): ?PatientAllergy
    {
        return PatientAllergy::find($id);
    }

    public function insert(array $attributes): PatientAllergy
    {
        $PatientAllergy = PatientAllergy::insert($attributes);
        return $PatientAllergy;
    }

    public function update(String $id, array $attributes): Bool
    {
        $PatientAllergy = PatientAllergy::find($id);
        return $PatientAllergy->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $PatientAllergy = PatientAllergy::find($id);
        return $PatientAllergy->delete();
    }

    public function paginate(string $patient_id, array $paginationAttributes): array
    {
        $data =   $this->getPatientAllergiesQuery($patient_id, $paginationAttributes)->get();
        $count = $this->getPatientAllergiesQuery($patient_id, $paginationAttributes)->count();
        $model = PatientAllergy::class;

        return compact('data', 'count','model');
    }


    public function getPatientAllergiesQuery(string $patient_id, $paginationAttributes = null): \Illuminate\Database\Eloquent\Builder
    {
        $PatientCarePlanQuery =  PatientAllergy::query()
            ->select(PatientAllergy::$select)
            ->with([
                'doctor' => function ($doctor) {
                    $doctor->select('id', 'firstname', 'lastname', 'gender');
                },
                'allergen' => function ($allergen) {
                    $allergen->select('id', 'title');
                },
                'severity' => function ($severity) {
                    $severity->select('id', 'title');
                },
                'allergy' => function ($allergy) {
                    $allergy->select('id', 'title');
                }
            ])
            ->where('patient_id', $patient_id);


        if (isset($paginationAttributes)) {
            $PatientCarePlanQuery = $this->addPaginateAttributesToQuery($PatientCarePlanQuery, $paginationAttributes);
        }

        return $PatientCarePlanQuery;
    }
}

<?php

namespace App\Repositories;

use App\Models\PatientVitals;
use Illuminate\Support\Collection;

class patientVitalsRepository
{

    
    /**
     * paginate
     *
     * @param  string $patient_id
     * @param  array $attributes
     * @return array
     */
    public function paginate(string $patient_id, array $attributes): array
    {
        $reformed_attributes = reformPaginateAttributes($attributes);

        $vitals =   $this->PatientsVitalsPaginateQuery($patient_id,$reformed_attributes)->get();
        $vitals_count = $this->PatientsVitalsPaginateQuery($patient_id,$reformed_attributes)->count();

        return compact('vitals', 'vitals_count');
    }


    public function insert(array $attributes): PatientVitals
    {
        $PatientVitals = PatientVitals::create($attributes);
        return $PatientVitals;
    }


    /**
     * PatientsVitalsPaginateQuery
     *
     * @param  string $patient_id
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function PatientsVitalsPaginateQuery(string $patient_id, array $attributes): \Illuminate\Database\Eloquent\Builder
    {
        return PatientVitals::query()
            ->with(['doctor' => function ($doctor) {
                $doctor->select();
            }])
            ->where('patient_id', $patient_id)
            ->orderBy($attributes['order_by'], $attributes['order_direction'])
            ->offset($attributes['start'])
            ->limit($attributes['length']);
    }
}

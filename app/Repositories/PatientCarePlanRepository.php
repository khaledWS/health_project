<?php

namespace App\Repositories;

use App\Http\Traits\SpaPaginationTrait;
use App\Models\PatientCarePlan;
use Illuminate\Support\Collection;

class PatientCarePlanRepository
{
    use SpaPaginationTrait;
    
    public function paginate(string $patient_id, array $paginationAttributes): array
    {
        $data =   $this->getPatientCarePlanQuery($patient_id, $paginationAttributes)->get();
        $count = $this->getPatientCarePlanQuery($patient_id, $paginationAttributes)->count();

        return compact('data', 'count');
    }


    public function store(string $patient_id, array $data): PatientCarePlan
    {
        $data['patient_id'] = $patient_id;
        $data['created_by'] = auth()->user();

        return PatientCarePlan::create($data);
    }

    public function getPatientCarePlanQuery(string $patient_id, $paginationAttributes = null): \Illuminate\Database\Eloquent\Builder
    {
        $PatientCarePlanQuery =  PatientCarePlan::query()
            ->select(PatientCarePlan::$select)
            ->with([
                'doctor' => function ($doctor) {
                    $doctor->select('id', 'firstname', 'lastname', 'gender');
                },
            ])
            ->where('patient_id', $patient_id);


        if (isset($paginationAttributes)) {
            $PatientCarePlanQuery = $this->addPaginateAttributesToQuery($PatientCarePlanQuery, $paginationAttributes);
        }

        return $PatientCarePlanQuery;
    }

}

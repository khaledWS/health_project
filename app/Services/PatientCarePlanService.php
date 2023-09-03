<?php

namespace App\Services;

use App\Repositories\PatientCarePlanRepository;

class PatientCarePlanService
{
    protected $PatientCarePlanRepository;

    public function __construct(PatientCarePlanRepository $PatientCarePlanRepository)
    {
        $this->PatientCarePlanRepository = $PatientCarePlanRepository;
    }

    /**
     * get paginated careplans
     *
     * @return array
     */
    public function paginatePatientSoap(string $patient_id, array $paginationAttributes): array
    {
        $data = $this->PatientCarePlanRepository->paginate($patient_id, $paginationAttributes);
        return $data;
    }

    public function storePatientCarePlan(string $patient_id, array $data): \App\Models\PatientCarePlan
    {
        return $this->PatientCarePlanRepository->store($patient_id, $data);
    }
}

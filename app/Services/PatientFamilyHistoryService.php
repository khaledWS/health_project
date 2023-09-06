<?php

namespace App\Services;


use App\Repositories\PatientFamilyHistoryRepository;

class PatientFamilyHistoryService
{

    public function __construct(private PatientFamilyHistoryRepository $repository)
    {
    }

    /**
     * get Patients and paginate them
     *
     * @return \Illuminate\Support\Collection
     */
    public function paginatePatientFamilyHistory($patient_id, $attributes): array
    {
        $history = $this->repository->paginate($patient_id, $attributes);
        return $history;
    }

    public function storePatientFamilyHistory($patient_id, $attributes): \App\Models\PatientFamilyHistory
    {
        return $this->repository->store($patient_id, $attributes);
    }
}

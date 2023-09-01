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
     * get Patients and paginate them
     *
     * @return \Illuminate\Support\Collection
     */
    public function paginatePatients($attributes)
    {
        $patients = $this->PatientCarePlanRepository->paginate($attributes);
        return $patients;
    }
}

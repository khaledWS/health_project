<?php

namespace App\Services;

use App\Repositories\PatientVitalsRepository;
use Exception;

class PatientVitalsService
{

    protected $patientVitalsRepository;

    public function __construct(PatientVitalsRepository $patientVitalsRepository)
    {
        $this->patientVitalsRepository = $patientVitalsRepository;
    }

    /**
     * get Patient vitals and paginate them
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginatePatientVitals(string $patient_id)
    {
        $vitals = $this->patientVitalsRepository->paginate($patient_id);
        return $vitals;
    }

    // public function showPatient(string $patient_id)
    // {
    //     $patient = $this->patientVitalsRepository->find($patient_id);

    //     if (!$patient) {
    //         throw new Exception('Patient Not Found');
    //     }
    //     return $patient;
    // }
}

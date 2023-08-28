<?php

namespace App\Services;

use App\Models\Patient;
use App\Repositories\PatientRepository;
use Exception;

class PatientService
{

    protected $PatientRepository;

    public function __construct(PatientRepository $PatientRepository)
    {
        $this->PatientRepository = $PatientRepository;
    }

    /**
     * get Patients and paginate them
     *
     * @return \Illuminate\Support\Collection
     */
    public function paginatePatients($attributes)
    {
        $patients = $this->PatientRepository->paginate($attributes);
        return $patients;
    }

    public function showPatient(string $patient_id)
    {
        $patient = $this->PatientRepository->find($patient_id);

        if (!$patient) {
            throw new Exception('Patient Not Found');
        }
        return $patient;
    }
}

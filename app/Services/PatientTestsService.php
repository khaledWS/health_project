<?php

namespace App\Services;

use App\Repositories\patientVitalsRepository;

class PatientTestsService
{

    protected $patientVitalsRepository;

    public function __construct(patientVitalsRepository $patientVitalsRepository)
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

    public function storePatientVitals(string $patient_id, array $data)
    {
        $data['patient_id'] = $patient_id;
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        $vital = $this->patientVitalsRepository->insert($data);
        return $vital;
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

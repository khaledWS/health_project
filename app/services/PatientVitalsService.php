<?php

namespace App\Services;

use App\Repositories\patientVitalsRepository;
use Exception;

class PatientVitalsService
{

    protected $patientVitalsRepository;

    public function __construct(patientVitalsRepository $patientVitalsRepository)
    {
        $this->patientVitalsRepository = $patientVitalsRepository;
    }

    /**
     * paginatePatientVitals
     *
     * @param  string $patient_id
     * @param  array $attributes
     * @return array
     */
    public function paginatePatientVitals(string $patient_id, array $attributes): array
    {
        $vitals = $this->patientVitalsRepository->paginate($patient_id, $attributes);
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
}

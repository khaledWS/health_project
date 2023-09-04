<?php

namespace App\Services;


use App\Repositories\PatientAllergyRepository;

class PatientAllergyService
{

    protected $PatientAllergyRepository;

    public function __construct(PatientAllergyRepository $PatientAllergyRepository)
    {
        $this->PatientAllergyRepository = $PatientAllergyRepository;
    }

    /**
     * get the patient allergies in pagination format
     */
    public function paginatePatientAllergies(string $patient_id, array $paginationAttributes): array
    {
        return $this->PatientAllergyRepository->paginate($patient_id, $paginationAttributes);
    }

    public function storePatientAllergy(string $patient_id, array $data): \App\Models\PatientAllergy
    {
        $data['patient_id'] = $patient_id;
        $data['created_by'] = auth()->user()->id;
        $data['clinic_id'] = auth()->user()->clinicId;
        return $this->PatientAllergyRepository->insert($data);
    }

}

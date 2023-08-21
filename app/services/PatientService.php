<?php

namespace App\Services;

use App\Models\Patient;
use App\Repositories\PatientRepository;

class PatientService{

    protected $PatientRepository;

    public function __construct(PatientRepository $PatientRepository)
    {
        $this->PatientRepository = $PatientRepository;
    }


    public function getPatientsCollection(){
        return $this->PatientRepository->all();
    }

    public function paginatePatients()
    {
       $patients = $this->PatientRepository->paginate();
       return $patients;
    }
}

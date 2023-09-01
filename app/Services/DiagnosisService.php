<?php

namespace App\Services;

use App\Models\Patient;
use App\Repositories\DiagnosisRepository;
use Exception;

class DiagnosisService
{

    protected $DiagnosisRepository;

    public function __construct(DiagnosisRepository $DiagnosisRepository)
    {
        $this->DiagnosisRepository = $DiagnosisRepository;
    }

    /**
     * get Patients and paginate them
     *
     * @return \Illuminate\Support\Collection
     */
    public function paginatePatients($attributes)
    {
        $patients = $this->DiagnosisRepository->paginate($attributes);
        return $patients;
    }
}

<?php

namespace App\Services;


class PatientSoapService
{

    private $PatientSoapRepository;

    public function __construct(\App\Repositories\PatientSoapRepository $PatientSoapRepository)
    {
        $this->PatientSoapRepository = $PatientSoapRepository;
    }



    /**
     * get paginated soap
     *
     * @return array
     */
    public function paginatePatientSoap(string $patient_id, array $paginationAttributes): array
    {
        $patients = $this->PatientSoapRepository->paginate($patient_id, $paginationAttributes);
        return $patients;
    }
    


    /**
     * Store Soap
     */
    public function storePatientSoap(string $patient_id, array $soapData): \App\Models\PatientSoap
    {
        return $this->PatientSoapRepository->store($patient_id, $soapData);
    }
}

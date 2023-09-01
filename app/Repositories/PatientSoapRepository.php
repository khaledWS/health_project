<?php

namespace App\Repositories;

use App\Http\Traits\SpaPaginationTrait;
use App\Models\PatientSoap;

class PatientSoapRepository
{
    use SpaPaginationTrait;

    public function paginate(string $patient_id, array $paginationAttributes): array
    {
        $soap =   $this->getPatientSoapQuery($patient_id, $paginationAttributes)->get();
        $soap_count = $this->getPatientSoapQuery($patient_id, $paginationAttributes)->count();

        return compact('soap', 'soap_count');
    }

    public function store(string $patient_id, array $data): PatientSoap
    {
        $data['patient_id'] = $patient_id;
        $data['created_by'] = auth()->user();

        return PatientSoap::create($data);
    }

    public function getPatientSoapQuery(string $patient_id, $paginationAttributes = null): \Illuminate\Database\Eloquent\Builder
    {
        $patientSoapQuery =  PatientSoap::query()
            ->select(PatientSoap::$select)
            ->with([
                'diagnosis' => function ($diagnosis) {
                    $diagnosis->select('id', 'code', 'short_description', 'long_description');
                },
                'doctor' => function ($doctor) {
                    $doctor->select('id', 'firstname', 'lastname', 'gender');
                },
            ])
            ->where('patient_id', $patient_id);


        if (isset($paginationAttributes)) {
            $patientSoapQuery = $this->addPaginateAttributesToQuery($patientSoapQuery, $paginationAttributes);
        }

        return $patientSoapQuery;
    }
}

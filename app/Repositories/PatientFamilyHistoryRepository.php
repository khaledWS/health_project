<?php

namespace App\Repositories;

use App\Http\Traits\SpaPaginationTrait;
use App\Models\PatientFamilyHistory;


class PatientFamilyHistoryRepository
{
    use SpaPaginationTrait;

    public function __construct(private PatientFamilyHistory $model)
    {
    }

    public function paginate(string $patient_id, array $paginationAttributes): array
    {
        $data =   $this->getPatientFamilyHistoryIndexQuery($patient_id, $paginationAttributes)->get();
        $count = $this->getPatientFamilyHistoryIndexQuery($patient_id, $paginationAttributes)->count();
        $model = $this->model::class;

        return compact('data', 'count', 'model');
    }

    public function store($patient_id, $data)
    {
        $data['patient_id'] = $patient_id;
        $data['created_by'] = auth()->user();
        $data['doctor_id'] = auth()->user()->user_type_reference_id;

        return $this->model->query()->create($data);
    }


    private function getPatientFamilyHistoryIndexQuery(string $patient_id, $paginationAttributes = null): \Illuminate\Database\Eloquent\Builder
    {
        $indexQuery =  $this->model->query()
            ->with([
                'doctor' => function ($doctor) {
                    $doctor->select('id', 'firstname', 'lastname', 'gender');
                },
                'disease' => function ($disease) {
                    $disease->with(['type'])->select('id', 'title');
                },
            ])
            ->where('patient_id', $patient_id);


        if (isset($paginationAttributes)) {
            $indexQuery = $this->addPaginateAttributesToQuery($indexQuery, $paginationAttributes);
        }

        return $indexQuery;
    }
}

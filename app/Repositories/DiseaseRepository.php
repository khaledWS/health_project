<?php

namespace App\Repositories;

use App\Http\Traits\SpaPaginationTrait;
use App\Models\Const_Disease_Type;
use App\Models\Disease;
use App\Models\PatientFamilyHistory;
use Illuminate\Database\Eloquent\Collection;

class DiseaseRepository
{
    use SpaPaginationTrait;

    public function __construct(private Disease $model)
    {
    }

    public function getTypes(): Collection
    {
        return Const_Disease_Type::all();
    }

    public function getByType($type): Collection
    {
        return $this->model->where('type_id', $type)->get();
    }

    public function store($data)
    {
        return $this->model->query()->create($data);
    }
}

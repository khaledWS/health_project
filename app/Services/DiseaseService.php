<?php

namespace App\Services;

use App\Repositories\DiseaseRepository;
use App\Repositories\PatientFamilyHistoryRepository;
use Illuminate\Database\Eloquent\Collection;

class DiseaseService
{

    public function __construct(private DiseaseRepository $repository)
    {
    }

    public function getTypes(): Collection
    {
        return $this->repository->getTypes();
    }

    public function getDiseaseByType($type): Collection
    {
        return $this->repository->getByType($type);
    }
}

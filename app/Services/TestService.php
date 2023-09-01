<?php

namespace App\Services;

use App\Models\Const_Test_Types;
use App\Models\Test;
use App\Repositories\TestRepository;


class TestService
{

    protected $TestRepository;

    public function __construct(TestRepository $TestRepository)
    {
        $this->TestRepository = $TestRepository;
    }


    public function getCategoryTests(string $category_id): \Illuminate\Support\Collection
    {
        return $this->TestRepository->getCategoryTests($category_id);
    }
    
    public function getTestTypes(): \Illuminate\Support\Collection
    {
        return $this->TestRepository->getTestTypes();
    }

    public function getTests(): \Illuminate\Support\Collection
    {
       return $this->TestRepository->all();
    }

    public function getTestLabs(string $test_type,string $test_id, string $patient_id): \Illuminate\Support\Collection
    {
        $labService = app()->make(LaboratoryService::class);

        $labs = $labService->getLabsByTestsAndLocation($test_type, $test_id, $patient_id);

        return $labs;
    }
}

<?php

namespace App\Services;

use App\Models\Const_ProfileTest_Types;
use App\Models\ProfileTest;
use App\Repositories\ProfileTestRepository;


class ProfileTestService
{

    protected $ProfileTestRepository;

    public function __construct(ProfileTestRepository $ProfileTestRepository)
    {
        $this->ProfileTestRepository = $ProfileTestRepository;
    }


    public function getCategoryProfileTests(string $category_id): \Illuminate\Support\Collection
    {
        return $this->ProfileTestRepository->getCategoryProfileTests($category_id);
    }
    
    // public function getProfileTestTypes(): \Illuminate\Support\Collection
    // {
    //     return $this->ProfileTestRepository->getProfileTestTypes();
    // }

    public function all(): \Illuminate\Support\Collection
    {
       return $this->ProfileTestRepository->all();
    }
}

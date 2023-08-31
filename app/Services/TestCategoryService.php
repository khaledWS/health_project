<?php

namespace App\Services;

use App\Repositories\TestCategoryRepository;

class TestCategoryService{

    protected $TestCategoryRepository;

    public function __construct(TestCategoryRepository $TestCategoryRepository)
    {
        $this->TestCategoryRepository = $TestCategoryRepository;
    }


    public function getCategoriesCollection() : \Illuminate\Support\Collection
    {
        return $this->TestCategoryRepository->getCategories();
    }
}

<?php

namespace App\Repositories;


use App\Models\TestCategory;
use Illuminate\Support\Collection;

class TestCategoryRepository
{
    public function all(): Collection
    {
        return TestCategory::all();
    }

    public function find(String $id): ? TestCategory
    {
        return TestCategory::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $TestCategory = TestCategory::insert($attributes);
        return $TestCategory;
    }

    public function update(String $id, array $attributes): Bool
    {
        $TestCategory = TestCategory::find($id);
        return $TestCategory->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $TestCategory = TestCategory::find($id);
        return $TestCategory->delete();
    }

    public function getCategories(): Collection
    {
        return TestCategory::select('id','title','type')->get();
    }
}

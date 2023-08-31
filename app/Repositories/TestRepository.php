<?php

namespace App\Repositories;

use App\Models\Const_Test_Types;
use App\Models\Test;
use Illuminate\Support\Collection;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

class TestRepository
{
    public function all(): Collection
    {
        return Test::all();
    }

    public function paginate($attributes)
    {

    }

    public function find(String $id): ?Test
    {
        return Test::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $Test = Test::insert($attributes);
        return $Test;
    }

    public function update(String $id, array $attributes): Bool
    {
        $Test = Test::find($id);
        return $Test->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $Test = Test::find($id);
        return $Test->delete();
    }


    public function getCategoryTests(string $category_id): Collection
    {
        return Test::query()
        ->select('id','category_id','title','test_code')
        ->where('category_id', $category_id)
        ->get();
    }

    public function getTestTypes(): Collection
    {
        return Const_Test_Types::all();
    }

    
}

<?php

namespace App\Repositories;

use App\Models\ProfileTest;
use Illuminate\Support\Collection;

class ProfileTestRepository 
{
    public function all(): Collection
    {
        return ProfileTest::all();
    }

    public function paginate($attributes)
    {

    }

    public function find(String $id): ?ProfileTest
    {
        return ProfileTest::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $ProfileTest = ProfileTest::insert($attributes);
        return $ProfileTest;
    }

    public function update(String $id, array $attributes): Bool
    {
        $ProfileTest = ProfileTest::find($id);
        return $ProfileTest->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $ProfileTest = ProfileTest::find($id);
        return $ProfileTest->delete();
    }


    public function getCategoryProfileTests(string $category_id): Collection
    {
        return ProfileTest::query()
        ->select('id','category_id','title','ProfileTest_code')
        ->where('category_id', $category_id)
        ->get();
    }
    
}

<?php

namespace App\Repositories;

use App\Models\Allergen;
use Illuminate\Support\Collection;

class AllergenRepository
{
    public function all(): Collection
    {
        return Allergen::all();
    }

    public function find(String $id): ? Allergen
    {
        return Allergen::find($id);
    }

    public function insert(array $attributes): Bool
    {
        $Allergen = Allergen::insert($attributes);
        return $Allergen;
    }

    public function update(String $id, array $attributes): Bool
    {
        $Allergen = Allergen::find($id);
        return $Allergen->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $Allergen = Allergen::find($id);
        return $Allergen->delete();
    }

    public function getAllergensByType(string $type): Collection
    {
        return Allergen::where('allergy_type_id', $type)->get();
    }
}

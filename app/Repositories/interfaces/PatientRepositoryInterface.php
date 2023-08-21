<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Support\Collection;

interface PatientRepositoryInterface
{
    function all(): Collection;
    function find(String $id): ?Patient;
    function insert(array $attributes): Bool;
    function update(String $id, array $attributes): Bool;
    function delete(String $id): Bool;
}

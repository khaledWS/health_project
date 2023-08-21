<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Collection;

interface DoctorRepositoryInterface
{
    function all(): Collection;
    function find(String $id): ?Doctor;
    function insert(array $attributes): Bool;
    function update(String $id, array $attributes): Bool;
    function delete(String $id): Bool;
}

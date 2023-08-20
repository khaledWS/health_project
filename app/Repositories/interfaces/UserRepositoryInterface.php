<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    function all(): Collection;
    function find(String $id): ?User;
    function insert(array $attributes): Bool;
    function update(String $id, array $attributes): Bool;
    function delete(String $id): Bool;
}

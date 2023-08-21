<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    function all(): Collection;
    function find(String $id): ?User;
    function findByEmail(String $email): ?User;
    function insert(array $attributes): Bool;
    function update(String $id, array $attributes): Bool;
    function delete(String $id): Bool;
}

<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function all(): Collection
    {
        return User::all();
    }

    public function find(String $id): ?User
    {
        return User::find($id);
    }

    public function findByEmail(String $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function insert(array $attributes): Bool
    {
        $user = User::insert($attributes);
        return $user;
    }

    public function update(String $id, array $attributes): Bool
    {
        $user = User::find($id);
        return $user->update($attributes);
    }

    public function delete(String $id): Bool
    {
        $user = User::find($id);
        return $user->delete();
    }
}

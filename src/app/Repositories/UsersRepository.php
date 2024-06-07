<?php


namespace App\Repositories;


use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository
{
    /**
     * @param array|string[] $columns
     * @return Collection|User[]
     */
    public static function all(array $columns = ['*']): Collection
    {
        return User::query()
            ->with('role')
            ->get($columns);
    }
}

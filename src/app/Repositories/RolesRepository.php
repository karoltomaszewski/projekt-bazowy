<?php


namespace App\Repositories;


use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class RolesRepository
{
    public static function all(array $columns = ['*']): Collection
    {
        return Role::query()
            ->with('permissions')
            ->get($columns);
    }

    public static function getByName(string $name, array $columns = ['*']): ?Role
    {
        /** @var ?Role $role */
        $role = Role::query()
            ->where('name', $name)
            ->first($columns);

        return $role;
    }
}

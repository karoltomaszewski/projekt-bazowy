<?php


namespace App\Repositories;


use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class PermissionsRepository
{
    public static function getByName(string $name, array $columns = ['*']): ?Permission
    {
        /** @var ?Permission $permission */
        $permission = Permission::query()
            ->where('name', $name)
            ->first($columns);

        return $permission;
    }

    public static function all(array $columns = ['*']): Collection
    {
        return Permission::query()
            ->get($columns);
    }
}

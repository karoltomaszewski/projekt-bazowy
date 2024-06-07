<?php


namespace Database\Seeders;


use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Repositories\PermissionsRepository;
use App\Repositories\RolesRepository;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        RolePermission::query()->insert([
            [
                'role_id' => RolesRepository::getByName('admin')->id,
                'permission_id' => PermissionsRepository::getByName('admin_tool_access')->id
            ]
        ]);
    }
}

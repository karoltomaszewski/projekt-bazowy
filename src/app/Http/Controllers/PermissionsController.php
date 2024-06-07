<?php

namespace App\Http\Controllers;

use App\Repositories\PermissionsRepository;
use App\Repositories\RolesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PermissionsController extends Controller
{
    public function index()
    {
        return Inertia::render('AdminTool/Permissions', [
            'roles' => RolesRepository::all(),
            'all_permissions' => PermissionsRepository::all()
        ]);
    }
}

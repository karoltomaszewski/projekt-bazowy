<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\RolesRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            /** @var User $user */
            $user = Auth::user();
            $permissions = $user->permissions()->pluck('name')->toArray();
            Session::put('permissions', $permissions);

            return new JsonResponse([], 200);
        }

        return new JsonResponse([
            'msg' => 'Błędne dane logowania.'
        ], 422);
    }

    public function index(): Response
    {
        return Inertia::render('Login');
    }

    public function showRegister(): Response
    {
        return Inertia::render('Register');
    }

    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => '',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => RolesRepository::getByName('employee')->id,
        ]);

        return new JsonResponse([], 201);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        session()->flush();

        return redirect(route('login'));
    }
}

<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate');
        // Seedowanie bazy danych
        $this->seed(DatabaseSeeder::class);
    }

    protected function loginAsFirstUser(): void
    {
        Auth::login(\App\Models\User::find(1));
    }
}

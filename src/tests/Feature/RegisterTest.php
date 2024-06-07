<?php


namespace Tests\Feature;


use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_register_page_as_guest(): void
    {
        $response = $this->get(route('showRegister'));

        $response->assertStatus(200);
    }

    public function test_empty_register(): void
    {
        $response = $this->postJson(route('register'), []);

        $response->assertStatus(422);
    }

    public function test_register_without_email(): void
    {
        $response = $this->postJson(route('register'), [
            'password' => 'Test123.',
            'password_confirmation' => 'Test123.'
        ]);

        $response->assertStatus(422);
    }

    public function test_register_without_passwords(): void
    {
        $response = $this->postJson(route('register'), [
            'email' => 'test@test.pl'
        ]);

        $response->assertStatus(422);
    }

    public function test_register_one_password(): void
    {
        $response = $this->postJson(route('register'), [
            'email' => 'test@test.pl',
            'password' => 'Test123.'
        ]);

        $response->assertStatus(422);
    }

    public function test_register_bad_email_password(): void
    {
        $response = $this->postJson(route('register'), [
            'email' => 'testtest.pl',
            'password' => 'Test123.',
            'password_confirmation' => 'Test123.'
        ]);

        $response->assertStatus(422);
    }

    public function test_register_weak_password(): void
    {
        $response = $this->postJson(route('register'), [
            'email' => 'test@test.pl',
            'password' => 'Test.',
            'password_confirmation' => 'Test.'
        ]);

        $response->assertStatus(422);
    }

    public function test_register_different_passwords(): void
    {
        $response = $this->postJson(route('register'), [
            'email' => 'test@test.pl',
            'password' => 'Test123.',
            'password_confirmation' => 'Test1234.',
        ]);

        $response->assertStatus(422);
    }

    public function test_register_correct_data(): void
    {
        $response = $this->postJson(route('register'), [
            'email' => 'test1@test.pl',
            'password' => 'Test123.',
            'password_confirmation' => 'Test123.'
        ]);

        $response->assertStatus(201);
    }

    public function test_register_page_as_authed_user(): void
    {
        $this->loginAsFirstUser();
        $response = $this->get(route('showRegister'));

        $response->assertStatus(302);
    }
}

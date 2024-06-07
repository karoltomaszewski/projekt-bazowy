<?php


namespace Tests\Feature;


use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_page_as_guest(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_empty_authentication(): void
    {
        $response = $this->postJson(route('authenticate'));

        $response->assertStatus(422);
    }

    public function test_authentication_without_email(): void
    {
        $response = $this->postJson(route('authenticate'), [
            'password' => 'test'
        ]);

        $response->assertStatus(422);
    }

    public function test_authentication_without_password(): void
    {
        $response = $this->postJson(route('authenticate'), [
            'email' => 'test'
        ]);

        $response->assertStatus(422);
    }

    public function test_wrong_credentials_authentication(): void
    {
        $response = $this->postJson(route('authenticate'), [
            'email' => 'notExisting@test.pl',
            'password' => 'test',
        ]);

        $response->assertStatus(422);
    }

    public function test_correct_credentials_authentication(): void
    {
        $response = $this->postJson(route('authenticate'), [
            'email' => 'test@test.pl',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }

    public function test_login_page_as_authed_user(): void
    {
        $this->loginAsFirstUser();

        $response = $this->get(route('login'));

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }
}

<?php


namespace Tests\Feature;


use Tests\TestCase;

class AdminToolTest extends TestCase
{
    public function test_admin_tool_page_as_guest(): void
    {
        $response = $this->get(route('admin'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}

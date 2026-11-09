<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_guest_is_redirected_to_login_when_opening_dashboard(): void
    {
        $this->get('/')->assertRedirect(route('login'));
    }

    public function test_guest_can_open_login_and_register_pages(): void
    {
        $this->get('/login')->assertOk();
        $this->get('/register')->assertOk();
    }
}

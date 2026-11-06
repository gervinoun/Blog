<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_see_home_dashboard_login_and_register_navigation(): void
    {
        $response = $this->get(route('home'));

        $this->assertSame(2, substr_count($response->getContent(), 'data-theme-selector'));

        $response->assertOk()
            ->assertSee('data-theme="cyberpunk"', false)
            ->assertSee('data-theme-selector', false)
            ->assertSee('value="cyberpunk"', false)
            ->assertSee(route('home', absolute: false))
            ->assertSee(route('dashboard', absolute: false))
            ->assertSee(route('login', absolute: false))
            ->assertSee(route('register', absolute: false))
            ->assertDontSee(route('profile.edit', absolute: false));
    }

    public function test_authenticated_users_see_dashboard_profile_and_logout_navigation(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $this->assertSame(2, substr_count($response->getContent(), 'data-theme-selector'));

        $response->assertOk()
            ->assertSee('data-theme="cyberpunk"', false)
            ->assertSee('data-theme-selector', false)
            ->assertSee(route('home', absolute: false))
            ->assertSee(route('dashboard', absolute: false))
            ->assertSee(route('profile.edit', absolute: false))
            ->assertSee(route('logout', absolute: false))
            ->assertDontSee(route('login', absolute: false))
            ->assertDontSee(route('register', absolute: false));
    }
}

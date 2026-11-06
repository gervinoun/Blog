<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_page_is_served_by_the_public_controller(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(__('Share and discover stories from the community.'));
    }

    public function test_buttons_demo_page_uses_the_main_layout(): void
    {
        $this->get(route('buttons'))
            ->assertOk()
            ->assertSee('class="btn btn-primary"', false)
            ->assertSee('hover:bg-blue-700', false)
            ->assertSee('active:bg-blue-800', false)
            ->assertSee('focus:ring-2', false)
            ->assertSee(__('Bootstrap primary'))
            ->assertSee(__('Tailwind primary'))
            ->assertSee(__('Home'))
            ->assertSee('data-theme-selector', false);
    }
}

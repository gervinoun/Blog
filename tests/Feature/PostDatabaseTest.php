<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PostDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_posts_migration_creates_expected_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('posts', [
            'id',
            'user_id',
            'title',
            'body',
            'created_at',
            'updated_at',
        ]));
    }

    public function test_post_factory_creates_a_post_with_an_author(): void
    {
        $post = Post::factory()->create();

        $this->assertNotEmpty($post->title);
        $this->assertNotEmpty($post->body);
        $this->assertTrue($post->user->exists);
        $this->assertSame($post->user_id, $post->user->id);
    }

    public function test_database_seeder_creates_one_thousand_posts_for_an_author(): void
    {
        $this->seed();

        $this->assertDatabaseCount('posts', 1000);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('posts', ['user_id' => 1]);
    }
}

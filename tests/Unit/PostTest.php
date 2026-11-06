<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function test_post_only_allows_known_attributes_for_mass_assignment(): void
    {
        $post = new Post;

        $post->fill([
            'title' => 'A sample title',
            'body' => 'Sample body',
            'user_id' => 1,
            'is_admin' => true,
        ]);

        $this->assertSame(['user_id', 'title', 'body'], $post->getFillable());
        $this->assertArrayNotHasKey('is_admin', $post->getAttributes());
    }
}

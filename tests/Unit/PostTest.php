<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Database\Eloquent\MassAssignmentException;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function test_post_attributes_are_not_mass_assignable_until_fields_are_defined(): void
    {
        $post = new Post;

        $this->assertSame(['*'], $post->getGuarded());

        $this->expectException(MassAssignmentException::class);
        $post->fill(['title' => 'Untrusted title']);
    }
}

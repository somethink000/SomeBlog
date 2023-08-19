<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BlogValidDataTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }


    public function testBlogIndex(): void
    {
        $notebook = Blog::factory()->count(50)->create();
        $response = $this->get(route('blog.index'));
        
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
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

    public function testBlogShow(): void
    {
        $blog = Blog::factory()->create();
        $response = $this->get(route('blog.show', $blog));
        
        $response->assertStatus(200);
    }


    public function testBlogCreate(): void
    {

        $blog = Blog::factory()->make();
        $response = $this->post(route('blog.store'), $blog->getAttributes())->assertCreated();
    }

    public function testBlogUpdate(): void
    {
        $blog = Blog::factory()->create();
        $response = $this->patch(route('blog.update', $blog->getKey()), $blog->getAttributes())->assertOk();
    }
}

<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkValidDataTest extends TestCase
{
    use RefreshDatabase;

    public function testLinkIndex(): void
    {
        Link::factory()->count(5)->create();
        $response = $this->get(route('link.index'));

        $response->assertStatus(200);
    }
    
    public function testLinkCreate(): void
    {

        $link = Link::factory()->make();
        $response = $this->post(route('link.store'), $link->getAttributes())->assertCreated();
    }

    public function testLinkDelete(): void
    {
        $link = Link::factory()->create();

        $response = $this->delete(route('link.destroy', $link->getKey()));
        $response->assertOk();
    }
}

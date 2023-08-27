<?php

namespace Tests\Feature;

use App\Models\Memeber;
use Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;


class MemeberValidDataTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        
    }


    public function testMemeberUpdate(): void
    {
        Storage::fake();

        $memeber = Memeber::factory()->create();
        $response = $this->patch(
            route('member.update', $memeber->getKey()),
            array_merge(
                [
                    'image' => UploadedFile::fake()->image('avatar.jpg')
                ],
                $memeber->getAttributes()
            )
        )
            ->assertOk();
            
    }

}

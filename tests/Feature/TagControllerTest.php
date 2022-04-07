<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    private Tag $tag;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route("tags.index"));
        $response->assertStatus(200);
    }

    public function testCreate(): void
    {
        $response = $this->get(route("tags.create"));
        $response->assertStatus(200);
    }

    public function testStore(): void
    {
        $factoryData = Tag::factory()->make()->toArray();
        $data = Arr::only($factoryData, ['name']);

        $response = $this->post(route('tags.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tags', $data);
    }

    public function testShow(): void
    {
        $response = $this->get(route("tags.show", ['tag' => $this->tag]));
        $response->assertStatus(200);
    }

    public function testEdit(): void
    {
        $response = $this->get(route('tags.edit', ['tag' => $this->tag]));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $link = Tag::factory()->create();
        $factoryData = Tag::factory()->make()->toArray();
        $data = Arr::only($factoryData, ['name']);
        $response = $this->patch(route('tags.update', ['tag' => $link]), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tags', $data);
    }

    public function testDestroy(): void
    {
        $tag = Tag::factory()->create();
        $response = $this->delete(route('tags.destroy', [$tag]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
    }
}

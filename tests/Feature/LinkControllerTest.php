<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
//    use RefreshDatabase;

    private $link;

    protected function setUp(): void
    {
        parent::setUp();
//        $this->refreshDatabase();
        $this->link = Link::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route("links.index"));
        $response->assertStatus(200);
    }

    public function testCreate(): void
    {
        $response = $this->get(route("links.create"));
        $response->assertStatus(200);
    }

    public function testStore(): void
    {
        $factoryData = Link::factory()->make()->toArray();
        $data = Arr::only($factoryData, ['long_link', 'title']);

        $response = $this->post(route('links.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('links', $data);
    }

    public function testShow(): void
    {
        $response = $this->get(route("links.show", ['link' => $this->link]));
        $response->assertStatus(200);
    }

    public function testEdit(): void
    {
        $response = $this->get(route('links.edit', ['link' => $this->link]));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $link = Link::factory()->create();
        $factoryData = Link::factory()->make()->toArray();
        $data = Arr::only($factoryData, ['long_link', 'title']);
        $response = $this->patch(route('links.update', ['link' => $link]), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('links', $data);
    }

    public function testDestroy(): void
    {
        $link = Link::factory()->create();
        $response = $this->delete(route('links.destroy', [$link]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('links', ['id' => $link->id]);
    }
}

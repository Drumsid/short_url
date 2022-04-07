<?php

namespace Tests\Feature;

use App\Http\Controllers\LinkStatisticController;
use App\Models\Link;
use App\Models\LinkStatistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class LinkRedirectControllerTest extends TestCase
{
    private $link;

    protected function setUp(): void
    {
        parent::setUp();
        $this->link = Link::factory()->create();
    }

    public function testRedirect(): void
    {
        $response = $this->get("/fakeShortLink");
        $response->assertSessionHasNoErrors();
        $response->assertRedirect("/");

        $response = $this->get($this->link->short_link);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect($this->link->long_link);
        $statistic = LinkStatistic::where("link_id", $this->link->id)->first()->toArray();
        $this->assertDatabaseHas('link_statistics', $statistic);
    }
}

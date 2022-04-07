<?php

namespace Tests\Feature;

use App\Http\Controllers\LinkStatisticController;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class LinkStatisticControllerTest extends TestCase
{
    private Link $link;

    protected function setUp(): void
    {
        parent::setUp();
        $this->link = Link::factory()->create();
    }

    public function testGetStatistic() : void
    {
        $statistic = New LinkStatisticController();
        $request = new Request();
        $statisticData = $statistic->getStatistic($request, $this->link);
        $this->assertIsArray($statisticData);
        $this->assertArrayHasKey("link_id", $statisticData);
        $this->assertEquals(3, count($statisticData));
    }
}

<?php

namespace Tests\Feature;

use App\Http\Controllers\GenerateShortLinkController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenerateShortLinkControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerateShortLink()
    {
        $generate = new GenerateShortLinkController();
        $shortLink1 = $generate->generateShortLink();
        $shortLink2 = $generate->generateShortLink();

        $this->assertNotNull($shortLink1);
        $this->assertNotNull($shortLink2);
        $this->assertNotEquals($shortLink1, $shortLink2);
        $this->assertEquals(10, strlen($shortLink1));
        $this->assertEquals(10, strlen($shortLink2));
    }
}

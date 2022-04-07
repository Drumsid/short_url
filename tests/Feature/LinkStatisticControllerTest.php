<?php

//namespace Tests\Feature;
//
//use App\Http\Controllers\LinkStatisticController;
//use App\Models\Link;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Http\Request;
//use Tests\TestCase;
//
//class LinkStatisticControllerTest extends TestCase
//{
//    private $link;
//
//    protected function setUp(): void
//    {
//        parent::setUp();
//        $this->link = Link::factory()->create();
//    }
//
//    public function testGetStatistic()
//    {
//        $test = New LinkStatisticController();
//        dd($test->getStatistic($this->get("/"), $this->link));
        // 1 пример
//        $stub = $this->createMock(Request::class);
//        $stub->method("server")->willReturn("test");
//        // dd($stub->server());
//        $this->assertSame('test', $stub->server());
//
//        //  2 пример
//        // пример стаба Link
//        $stub = $this->createMock(Link::class);
//        // метод должен реально существовать
//        $stub->method('sort')
//            ->willReturn('foo');
//        // Вызов $stub->sort() теперь вернёт 'foo'
//        $this->assertSame('foo', $stub->sort());
//    }
//}

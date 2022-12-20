<?php

namespace Tests\Feature;

use App\Services\GetDataService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JetBrains\PhpStorm\NoReturn;
use Tests\TestCase;

class TaskTest extends TestCase
{

    /**
      * @test
      **/
      #[NoReturn] final public function system_works (): void
      {
          $this->withoutExceptionHandling();
          $service = new GetDataService();
          $data = $service->getDataFromFile('test.json');
          $this->assertCount(2,$data);
          $this->assertIsArray($data);
          $this->assertEquals('test', $data[0]['name']);
      }
}

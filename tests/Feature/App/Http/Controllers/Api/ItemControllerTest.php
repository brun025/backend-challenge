<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use App\Http\Controllers\Api\ItemController;
use Core\UseCase\Category\ItemUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        $this->controller = new ItemController();

        parent::setUp();
    }

    public function test_index()
    {
        $useCase = new ItemUseCase();

        $response = $this->controller->index(new Request(), $useCase);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_OK, $response->status());
    }
}

<?php

namespace Tests\Feature\Api;

use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\Traits\WithoutMiddlewareTrait;

class ItemApiTest extends TestCase
{
    use WithoutMiddlewareTrait;

    protected $endpoint = '/api/items';

    public function test_list_all_items()
    {
        $response = $this->getJson($this->endpoint);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'items',
                'total',
                'current_page',
                'per_page',
            ],
        ]); 
    }

    public function test_list_paginate_items()
    {
        $response = $this->getJson("$this->endpoint?page=2");

        $response->assertStatus(200);
        $this->assertEquals(2, $response['data']['current_page']);
        $this->assertEquals(200, $response['data']['total']);
        $this->assertEquals(100, $response['data']['per_page']);
    }

}

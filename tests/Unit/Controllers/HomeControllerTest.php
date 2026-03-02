<?php

namespace Tests\Unit\Controllers;

use App\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view()
    {
        $controller = new HomeController();
        $response = $controller->index();
        $this->assertEquals('home', $response->name());
    }

    public function test_index_with_request_returns_view()
    {
        $request = new Request();
        $controller = new HomeController();
        $response = $controller->index($request);
        $this->assertEquals('home', $response->name());
    }

    public function test_edge_case_index_without_request()
    {
        $controller = new HomeController();
        $this->expectException(\TypeError::class);
        $controller->index(null);
    }
}
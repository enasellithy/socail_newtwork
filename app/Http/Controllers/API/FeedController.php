<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\SOLID\Services\PostService;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return $this->postService->get_friend_posts();
    }
}

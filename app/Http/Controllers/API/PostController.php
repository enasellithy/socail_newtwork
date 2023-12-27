<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Post\AddPostRequest;
use App\Models\Post;
use App\SOLID\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return $this->postService->get_my_post();
    }

    public function store(AddPostRequest $r)
    {
        return $this->postService->create($r->all());
    }

    public function show($id)
    {
        return $this->postService->show($id);
    }

    public function destroy($id)
    {
        return $this->postService->destroy($id);
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LikeRequest;
use App\SOLID\Services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    private $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function store(LikeRequest $r)
    {
        return $this->likeService->create($r->all());
    }
}

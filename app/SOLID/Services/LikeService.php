<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\LikeRepository;

class LikeService
{
    private $likeRepository;

    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function create($data)
    {
        return $this->likeRepository->create($data);
    }
}

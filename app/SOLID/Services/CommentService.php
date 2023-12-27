<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\CommentRepository;

class CommentService
{
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create($data)
    {
        return $this->commentRepository->create($data);
    }
}

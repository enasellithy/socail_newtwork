<?php

namespace App\SOLID\Repositories;

use App\SOLID\Traits\JsonTrait;

class CommentRepository
{
    use JsonTrait;

    public function create(array $data)
    {
        auth()->user()->comments()->create($data);
        return $this->whenDone('');
    }
}

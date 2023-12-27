<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\ShareRepository;

class ShareService
{
    private $shareRepository;

    public function __construct(ShareRepository $shareRepository)
    {
        $this->shareRepository = $shareRepository;
    }

    public function create($data)
    {
        return $this->shareRepository->create($data);
    }
}

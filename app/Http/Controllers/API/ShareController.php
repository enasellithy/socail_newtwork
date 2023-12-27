<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ShareRequest;
use App\SOLID\Services\ShareService;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    private $shareService;

    public function __construct(ShareService $shareService)
    {
        $this->shareService = $shareService;
    }

    public function store(ShareRequest $r)
    {
        return $this->shareService->create($r->all());
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Freind\AcceptFreindRequest;
use App\Http\Requests\API\Freind\SendFreindRequest;
use App\Http\Resources\API\FreindResource;
use App\Models\User;
use App\SOLID\Services\FreindService;
use Illuminate\Http\Request;

class FreindController extends Controller
{
    private $freindService;

    public function __construct(FreindService $freindService)
    {
        $this->freindService = $freindService;
    }

    public function get_friend_list()
    {
        return $this->freindService->get_friend_list();
    }

    public function send_friend_request(SendFreindRequest $r)
    {
        return $this->freindService->send_friend_request($r->id);
    }

    public function get_Friend_Requests()
    {
        return $this->freindService->get_Friend_Requests();
    }

    public function accept_friend_request(AcceptFreindRequest $r)
    {
        return $this->freindService->accept_friend_request($r->id);
    }

    public function deny_Friend_Request(Request $r)
    {
        return $this->freindService->deny_Friend_Request($r->id);
    }

    public function unfriend(Request $r)
    {
        return $this->freindService->unfriend($r->id);
    }
}

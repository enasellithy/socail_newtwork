<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\FreindRepository;

class FreindService
{
    private $freindRepository;

    public function __construct(FreindRepository $freindRepository)
    {
        $this->freindRepository = $freindRepository;
    }

    public function get_friend_list()
    {
        return $this->freindRepository->get_friend_list();
    }

    public function send_friend_request($data)
    {
        return $this->freindRepository->send_friend_request($data);
    }

    public function get_Friend_Requests()
    {
        return $this->freindRepository->get_Friend_Requests();
    }

    public function accept_friend_request($id)
    {
        return $this->freindRepository->accept_friend_request($id);
    }

    public function deny_Friend_Request($id)
    {
        return $this->freindRepository->deny_Friend_Request($id);
    }

    public function unfriend($id)
    {
        return $this->freindRepository->unfriend($id);
    }

    public function blockFriend($id)
    {
        return $this->freindRepository->blockFriend($id);
    }

    public function unblockFriend($id)
    {
        return $this->freindRepository->unblockFriend($id);
    }
}

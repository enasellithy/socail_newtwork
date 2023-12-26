<?php

namespace App\SOLID\Repositories;

use App\Http\Resources\API\FreindResource;
use App\Http\Resources\API\UserResource;
use App\Models\User;
use App\SOLID\Traits\JsonTrait;

class FreindRepository
{
    use JsonTrait;
    public function get_friend_list()
    {
        $user = auth()->user();
        $data['friend'] = $user->getFriends();
        return $this->whenDone($data);
    }

    public function send_friend_request($data)
    {
        $user = User::find($data);
        auth()->user()->befriend($user);
        return $this->whenDone('');
    }

    public function get_Friend_Requests()
    {
        $data['friend'] = FreindResource::collection(auth()->user()->getFriendRequests());
        return $this->whenDone($data);
    }

    public function accept_friend_request($id)
    {
        $user = User::find($id);
        auth()->user()->acceptFriendRequest($user);
        $data['friend'] = UserResource::collection(auth()->user()->getFriends());
        return $this->whenDone($data);
    }

    public function deny_Friend_Request($id)
    {
        $user = User::find($id);
        $user->denyFriendRequest(auth()->user());
        return $this->whenDone('');
    }

    public function unfriend($id)
    {
        auth()->user()->unfriend($id);
        return $this->whenDone('');
    }

    public function blockFriend($id)
    {
        auth()->user()->blockFriend($id);
        return $this->whenDone('');
    }

    public function unblockFriend($id)
    {
        auth()->user()->unblockFriend($id);
        return $this->whenDone('');
    }
}

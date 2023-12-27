<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\PostRepository;

class PostService
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function get_my_post()
    {
        return $this->postRepository->get_my_post();
    }

    public function get_friend_posts()
    {
        return $this->postRepository->get_friend_posts();
    }

    public function create($data)
    {
        return $this->postRepository->create($data);
    }

    public function show($id)
    {
        return $this->postRepository->show($id);
    }

    public function destroy($id)
    {
        return $this->postRepository->destroy($id);
    }
}

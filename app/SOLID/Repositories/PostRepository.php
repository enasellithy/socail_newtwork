<?php

namespace App\SOLID\Repositories;

use App\Http\Resources\API\PostResource;
use App\Models\Post;
use App\SOLID\Traits\JsonTrait;

class PostRepository
{
    use JsonTrait;
    public function get_my_post()
    {
        $res = PostResource::collection(Post::where('user_id',auth()->user()->id)
            ->with(['comments','like','share'])->paginate(10));
        $data['posts'] = $res->response()->getData();
        return $this->whenDone($data);
    }

    public function get_friend_posts()
    {
        $res = PostResource::collection(Post::whereIn('user_id', auth()->user()->getFriends()->pluck('id'))
            ->with(['comments','like','share'])->paginate(10));
        $data['posts'] = $res->response()->getData();
        return $this->whenDone($data);
    }

    public function show($id)
    {
        $data['posts'] = new PostResource(Post::find($id));
        return $this->whenDone($data);
    }

    public function create(array $data)
    {
        auth()->user()->posts()->create($data);
        return $this->whenDone('');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return $this->whenDone('');
    }
}

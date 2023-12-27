<?php

namespace App\SOLID\Repositories;

use App\Models\Like;
use App\SOLID\Traits\JsonTrait;

class LikeRepository
{
    use JsonTrait;

    public function create(array $data)
    {
        if(Like::where('user_id',auth()->user()->id)->where('post_id',$data['post_id'])->count() == 0){
            auth()->user()->like()->create($data);
        }
        else{
            Like::where('user_id',auth()->user()->id)->where('post_id',$data['post_id'])->delete();
        }
        return $this->whenDone('');
    }
}

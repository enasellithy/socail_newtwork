<?php

namespace App\SOLID\Repositories;

use App\Models\Share;
use App\SOLID\Traits\JsonTrait;

class ShareRepository
{
    use JsonTrait;

    public function create(array $data)
    {
        if(Share::where('user_id',auth()->user()->id)->where('post_id',$data['post_id'])->count() == 0){
            auth()->user()->share()->create($data);
        }
        else{
            Share::where('user_id',auth()->user()->id)->where('post_id',$data['post_id'])->delete();
        }
        return $this->whenDone('');
    }
}

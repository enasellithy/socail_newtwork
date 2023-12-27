<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'media' => !empty($this->media) ? asset($this->media) : '',
            'writer' => new UserResource($this->user),
            'comment_count' => $this->comments()->count(),
            'like_count' => $this->like()->count(),
            'share_count' => $this->share()->count(),
            'comments' => CommentResource::collection($this->comments),
            'like_list' => LikeResource::collection($this->like),
            'share_list' => ShareResource::collection($this->share),
        ];
    }
}

<?php

namespace App\Http\Resources\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreindResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'sender_id' => new UserResource(User::find($this->sender_id)),
            'recipient_id' => new UserResource(User::find($this->recipient_id)),
        ];
    }
}

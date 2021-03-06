<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'question_slug' => $this->question->slug,
            'reply' => $this->reply,
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at->diffForHumans(),
            'id' => $this->id,
            'liked' => !!$this->likes->where('user_id', auth()->id())->count(),
            'likes_count' => $this->likes->count(),
        ];
    }
}

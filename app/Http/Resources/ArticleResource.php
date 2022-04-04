<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'like_count' => $this->articleStatistic->like_count ?? 0,
            'view_count' => $this->articleStatistic->view_count ?? 0,            
            'created_at'   => $this->created_at,            
            'updated_at'   => $this->updated_at,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}

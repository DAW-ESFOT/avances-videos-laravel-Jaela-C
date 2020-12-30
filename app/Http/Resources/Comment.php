<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
            'id' => $this -> id,
            'text' => $this -> text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => "/api/users/".$this -> user_id,
            'articles' => "/api/articles/".$this -> article_id,
        ];
    }
}

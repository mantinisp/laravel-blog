<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
		    'id' => $this->id,
		    'title' => $this->title,
		    'description' => $this->description,
		    'image' => $this->image,
		    'public' => $this->public,
		    'created_at' => $this->created_at,
		    'updated_at' => $this->updated_at,
		    'user' => $this->user,
		    'path' => route('blog-show', $this->id),
		    'comments' => $this->blogComments,
	    ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            "post_id" => $this->id,
            "post_title" => $this->title,
            "featured_image" => asset($this->image),
            "description" => $this->description,
            "post_tags" => $this->meta_words,
            "short_description" => $this->meta_description,
            "total_views" => $this->views,
            "created_date" => $this->created_at,
        ];
    }
}

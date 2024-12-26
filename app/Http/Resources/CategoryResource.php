<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            //"data" is what they see as json -> is what we want to show them
            "id" => $this->id,
            "nepali_title" => $this->nep_title,
            "english_title" => $this->eng_title,
            "slug" => $this->slug,

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Album extends JsonResource
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
            'url'            => $this->url,
            'thumbnail'      => $this->thumbnail,
            'category'       => $this->category,
            'published_date' => $this->published_date,
            'photo_count'    => $this->photos->count(),
            'title'          => $this->name,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Gallery extends JsonResource
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
            'thumbnail'      => ($this->type == 'photo') ? $this->thumbnail : '',
            'category'       => $this->type,
            'published_date' => $this->published_date,
            'view_count'     => $this->view_count,
            'title'          => $this->title,
            'title_limit'    => $this->title_limit,
            'youtube_id'     => ($this->type == 'video') ? $this->youtube_id : 0,
            'duration'       => ($this->type == 'video') ? $this->duration : 0,
        ];
    }
}

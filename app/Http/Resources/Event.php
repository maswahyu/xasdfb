<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'url'       => '#',
            'title'     => $this->title,
            'thumbnail' => imageview($this->image),
            'date'      => $this->created_at->format('j M Y'),
            'summary'   => $this->summary,
        ];
    }
}

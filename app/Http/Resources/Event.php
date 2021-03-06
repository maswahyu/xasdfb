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
            'url'        => '#',
            'title'      => $this->title,
            'thumbnail'  => imageview($this->image),
            'date'       => $this->start_at_c,
            'summary'    => $this->summary,
            'start_at_j' => $this->start_at_j,
            'start_at_m' => $this->start_at_m,
        ];
    }
}

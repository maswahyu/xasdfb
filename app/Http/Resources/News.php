<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
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
            'category'       => $this->category_name,
            'category_url'   => $this->category ? $this->category->url : '/lifestyle',
            'published_date' => $this->published_date,
            'view_count'     => $this->view_count,
            'title'          => $this->title,
            'summary'        => $this->summary
        ];
    }
}

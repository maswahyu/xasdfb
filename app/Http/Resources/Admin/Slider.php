<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Slider extends JsonResource
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
            'title'    => $this->title,
            'image'    => '<a href="'. $this->url .'" target="_blank"><img src="'. imagethumb($this->image) .'" width="200"></a>',
            'mobile_image' => '<a href="'. $this->url .'" target="_blank"><img src="'. imagethumb($this->mobile_image) .'" width="200"></a>',
            'publish'  => $this->publish_badge,
            'featured' => $this->featured_badge,
            'action'   => '<a class="btn btn-info btn-sm" href="'. url('/magic/slide/' . $this->id) .'" title="View slide"><i class="fa fa-eye"></i> View</a> | <a class="btn btn-primary btn-sm" href="'. url('/magic/slide/' . $this->id . '/edit') .'" title="Edit slide"><i class="fa fa-edit"></i> Edit</a>',
        ];
    }
}

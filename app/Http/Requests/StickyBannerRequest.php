<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StickyBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'image' => 'required',
            'cta' => 'nullable|url',
            'pub_day' => 'required',
            'page' => 'required|max:100',
            'status' => 'nullable|boolean',
            'periode_start' => 'nullable|required_with:periode_end',
            'periode_end' => 'nullable|required_with:periode_start',
        ];
    }
}

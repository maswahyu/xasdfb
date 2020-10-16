<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStreamRequest extends FormRequest
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
            'name' => 'required|string|max:200',
            'slug' => 'required|string|max:200',
            'yt_link' => 'required|url',
            'live_chat' => 'nullable|boolean',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'publish' => 'nullable|boolean',
            'event_date' => 'required',

        ];
    }
}

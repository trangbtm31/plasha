<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'place_name'        => 'required|max:50',
            'place_description' => 'required',
            'place_category'    => 'required',
            'place_thumbnail.*' => 'image|max:2048',
            'place_name'        => 'required|max:50',
            'place_address'    => 'required',
            'place_thumbnail'  => 'image|max:2048',
            'place_time_start' => 'required',
            'place_time_end'   => 'required',
            'place_cost'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'thumbnail' => 'Thumbnail must be an image and not be greater than 2048 kilobytes.'
        ];
    }
}

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
            'name'        => 'required|max:100',
            'address'     => 'required|max:100',
            'description' => 'required',
            'thumbnail.*' => 'image|max:2048',
            'thumbnail'   => 'image|max:2048',
            'time_open'   => 'required',
            'time_close'  => 'required',
            'time_stay'   => 'required',
            'cost'        => 'required',
            'star'        => 'integer',
            'category_id' => 'required|max:30'
        ];
    }

    public function messages()
    {
        return [
            'thumbnail' => 'Thumbnail must be an image and not be greater than 2048 kilobytes.'
        ];
    }
}

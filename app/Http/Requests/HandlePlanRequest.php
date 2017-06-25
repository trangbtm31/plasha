<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandlePlanRequest extends FormRequest
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
            'place_description' => 'required',
            'place_category'    => 'required',
            'place_name'        => 'required|max:50',
            'place_address'    => 'required',
            'place_thumbnail.*'  => 'image|max:2048',
            'place_cost'       => 'required',
            'total_cost'       => ''
        ];
    }

    public function messages()
    {
        return [
            'thumbnail' => 'Thumbnail must be an image and not be greater than 2048 kilobytes.'
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChannelFormRequest extends FormRequest
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
        //add request for category fields
        $rules = [
            'category_id' => [
                'required',
                'integer',
            ],

            'name' => [
                'required',
                'string',
            ],

            'title' => [
                'nullable',
                'string',
            ],
            'video_link_type' => [
                'required',
            ],
            'video_link' => [
                'required',
            ],

            'is_favorite' => [
                'nullable',
                'boolean',
            ],

            'is_popular' => [
                'nullable',
                'boolean',
            ],

            'in_slider' => [
                'nullable',
                'boolean',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

            'like' => [
                'nullable',
            ],

            'view' => [
                'nullable',
            ],

            'image' => [
                'required',
                'mimes:jpeg,jpg,png',
            ],
        ];
        return $rules;
    }
}

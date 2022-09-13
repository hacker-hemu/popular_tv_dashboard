<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
            ],

            'description' => [
                'nullable',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
            ],
        ];
        return $rules;
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdFormRequest extends FormRequest
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

            'call_number' => [
                'numeric',
                'nullable',
                'min:10'
            ],

            'go_link' => [
                'required',
                'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'
            ],

            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
            ],

            'created_by' => [
                'nullable',
                'boolean',
            ],

        ];
        return $rules;
    }

}

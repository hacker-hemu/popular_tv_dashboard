<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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

            'email' => [
                'required',
                'string',
            ],

            'password' => [
            ],

            'role_as' => [
                'boolean',
            ],

        ];
        return $rules;
    }
}

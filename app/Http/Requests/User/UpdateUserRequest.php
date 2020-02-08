<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'nhap id vao thim',
            'name.required' => 'nhap name vao thim',
            'name.max' => 'nhap name duoi 255 vao thim',
        ];
    }
}

<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'nhap title vao thim',
            'description.required' => 'nhap description vao thim',
            'title.max' => 'nhap title duoi 255  thim',
            'description.max' => 'nhap description duoi 255 thim',
        ];
    }
}

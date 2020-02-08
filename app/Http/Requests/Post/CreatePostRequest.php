<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'nhap title vao thim',
            'description.required' => 'nhap description vao thim',
            'content.required' => 'nhap content vao thim',
            'category_id.required' => 'select category di thim',
            'title.max' => 'nhap title duoi 255  thim',
            'description.max' => 'nhap description duoi 255 thim',
        ];
    }
}

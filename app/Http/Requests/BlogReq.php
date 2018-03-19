<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogReq extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required|max:250',
            'meta_title' => 'max:65500',
            'meta_keywords' => 'max:65500',
            'meta_description' => 'max:65500',
            'image' => 'image|max:2048',
            'video' => 'max:240',
            'content' => 'required|max:65500'
        ];
    }
}

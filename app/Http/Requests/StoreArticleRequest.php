<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.min' => '标题至少为6个字符',
            'body.required' => '填写的内容不能为空',
            'body.min' => '填写的内容至少为10个字符',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:6|max:196',
            'body' => 'required|min:10',
        ];
    }
}

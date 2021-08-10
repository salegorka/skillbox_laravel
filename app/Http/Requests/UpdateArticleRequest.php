<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
            'slug' => ['required', 'regex:/^[a-zA-Z0-9_-]+$/i', Rule::unique('articles')->ignore($this->route('article')->slug, 'slug')],
            'name' => 'required|min:5|max:255',
            'short-description' => 'required|max:255',
            'description' => 'required',
            'published' => [],
        ];
    }
}

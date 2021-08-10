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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => ['required', 'regex:/^[a-zA-Z0-9_-]+$/i', 'unique:articles'],
            'name' => 'required|min:5|max:255',
            'short-description' => 'required|max:255',
            'description' => 'required',
            'published' => [],
        ];
    }
}

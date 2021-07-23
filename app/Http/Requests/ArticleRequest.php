<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Article;

class ArticleRequest extends FormRequest
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
            'slug' => ['required', 'regex:/^[a-zA-Z0-9_-]+$/i'],
            'name' => 'required|min:5|max:255',
            'short-description' => 'required|max:255',
            'description' => 'required',
            'published' => []
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->checkArticleUnique()) {
                $validator->errors()->add('slug', 'Поле символьный код должно быть уникальным!');
            }
        });
    }

    public function checkArticleUnique()
    {
        $article = $this->route('article');
        if ((isset($article)) && (request('slug') == $article->slug)) {
            return true;
        } else {
            $existArticle = Article::where('slug', '=', request('slug'))->get();
            return $existArticle->isEmpty();
        }
    }
}

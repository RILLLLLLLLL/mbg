<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'category_id' => 'required|exists:categories,id',

            'title' => 'required|max:255|unique:articles,title',

            'content' => 'required',

            'status' => 'required|in:draft,published',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}

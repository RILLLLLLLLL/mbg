<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleApiRequest extends FormRequest
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

                    'category_id' => ['required', 'exists:categories,id'],

                    'title' => ['required', 'max:255'],

                    'content' => ['required'],

                    'excerpt' => ['nullable'],

                    'thumbnail' => ['nullable', 'image', 'max:2048'],

                    'status' => ['required', 'in:draft,published'],

                ];
    }
}

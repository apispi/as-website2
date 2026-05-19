<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'slug'         => ['nullable', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($this->route('post')->id ?? null)],
            'excerpt'      => ['nullable', 'string'],
            'content'      => ['nullable', 'string'],
            'category'     => ['nullable', 'string', 'max:100'],
            'status'       => ['required', 'in:draft,publish'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}

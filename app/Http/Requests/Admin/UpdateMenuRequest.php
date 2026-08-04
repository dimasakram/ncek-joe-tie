<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:150', Rule::unique('menus', 'slug')->ignore($this->route('menu'))],
            'description' => ['nullable', 'string'],
            'composition' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
            'is_best_seller' => ['nullable', 'boolean'],
            'is_new' => ['nullable', 'boolean'],
            'is_available' => ['nullable', 'boolean'],
        ];
    }
}

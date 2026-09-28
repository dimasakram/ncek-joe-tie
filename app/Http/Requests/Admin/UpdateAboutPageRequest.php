<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'history' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'core_values' => ['nullable', 'string'],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
            'coffee_sourcing_title' => ['nullable', 'string', 'max:150'],
            'coffee_sourcing_description' => ['nullable', 'string'],
            'coffee_sourcing_image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
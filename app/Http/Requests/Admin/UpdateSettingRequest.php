<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'site_name' => ['required', 'string', 'max:150'],
            'site_tagline' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:180'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'favicon' => ['nullable', 'image', 'max:1024'],
            'og_image' => ['nullable', 'image', 'max:2048'],
            'primary_color' => ['nullable', 'string', 'max:20'],
        ];
    }
}

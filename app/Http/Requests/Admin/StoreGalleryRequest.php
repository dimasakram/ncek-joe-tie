<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'image' => [$this->isMethod('post') && !$this->route('galeri') ? 'required' : 'nullable', 'image', 'max:2048'],
            'category' => ['required', 'in:makanan,interior,event'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}

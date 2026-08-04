<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminUserRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($this->route('admin'))],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', 'in:admin,super_admin'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:20'],
            'guests' => ['required', 'integer', 'min:1', 'max:50'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required'],
            'notes' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.after_or_equal' => 'Tanggal reservasi tidak boleh sebelum hari ini.',
        ];
    }
}

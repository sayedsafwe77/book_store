<?php

namespace App\Http\Requests\FlashSale;

use Illuminate\Foundation\Http\FormRequest;

class CreateFlashSaleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name.en' => ['nullable', 'string', 'min:5', 'max:255'],
            'name.ar' => ['nullable', 'string', 'min:5', 'max:255'],
            'description.en' => ['nullable', 'string', 'min:5', 'max:255'],
            'description.ar' => ['nullable', 'string', 'min:5', 'max:255'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'integer', 'min:1', 'max:720'], // 30 days
            'is_active' => ['required', 'boolean'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOtpRequest extends FormRequest
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
            'email'  => ['required', 'email'],
            'code1'  => ['required', 'digits:1'],
            'code2'  => ['required', 'digits:1'],
            'code3'  => ['required', 'digits:1'],
            'code4'  => ['required', 'digits:1'],
        ];
    }
}

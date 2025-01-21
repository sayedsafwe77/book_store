<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name' => ['required','string','min:5','max:100'],
            'email' => ['required','email','max:255','unique:admins,email,'.$this->route('admin')],
            'password' => ['nullable','min:6','max:100','confirmed'],
            'image' => ['nullable'],
            'type' => ['required','in:super-admin,content-management']      
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => ['required','min:5','max:100','string'],
            'email' => ['required','email','max:255','unique:admins,email,'],
            'password' => ['required','min:6','max:255'],
            'type' => ['required','in:super-admin,content-management'],
            'image' => ['required','image','max:3000']
        ];
    }
}

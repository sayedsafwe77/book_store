<?php

namespace App\Imports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Hash;

class AdminImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Admin([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']), // Hash the password
            'type' => $row['type'],
        ]);
    }

    /**
     * Validation rules for the Excel columns.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
            'type' => 'required|in:super-admin,content-management',
        ];
    }

    
}
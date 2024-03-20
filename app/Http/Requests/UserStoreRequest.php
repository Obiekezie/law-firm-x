<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'phone' => 'required|unique:users',
            'address' => 'required',
            'sex' => 'required',
            'dateOfBirth' => 'required',
            'primaryLegalCounsel' => 'required',
            'case_details' => 'required',
    
            // 'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif',
            // Add other validation rules as needed
        ];
    }
}

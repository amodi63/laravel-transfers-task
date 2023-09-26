<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
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
        if (request()->route()->getName() == 'api.merchant.register') {
            return [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'account_number' => 'required|numeric|unique:merchants,account_number',
                'email' => 'required|email|unique:merchants,email',
                'phone_number' => 'required|numeric|unique:merchants,phone_number',
                'password' => 'required|string|min:8|confirmed',
                'blance' => 'required|numeric',
                'address' => 'nullable|string',
            ];
        } else{
            return [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'id_no' => 'required|numeric|unique:users,id_no',
                'email' => 'required|email|unique:users,email',
                'phone_number' => 'required|numeric|unique:users,phone_number',
                'password' => 'required|string|min:8|confirmed',
            ];
        }
        
    }
}

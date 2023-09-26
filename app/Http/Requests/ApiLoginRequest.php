<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiLoginRequest extends FormRequest
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
        if (request()->route()->getName() == 'api.merchant.login') {
            return [
                'email' => 'required_without_all:phone_number,id_no|email',
                'phone_number' => 'required_without_all:email,id_no|numeric',
                'id_no' => 'required_without_all:email,phone_number|numeric',
                'password' => 'required|string',
            ];
        } else {
            return [
                'email' => 'required_without_all:phone_number,id_no|email',
                'phone_number' => 'required_without_all:email,id_no|numeric',
                'password' => 'required|string',
            ];
        }
       
    }
}

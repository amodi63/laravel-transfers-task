<?php

namespace App\Actions\Fortify;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): Model
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:50', 'min:10', 'unique:merchants,phone_number'],
            'address' => ['nullable', 'string', 'max:150'],
            'account_number' => ['required', 'string', 'max:50', 'unique:merchants,account_number', 'min:12', 'max:12'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Merchant::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return Merchant::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone_number' => $input['phone_number'],
            'address' => $input['address'],
            'email' => $input['email'],
            'account_number' => $input['account_number'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

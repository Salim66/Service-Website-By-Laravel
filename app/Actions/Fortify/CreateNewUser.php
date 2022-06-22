<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'position' => 'required',
            'company_name' => 'required',
            'official_email' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => 'required',
            'date_of_birth' => 'required',
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'position' => $input['position'],
            'company_name' => $input['company_name'],
            'official_email' => $input['official_email'],
            'email' => $input['email'],
            'number' => $input['number'],
            'date_of_birth' => $input['date_of_birth'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

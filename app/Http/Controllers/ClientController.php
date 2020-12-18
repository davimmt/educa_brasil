<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Traits\StringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use StringTrait;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'age'              => ['nullable', 'integer', 'digits_between:1,2'],
            'phone'            => ['nullable', 'string', 'min:15', 'max:15', 'unique:clients'],
            'scholarity_level' => ['required', 'integer', 'digits:1']
        ]);
    }

    /**
     * Create a new client instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        Client::create([
            'name'             => $data['name'],
            'email'            => $data['email'],
            'phone'            => $data['phone'],
            'age'              => $data['age'],
            'scholarity_level' => $data['scholarity_level']
        ]);

        return redirect('cadastro')->with('success', 'Cadastro completo!');
    }
}

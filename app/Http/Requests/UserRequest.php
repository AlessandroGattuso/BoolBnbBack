<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['nullable','max:255'],
			'cognome' => ['nullable', 'max:255'],
			'data_di_nascita' => ['nullable','date', 'before:-13 years', 'after:1899-12-31'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
	{
		return [
            'data_di_nascita.after' => 'La data di nascita deve essere successiva al 31-12-1899',
            'data_di_nascita.before' => 'La data di nascita deve essere anteriore ai -13 anni',
            'email.required' => 'Email obbligatoria',
            'email.email' => 'L\'e-mail deve essere un indirizzo e-mail valido',
            'email.unique' => 'L\'e-mail è già stata presa',
            'password.required' => 'Password obbligatoria',
            'password.confirmed' => 'La conferma della password non corrisponde',
		];
	}
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
			'contenuto' => ['required'],
			'nome' => ['required', 'max: 30'],
			'cognome' => ['required', 'max: 40'],
			'email' => ['required', 'max: 50']
		];
	}

	public function messages()
	{
		return [
			'contenuto.required' => 'Non hai inserito alcun messaggio',
			'nome.required' => 'Non hai inserito il nome',
			'nome.max' => 'La lunghezza del nome deve essere di massimo :max caratteri',
			'cognome.required' => 'Non hai inserito il cognome',
			'cognome.max' => 'La lunghezza del cognome deve essere di massimo :max caratteri',
			'email.required' => 'Non hai inserito l\'email',
			'email.max' => 'La lunghezza dell\' email deve essere di massimo :max caratteri'
		];
	}
}

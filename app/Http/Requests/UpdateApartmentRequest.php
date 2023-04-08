<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'descrizione'      => ['required', 'string', 'max:300'],
            'numero_di_stanze' => ['required', 'numeric', 'min:1', 'max:65533'],
            'numero_di_bagni'  => ['required', 'numeric', 'min:1', 'max:254'],
            'numero_di_letti'  => ['required', 'numeric', 'min:1', 'max:200'],
            'metri_quadri'     => ['required', 'numeric', 'min:1', 'max:65533'],
            'prezzo'           => ['required', 'numeric', 'min:1'],
            'visible'          => ['nullable'],
            'cover'            => ['nullable','image'],
            'services'         => ['exists:services,id','required'],
            'indirizzo'        => ['required','string', 'min:1', 'max:255'],
			'N_civico'         => ['required','numeric', 'max:255'],
			'città'            => ['required','string', 'max:50'],
			'Nazione'          => ['required', 'string', 'max:20'],
            'user_id'          => ['exists:users,id']
        ];
    }

    public function messages()
	{
		return [
			'required'      =>'Questo campo è obbligatorio',
            'max'           => 'Questo campo non deve superare di :max',
            'min'           => 'Questo campo deve essere almeno di :min',
		];
	}
}

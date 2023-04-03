<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
            'numero_di_stanze' => ['required','numeric', 'max:65533'],
            'numero_di_bagni'  => ['required','numeric', 'max:254'],
            'numero_di_letti'  => ['required','numeric','max:200'],
            'metri_quadri'     => ['required','numeric', 'max:65533'],
            'prezzo'           => ['required','numeric'],
            'cover'            => ['nullable', 'image'],
            'visible'          => ['nullable'],
            'services'         => ['exists:services,id','required'],
            'indirizzo'        => ['required','string', 'max:255'],
			'N_civico'         => ['required','numeric', 'max:255'],
			'città'            => ['required','string', 'max:50'],
			'Nazione'          => ['required', 'string', 'max:20'],
            'user_id'          => ['exists:users,id'],
        ];
    }

    public function messages()
	{
		return [
			'descrizione.required'      =>'Non hai inserito una descrizione',
            'numero_di_stanze.required' =>'Non hai inserito il numero di stanze',
            'numero_di_bagni.required'  =>'Non hai inserito il numero di bagni',
            'numero_di_letti.required'  =>'Non hai inserito il numero di letti',
            'metri_quadri.required'     =>'Non hai inserito il numero di Metri quadrati',
            'prezzo.required'           =>'Non hai inserito il prezzo',
            'services.required'         => 'Devi inserire almeno un servizio',
            'indirizzo.required'        => 'Devi inserire un indirizzo',
            'N_civico.required'         => 'Devi inserire un numero civico',
            'città.required'            => 'Devi inserire una città',
            'Nazione.required'          => 'Devi inserire una nazione'
		];
	}
}

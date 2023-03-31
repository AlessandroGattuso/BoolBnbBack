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
            'descrizione'      => ['nullable', 'string', 'max:300'],
            'numero_di_stanze' => ['required', 'max:65533'],
            'numero_di_bagni'  => ['required', 'max:254'],
            'metri_quadri'     => ['required', 'max:65533'],
            'prezzo'           => ['nullable'],
            'visible'          => ['nullable'],
            'cover'            => ['nullable','image'],
            'services'         => ['exists:services,id'],
            'indirizzo'        => ['required','string', 'max:255'],
			'N_civico'         => ['required','numeric', 'max:255'],
			'città'            => ['required','string', 'max:50'],
			'Nazione'          => ['required', 'string', 'max:20'],
            'user_id'          => ['exists:users,id']
        ];
    }
}

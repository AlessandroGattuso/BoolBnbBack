<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
            'indirizzo' => ['required','string', 'max:255'],
			'N_civico' => ['required','numeric', 'max:255'],
			'città' => ['required','string', 'max:50'],
			'Nazione' => ['required', 'string', 'max:20'],
        ];
    }
}

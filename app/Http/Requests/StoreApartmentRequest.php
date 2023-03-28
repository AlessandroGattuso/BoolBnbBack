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
            'descrizione' => ['string','max: 50'],
            'slug' => ['string','max: 60'],
            'numero_di_stanze' => ['numeric','max: 65000'],
            'metri_quadri' => ['numeric','max: 65000'],
            'numero_di_bagni' => ['numeric','max: 255'],
            'cover' => ['string'],
            'visible' => ['boolean'],
            'prezzo' => ['decimal']
        ];
    }
}

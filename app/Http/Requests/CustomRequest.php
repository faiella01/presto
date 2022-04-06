<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class CustomRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required | max:20',
            'price' => 'required',
            'body' => 'required | max:500',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il nome del prodotto è richiesto',
            'title.max' => 'Il titolo non deve superare i 20 caratteri',
            'price.required' => 'Il prezzo è richiesto',
            'body.required' => 'La descrizione del prodotto è necessaria',
            'body.max' => 'La descrizione del prodotto non deve superare i 500 caratteri',
        ];
    }
}

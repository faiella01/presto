<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequestMail extends FormRequest
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
            'name' => 'required',
            'email' => 'required | email:rfc',
            'message' => 'required | max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è richiesto',
            'email.required' => 'La mail è richiesta',
            'message.required' => 'Il messaggio è obbligatorio',
            'message.max' => 'Il messaggio non deve superare i 500 caratteri',
            'email.email' => 'La mail deve essere valida'
        ];
    }
}

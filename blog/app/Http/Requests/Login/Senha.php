<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VerificaEmail;
class Senha extends FormRequest
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
            'email'=>['required','email']
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'O campo não pode estar vazio.',
            'email.email'=>'Este não e um email valido.',
        ];
    }
}

<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class Validacao extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'O campo não pode estar vazio.',
            'email.email'=>'Este não e um email valido.',
            'password.required'=>'O campo não pode estar vazio.',
            'password.min'=>'O campo não pode conter mais de 6 caracteres.',
            'password.max'=>'O campo não pode conter mais de 20 caracteres.',
        ];
    }
}

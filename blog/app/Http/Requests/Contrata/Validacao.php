<?php

namespace App\Http\Requests\Contrata;

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
            'nome' => 'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ ]*$/',
            'email'=>'required|email',
            'telefone'=>'required|max:16', 
            'servico'=>'required|max:225', 
        ];
    }
    public function messages()
    {
        return[
            'nome.required'=>'O campo não pode estar vazio.',
            'nome.max'=>'O campo não pode conter mais de 70 caracteres.',
            'nome.regex'=>'O campo nome social tem um formato inválido.',
            'email.required'=>'O campo não pode estar vazio.',
            'email.email'=>'Este não e um email valido.',
            'telefone.required'=>'O campo não pode estar vazio.',
            'telefone.max'=>'O campo não pode conter mais de 16 caracteres.',
            'servico.required'=>'O campo não pode estar vazio.',
            'servico.max'=>'O campo não pode conter mais de 255 caracteres.',
        ];
    }
}

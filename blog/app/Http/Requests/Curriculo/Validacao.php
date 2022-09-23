<?php

namespace App\Http\Requests\Curriculo;

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
            'psnascimento'=>'required|max:8',
            'pstitulopro' => 'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ ]*$/',

        ];
    }
    public function messages()
    {
        return [
            'nome.required'=>'O campo não pode estar vazio.',
            'nome.max'=>'O campo não pode conter mais de 70 caracteres.',
            'nome.regex'=>'O campo nome social tem um formato inválido.',
            'pstitulopro.required'=>'O campo não pode estar vazio.',
            'pstitulopro.max'=>'O campo não pode conter mais de 70 caracteres.',
            'pstitulopro.regex'=>'O campo nome social tem um formato inválido.',
            'email.required'=>'O campo não pode estar vazio.',
            'email.email'=>'Este não e um email valido.',
            'psnascimento.required'=>'O campo não pode estar vazio.',
            'psnascimento.max'=>'O campo não pode conter mais de 8 caracteres.',
        ];
    }
}

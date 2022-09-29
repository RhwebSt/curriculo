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
            'name' => 'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ ]*$/',
            'email'=>'required|email',
            'psnascimento'=>'required|max:8',
            'pstitulopro' => 'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ ]*$/',
            'psfoto'=>'required', 
            'pssexo'=>'required|max:5|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ ]*$/', 
            'pstelefone'=>'required|max:16', 
            'escep'=>'required|max:16|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'esrua'=>'required|max:50|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'esnumero'=>'required|max:10|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'esbairro'=>'required:max:40|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'escidade'=>'required|max:30|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'esuf'=>'required|max:2|uf', 
            'pssobrevoce'=>'required|max:225', 
            'pscargo'=>'required|max:40', 
            'psdatainicio'=>'required|date_format:Y-m-d|max:10', 
            'psdatafinal'=>'required|date_format:Y-m-d|max:10', 
            'psexperiencia'=>'required|max:255|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'isidioma'=>'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'isnivel'=>'required|max:20|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'isdatainicio'=>'required|date_format:Y-m-d|max:10', 
            'isdatafinal'=>'required|date_format:Y-m-d|max:10', 
            'aslocal'=>'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'ascurso'=>'required|max:70|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 
            'asdatainicio'=>'required|date_format:Y-m-d|max:10', 
            'asdataconclusao'=>'required|date_format:Y-m-d|max:10', 
            'hshabilidade'=>'required|max:255|regex:/^[A-ZÀÁÂÃÇÉÈÊËÎÍÏÔÓÕÛÙÚÜŸÑÆŒa-zàáâãçéèêëîíïôóõûùúüÿñæœ 0-9_\-().]*$/', 

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'O campo não pode estar vazio.',
            'name.max'=>'O campo não pode conter mais de 70 caracteres.',
            'name.regex'=>'O campo nome social tem um formato inválido.',
            'pstitulopro.required'=>'O campo não pode estar vazio.',
            'pstitulopro.max'=>'O campo não pode conter mais de 70 caracteres.',
            'pstitulopro.regex'=>'O campo nome social tem um formato inválido.',
            'email.required'=>'O campo não pode estar vazio.',
            'email.email'=>'Este não e um email valido.',
            'psnascimento.required'=>'O campo não pode estar vazio.',
            'psnascimento.max'=>'O campo não pode conter mais de 8 caracteres.',
            'psfoto.required'=>'O campo não pode estar vazio.', 
            'pssexo.required'=>'O campo não pode estar vazio.',
            'pssexo.max'=>'O campo não pode conter mais de 5 caracteres.',
            'pssexo.regex'=>'O campo nome sexo tem um formato inválido.',
            'pstelefone.required'=>'O campo não pode estar vazio.',
            'pstelefone.max'=>'O campo não pode conter mais de 16 caracteres.',
            'escep.required'=>'O campo não pode estar vazio.',
            'escep.max'=>'O campo não pode conter mais de 16 caracteres.',
            'escep.regex'=>'O campo nome social possui um formato inválido.',
            
            'esrua.required'=>'O campo não pode estar vazio.',
            'esrua.max'=>'O campo não pode conter mais de 50 caracteres.',
            'esrua.regex'=>'O campo nome social possui um formato inválido.',
            
            'esnumero.required'=>'O campo não pode estar vazio.',
            'esnumero.max'=>'O campo não pode conter mais de 10 caracteres.',
            'esnumero.regex'=>'O campo nome social possui um formato inválido.',
            
            'esbairro.required'=>'O campo não pode estar vazio.',
            'esbairro.max'=>'O campo não pode conter mais de 10 caracteres.',
            'esbairro.regex'=>'O campo nome social possui um formato inválido.',
            
            'escidade.required'=>'O campo não pode estar vazio.',
            'escidade.max'=>'O campo não pode conter mais de 10 caracteres.',
            'escidade.regex'=>'O campo nome social possui um formato inválido.',
            
            'esuf.required'=>'O campo não pode estar vazio.',
            'esuf.max'=>'O campo não pode conter mais de 10 caracteres.',
            'esuf.regex'=>'O campo nome social possui um formato inválido.',

            'pssobrevoce.required'=>'O campo não pode estar vazio.',
            'pssobrevoce.max'=>'O campo não pode conter mais de 255 caracteres.',

            'pscargo.required'=>'O campo não pode estar vazio.',
            'pscargo.max'=>'O campo não pode conter mais de 40 caracteres.',


            'psdatainicio.required'=>'O campo não pode estar vazio.',
            'psdatainicio.max'=>'O campo não pode conter mais de 10 caracteres.',
            'psdatainicio.date_format'=>'O campo nome data inicial possui um formato inválido.',

            'psdatafinal.required'=>'O campo não pode estar vazio.',
            'psdatafinal.max'=>'O campo não pode conter mais de 10 caracteres.',
            'psdatafinal.date_format'=>'O campo nome data final possui um formato inválido.',
            
            'psexperiencia.required'=>'O campo não pode estar vazio.',
            'psexperiencia.max'=>'O campo não pode conter mais de 255 caracteres.',
            'psexperiencia.regex'=>'O campo nome experiência possui um formato inválido.',

            'isidioma.required'=>'O campo não pode estar vazio.',
            'isidioma.max'=>'O campo não pode conter mais de 70 caracteres.',
            'isidioma.regex'=>'O campo nome idioma possui um formato inválido.',


            'isnivel.required'=>'O campo não pode estar vazio.',
            'isnivel.max'=>'O campo não pode conter mais de 20 caracteres.',
            'isnivel.regex'=>'O campo nome nivel possui um formato inválido.',

            'isdatainicio.required'=>'O campo não pode estar vazio.',
            'isdatainicio.max'=>'O campo não pode conter mais de 10 caracteres.',
            'isdatainicio.date_format'=>'O campo nome data inicial possui um formato inválido.',

            'isdatafinal.required'=>'O campo não pode estar vazio.',
            'isdatafinal.max'=>'O campo não pode conter mais de 10 caracteres.',
            'isdatafinal.date_format'=>'O campo nome data final possui um formato inválido.',


            'aslocal.required'=>'O campo não pode estar vazio.',
            'aslocal.max'=>'O campo não pode conter mais de 70 caracteres.',
            'aslocal.regex'=>'O campo nome local possui um formato inválido.',


            'ascurso.required'=>'O campo não pode estar vazio.',
            'ascurso.max'=>'O campo não pode conter mais de 70 caracteres.',
            'ascurso.regex'=>'O campo nome curso possui um formato inválido.',

            

            'asdatainicio.required'=>'O campo não pode estar vazio.',
            'asdatainicio.max'=>'O campo não pode conter mais de 10 caracteres.',
            'asdatainicio.date_format'=>'O campo nome data inicial possui um formato inválido.',

            'asdataconclusao.required'=>'O campo não pode estar vazio.',
            'asdataconclusao.max'=>'O campo não pode conter mais de 10 caracteres.',
            'asdataconclusao.date_format'=>'O campo nome data conclusão possui um formato inválido.',


            'hshabilidade.required'=>'O campo não pode estar vazio.',
            'hshabilidade.max'=>'O campo não pode conter mais de 255 caracteres.',
            'hshabilidade.regex'=>'O campo nome habilidade possui um formato inválido.',
        ];
    }
}

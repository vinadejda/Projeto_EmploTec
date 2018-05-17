<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Request;

class CandidatoRequest extends FormRequest
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
        //$this->request->merge(['cd_cpf'] => str_replace(['.', '-'], 'replace', $this->request->get('cd_cpf')));
        return [
            'cd_cpf' => 'required|string|max:14|unique:candidato',
            'estado_civil' => 'required|alpha|email|max:10',
            'igenero' => 'required|alpha|max:45',
            'dt_nascimento' => 'required|date|before:2016-12-31',
            'nacionalidade' => 'nullable|alpha|max:45',
            'deficiencia' => 'nullable|numeric|max:1'
           
        ];
    }
   
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'cd_cpf' => 'required|alpha-num|max:11|unique:candidato',
            'estado_civil' => 'required|alpha|email|max:10',
            'igenero' => 'required|alpha|max:45',
            'dt_nascimento' => 'required|date|before:2016-12-31',
            'nacionalidade' => 'nullable|alpha|max:45',
            'deficiencia' => 'nullable|numeric|max:1'
           
        ];
    }
}

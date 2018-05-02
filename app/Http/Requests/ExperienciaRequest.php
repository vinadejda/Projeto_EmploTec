<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienciaRequest extends FormRequest
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
            'cargo' => 'required|max:30',
            'descricao' => 'max:250',
            'empresa' => 'required|max:100',
            'segmento' =>  'max:25',
            'salario' => 'numeric|max:12',
            'DataInicio' => 'required|date',
            'DataFim' => 'required|date'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaRequest extends FormRequest
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
            'nome' => 'required|max:30',
            'localidade' => 'required|max:'
            'nivel'      => 'required|max:7',
            'dataExpiracao'  => 'required|date',
            'quantidade'       => 'required|numeric|max:3',
            'salario'    => 'required|numeric|max:9',
            'contratacao' => 'required|max:3',
            'empresa'     => 'required|max:14',
            'areaTI'     => 'required|max2',
            'cidade'      => 'numeric|max:4',
            'beneficio'   => 'true|false|1|0'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculoRequest extends FormRequest
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
            'objetivo' => 'required|max:50',
            'prentencaoSalarial' => 'numeric|max:9',
            'experiencia' => 'max:50',
            'formacao' => 'max:100',
            'info' => 'max:40',
            'nmIdioma' => 'max:20',
            'nmIdioma' => 'max:20',
            'nmIdioma' => 'max:20',
            'resumo' => 'max:250'
        ];
    }
}

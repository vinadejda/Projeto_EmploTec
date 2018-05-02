<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:45',
            'email' => 'required|email|max:45',
            'password' => 'required|max:60',
            'password-confirm' => 'required|max:60',
            'rua' => 'required|max:45',
            'nr' => 'required|numeric|max:5',
            'bairro' => 'required|max:45',
            'complemento' => 'max:45'
            'tel' => 'numeric|max:11'
            'celular' => 'numeric|max:11'
            'img' => 'max:250'
            'linkedin' => 'max:45'
            'facebook' => 'max:45'
            'twitter' => 'max:45'
            'portifolio' => 'max:45'
            'cidade' => ''
        ];
    }
}

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
            'name' => 'required|regex:/(^[A-Za-z \']+$)+/|max:45',
            'email' => 'required|string|email|max:45|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rua' => 'required|regex:/(^[A-Za-z0-9 \']+$)+/|max:45',
            'nr' => 'required|numeric',
            'bairro' => 'required|regex:/(^[A-Za-z0-9 \']+$)+/|max:45',
            'complemento' => 'nullable|regex:/(^[A-Za-z0-9 \']+$)+/|max:45',
            'tel' => 'nullable|numeric|max:11',
            'celular' => 'nullable|numeric|max:12',
            'img' => 'nullable|image|max:250',
            'linkedin' => 'nullable|url|max:45',
            'facebook' => 'nullable|url|max:45',
            'twitter' => 'nullable|url|max:45',
            'portifolio' => 'nullable|url|max:45',
            'cidade' => ''
        ];
    }
}

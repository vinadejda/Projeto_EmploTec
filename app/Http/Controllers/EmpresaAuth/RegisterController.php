<?php

namespace App\Http\Controllers\EmpresaAuth;

use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/empresa/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Empresa::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ds_rua' => $data['rua'],
            'nr_endereco' => $data['nr'],
            'ds_bairro' => $data['bairro'],
            'ds_complemento' => $data['complemento'],
            'nr_tel' => $data['tel'],
            'nl_user' => 1,
            'nr_cel' => $data['celular'],
            'im_perfil' => $data['img'],
            'link_linkedin' => $data['linkedin'],
            'link_facebook' => $data['facebook'],
            'link_twitter' => $data['twitter'],
            'link_site_pessoal' => $data['portifolio'],
        ]);
    }
    protected function guard()
    {
        return auth()->guard('empresa');
    }
    public function showRegistrationForm()
    {
        return view('empresa-auth.register');
    }
}

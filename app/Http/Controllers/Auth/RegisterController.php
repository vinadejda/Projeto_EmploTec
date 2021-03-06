<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Cidade;
use App\Models\Estado;
use Request;

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
    protected $redirectTo = '/painel/candidato/dados/adiciona';

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
        $data['tel'] = str_replace(['(', ')' , ' ', '-'], '', Request::input('tel'));
        $data['celular'] = str_replace(['(', ')' , ' ', '-'], '', Request::input('celular'));
        return Validator::make($data, [
            'name' => 'required|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º °]+$)+/|max:45',
            'email' => 'required|string|email|max:45|unique:users',
            'password' => 'required|string|min:6|max:60|confirmed',
            'rua' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'nr' => 'required|numeric',
            'bairro' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'complemento' => 'nullable|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'tel' => 'nullable',
            'celular' => 'nullable',
            'img' => 'nullable|image|max:250',  
            'linkedin' => 'nullable|url|max:45',
            'facebook' => 'nullable|url|max:45',
            'twitter' => 'nullable|url|max:45',
            'portifolio' => 'nullable|url|max:45',
            'cidade' => ''
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
        if (!empty($data['tel']))
            $data['tel'] = str_replace(['(', ')' , ' ', '-'], '', Request::input('tel'));
        if (!empty($data['celular']))
            $data['celular'] = str_replace(['(', ')' , ' ', '-'], '', Request::input('celular'));

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ds_rua' => $data['rua'],
            'nr_endereco' => $data['nr'],
            'ds_bairro' => $data['bairro'],
            'ds_complemento' => $data['complemento'],
            'nr_tel' => $data['tel'],
            'nl_user' => 2,
            'nr_cel' => $data['celular'],
            'im_perfil' => $data['img'],
            'link_linkedin' => $data['linkedin'],
            'link_facebook' => $data['facebook'],
            'link_twitter' => $data['twitter'],
            'link_site' => $data['portifolio'],
            'fk_cidade' => $data['cidade'],
        ]);
    }

    protected function guard()
    {
        return auth()->guard('web');
    }
    public function showRegistrationForm()
    {
        return view('auth.register')
        ->with('estado', Estado::all())
        ->with('cidade', Cidade::all());
    }
}

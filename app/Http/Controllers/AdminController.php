<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminAuth;
use App\Models\AreaTI;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    protected function validator(array $data)
    {
        $data['tel'] = str_replace(['(', ')' , ' ', '-'], '', Request::input('telefone'));
        $data['celular'] = str_replace(['(', ')' , ' ', '-'], '', Request::input('celular'));
        return Validator::make($data, [
            'name' => 'required|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º °]+$)+/|max:45',
            'email' => 'required|string|email|max:45|unique:users',
            'password' => 'required|string|min:6|max:60|confirmed',
            'endereco' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'nr' => 'required|numeric',
            'bairro' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'complemento' => 'nullable|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'telefone' => 'nullable',
            'celular' => 'nullable',
            'img' => 'nullable|image|max:250',  
            'linkedin' => 'nullable|url|max:45',
            'facebook' => 'nullable|url|max:45',
            'twitter' => 'nullable|url|max:45',
            'portifolio' => 'nullable|url|max:45',
            'cidade' => ''
        ]);
    }

    public function mostra($id)
    {
        $adm = AdminAuth::where('id', $id)->first();
        if(empty($adm))
        {
            return "Este Administrador não existe";
        }
        return view('area-admin.cadastrar-admin.detalhes')->with('adm', $adm);
    }
    public function infoAdmin()
    {    
        $admin = AdminAuth::where('id', auth()->guard('admin')->user()->id)->get(); 
        return view('area-admin.informacao-admin.info-admin')
        ->with('admin',$admin);
    }

    public function salva(){
        AdminAuth::create($this->getNewParams());
        return redirect('/painel/admin/lista');
    }
    public function adiciona(){
        return view('area-admin.cadastrar-admin.form')
        ->with('estado', Estado::all())
        ->with('cidade', Cidade::all());
    }


    public function edita(){
        $admin = AdminAuth::where('id', auth()->guard('admin')->user()->id)->first();
        return view('area-admin.informacao-admin.form')
        ->with('admin',$admin)
        ->with('estado', Estado::all())
        ->with('cidade', Cidade::all());
    }

    public function altera(){
        $params = $this->getParams();
        AdminAuth::where('id', auth()->guard('admin')->user()->id)->update($params);
        return redirect()->action('AdminController@infoAdmin');
    }

    public function remove($id){
        $empresas = AdminAuth::where('id', $id)->delete();
        return redirect()
        ->action('AdminController@listaAdmin');
    }

    public function listaAdmin(){
        $adm = DB::table('users')
        ->where('nl_user', '=', 1)
        ->where('id', '<>', auth()->guard('admin')->user()->id)
        ->get();
        //$teste = Admin::where('nl_user', 1)->first();
        //if( $teste->id != auth()->guard('admin')->user()->id)
            return view('area-admin.cadastrar-admin.listagem', ['adm' => $adm]);
    }

     public function getNewParams(){
        $tel = str_replace(['(', ')' , ' ', '-'], '', Request::input('telefone'));
        $celular = str_replace(['(', ')' , ' ', '-'], '', Request::input('celular'));
        $params = [
            'name' => Request::input('nome'),
            'email' => Request::input('email'),
            'password' => Hash::make(Request::input('password')),
            'ds_rua' => Request::input('endereco'),
            'nr_endereco' => Request::input('numero'),
            'ds_bairro' => Request::input('bairro'),
            'ds_complemento' => Request::input('complemento'),
            'nr_tel' => $tel,
            'nl_user' => 1,
            'nr_cel' => $celular,
            'im_perfil' => Request::input('img'),
            'link_linkedin' => Request::input('linkedin'),
            'link_facebook' => Request::input('facebook'),
            'link_twitter' => Request::input('twitter'),
            'link_site' => null, 
        ];
        return $params;
    }
    public function getParams(){
        $tel = str_replace(['(', ')' , ' ', '-'], '', Request::input('telefone'));
        $celular = str_replace(['(', ')' , ' ', '-'], '', Request::input('celular'));
        $usuario = AdminAuth::where('id', auth()->guard('admin')->user()->id)->first();
        $params = [
            'name' => Request::input('nome'),
            'email' => $usuario->email,
            'password' => $usuario->password,
            'ds_rua' => Request::input('endereco'),
            'nr_endereco' => Request::input('numero'),
            'ds_bairro' => Request::input('bairro'),
            'ds_complemento' => Request::input('complemento'),
            'nr_tel' => $tel,
            'nl_user' => $usuario->nl_user,
            'nr_cel' => $celular,
            'im_perfil' => Request::input('img'),
            'link_linkedin' => Request::input('linkedin'),
            'link_facebook' => Request::input('facebook'),
            'link_twitter' => Request::input('twitter'),
            'link_site' => $usuario->link_site, 
        ];
        return $params;
    }

}

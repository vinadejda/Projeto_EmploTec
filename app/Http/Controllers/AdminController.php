<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminAuth;
use App\Models\AreaTI;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return view('area-admin.cadastrar-admin.form');
    }


    public function edita(){
        $admin = AdminAuth::where('id', auth()->guard('admin')->user()->id)->first();
        return view('area-admin.informacao-admin.form')
        ->with('admin',$admin);
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
       
        $params = [
            'name' => Request::input('nome'),
            'email' => Request::input('email'),
            'password' => Hash::make(Request::input('password')),
            'ds_rua' => Request::input('rua'),
            'nr_endereco' => Request::input('numero'),
            'ds_bairro' => Request::input('bairro'),
            'ds_complemento' => Request::input('complemento'),
            'nr_tel' => Request::input('telefone'),
            'nl_user' => 1,
            'nr_cel' => Request::input('celular'),
            'im_perfil' => Request::input('img'),
            'link_linkedin' => Request::input('linkedin'),
            'link_facebook' => Request::input('facebook'),
            'link_twitter' => Request::input('twitter'),
            'link_site' => null, 
        ];
        return $params;
    }
    public function getParams(){
        $usuario = AdminAuth::where('id', auth()->guard('admin')->user()->id)->first();
        $params = [
            'name' => Request::input('nome'),
            'email' => $usuario->email,
            'password' => $usuario->password,
            'ds_rua' => Request::input('rua'),
            'nr_endereco' => Request::input('numero'),
            'ds_bairro' => Request::input('bairro'),
            'ds_complemento' => Request::input('complemento'),
            'nr_tel' => Request::input('telefone'),
            'nl_user' => $usuario->nl_user,
            'nr_cel' => Request::input('celular'),
            'im_perfil' => Request::input('img'),
            'link_linkedin' => Request::input('linkedin'),
            'link_facebook' => Request::input('facebook'),
            'link_twitter' => Request::input('twitter'),
            'link_site' => $usuario->link_site, 
        ];
        return $params;
    }

}

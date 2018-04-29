<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\EmpresaInfo;
use Request;
 



class EmpresaInfoController extends Controller
{
    public function cadastrar(){
	    if (auth()->guard('empresa')->check()) {
	        EmpresaInfo::create($this->getParams());
	        return redirect('/empresa/dashboard');
	    }  
	}

public function editar(){
    //$cnpj = $request->session()->get('cnpj');

        $info = EmpresaInfo::where('cd_cnpj', $cnpj)->first();
        return view('empresa-auth.info')
        //->with('categorias',Categoria::all())
        ->with('info',$info);
    }
    public function altera(){
       // $cnpj = $request->session()->get('cnpj');
        $params = $this->getParams();
        EmpresaInfo::where('cd_cnpj', $cnpj)->update($params);
        return redirect('/empresa/dashboard');
    }
    public function getParams(){
        //Session::put('cnpj', ['cd_cnpj' => Request::input('cnpj')]);
        $params = [
            'cd_cnpj' =>  Request::input('cnpj'), 
            'ds_razao_social' => Request::input('rz_social'), 
            'fk_usuario' =>  auth()->guard('empresa')->user()->id,
            'ic_ativo' => 1,
        ];

        return $params;
    }

    public function showRegistrationInfoForm()
    {
        return view('empresa-auth.info');
    }
}



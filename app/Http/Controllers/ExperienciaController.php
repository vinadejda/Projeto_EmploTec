<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Experiencia;

class ExperienciaController extends Controller
{
	public function infoExperiencia()
    {
        $exp = Experiencia::where('cd_experiencia', auth()->guard('web')->user()->id)->first();
        return view('area-user.experiencia.form')
        //->with('categorias',Categoria::all())
        ->with('exp',$exp);
    }


    public function adiciona(){
        Experiencia::create($this->getParams());
        //return redirect()/*->action('VagaController@lista')->withInput(Request::only('nome'))*/;
    }


    public function listarHistorico(){
    	$historico = DB::select('select * from historico_profissional');
    	return view('home')->with('historico', $historico);
    }

    /*public function remove($cnpj){
		$empresas = EmpresasModel::where('cnpj', $cnpj)->delete();
		return redirect()
		->action('EmpresaController@listarEmpresas');
    }
*/

    public function getParams(){
		$params = [
			'nm_cargo_experiencia' =>  Request::input('cargo'), 
			'ds_experiencia' => Request::input('descricao'), 
			'nm_empresa' => Request::input('empresa'), 
			'ds_segmento_empresa' =>  Request::input('segmento'), 
			'vl_salario' =>  Request::input('salario'), 
			'dt_inicio_experiencia' => Request::input('dataInicio'), 
			'dt_termino_experiencia' => Request::input('dataTermino'), 
			'fk_candidato' => auth()->guard('web')->user()->id, 
		];
		return $params;
	}
}

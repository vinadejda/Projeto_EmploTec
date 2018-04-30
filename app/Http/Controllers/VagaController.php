<?php

namespace App\Http\Controllers;


use Request;
use App\Http\Controllers\Controller;
use App\Models\Vaga;

class VagaController extends Controller
{
	public function __construct()
	{
	    $this->middleware('empresa');
	}
    public function lista()
    {
        $vagas =Vaga::all();
        return view('area-empresa.vagas.listagem')->with('vagas', $vagas);
    }
    /*public function mostra($id)
    {
        $vagas = Vaga::find($id);
        if(empty($vagas))
        {
        	return "Esta vaga não existe";
        }
        return view('vaga.detalhes')->with('v', $vaga);
    }*/
    
    public function novo(){
    	return view('area-empresa.vagas.form');//->with('categorias',Categoria::all());
    }

	public function adiciona(){
		Vaga::create($this->getParams());
    	return redirect()->action('VagaController@lista')->withInput(Request::only('nome'));
    }
    public function editar($id){
    	$vaga = Vaga::where('cd_vaga', $id)->first();
        return view('area-empresa.vagas.form')
        //->with('categorias',Categoria::all())
        ->with('vaga',$vaga);
    }
    public function altera(){
    	$params = $this->getParams();
    	Vaga::where('cd_vaga',Request::only('id'))->update($params);
    	return redirect()->action('VagaController@lista')->withInput(Request::only('nome'));
    }
    public function remove($id){
	    $vaga = Vaga::where('cd_vaga',$id);
	    $vaga->delete();

	    return redirect()->action('VagaController@lista');
	}
	public function getParams(){
		$beneficios = [];
		foreach (Request::input('beneficio') as $b) {
			switch ($b) {
			    case "valeTransporte":
			        $beneficios[0] = true;
			        break;
			    case "valeAlimentacao":
			        $beneficios[1] = true;
			        break;
			    case "planoSaude":
			        $beneficios[2] = true;
			        break;
			    case "planoDentario":
			        $beneficios[3] = true;
			        break;
			    case "planoVida":
			        $beneficios[4] = true;
			        break;
			}
		}
		$params = [
			'nm_vaga' =>  Request::input('nome'), 
			'ds_nivel' => Request::input('nivel'), 
			'ds_localidade' => Request::input('localidade'), 
			'dt_expiracao' =>  Request::input('dataExpiracao'), 
			'qt_vagas' =>  Request::input('quantidade'), 
			'vl_salario_vaga' => Request::input('salario'), 
			'ic_vale_transporte' => (empty($beneficios[0]) ? false : true), 
			'ic_vale_alimentacao' => (empty($beneficios[1]) ? false : true), 
			'ic_plano_saude' => (empty($beneficios[2]) ? false : true), 
			'ic_plano_dentario' => (empty($beneficios[3]) ? false : true), 
			'ic_seguro_vida' => (empty($beneficios[4]) ? false : true), 
			'nm_contratacao' => Request::input('contratacao'),
			'fk_empresa' => 1, 
			'fk_perfil_vaga' => 1, 
			'fk_area_ti' => 1
		];
		return $params;
	}
}

<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\Deficiencia;
use App\Models\Cidade;

class CandidatoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('web');
    }
    public function informacoes()
    {
        $candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->get();
        return view('area-user.candidato.informacoes')
        ->with('candidato',$candidato);
    }

    public function listarDeficiencia(){
        return view('area-user.candidato.form')
        ->with('deficiencia',Deficiencia::all());
    }

    public function adiciona(){
        Candidato::create($this->getParams());
        return redirect('/painel/candidato/dados/informacoes')->withInput(Request::only('cpf'));
    }
    public function editar(){
    	$candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
        return view('area-user.candidato.form')
        ->with('candidato',$candidato)
        ->with('deficiencia',Deficiencia::all());
    }

    public function altera(){
    	$params = $this->getParams();
    	Candidato::where('cd_cpf',Request::only('cpf'))->update($params);
    	return redirect()->action('CandidatoController@informacoes')->withInput(Request::only('cpf'));
    }

    /*public function remove($cnpj){
		$empresas = EmpresasModel::where('cnpj', $cnpj)->delete();
		return redirect()
		->action('EmpresaController@listarEmpresas');
    }
*/

    public function getParams(){
    	//$cpf = Candidato::where('cd_cpf', auth()->guard('web')->user()->id)->value('cd_cpf');
		$params = [
			'cd_cpf' =>  Request::input('cpf'), 
			'ds_estado_civil' => Request::input('estado_civil'), 
			'ic_genero' => Request::input('genero'), 
			'dt_nascimento' =>  Request::input('dt_nascimento'), 
			'ds_nacionalidade' =>  Request::input('nacionalidade'),  
			'fk_usuario' => auth()->guard('web')->user()->id, 
			'fk_deficiencia' => Request::input('deficiencia'),
		];
		return $params;
	}
}

<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\Deficiencia;
use App\Models\Cidade;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CandidatoRequest;

class CandidatoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('web');
    }
    public function informacoes()
    {
        $candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->get();
       // $deficiencia = Deficiencia::where('cd_deficiencia', $candidato->fk_deficiencia)->first();
        return view('area-user.candidato.informacoes')
        ->with('candidato',$candidato)
        ->with('deficiencia', Deficiencia::all());
    }

    public function listarDeficiencia(){
        $candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
        $deficiencia = Deficiencia::all();
        return view('area-user.candidato.form')
        ->with('candidato',$candidato)
        ->with('deficiencia', $deficiencia);
    }

    public function adiciona(CandidatoRequest $request){
        Candidato::create([
            'cpf' =>  $request->cd_cpf, 
            'ds_estado_civil' => $request->estado_civil, 
            'ic_genero' => $request->genero, 
            'dt_nascimento' =>  $request->dt_nascimento, 
            'ds_nacionalidade' =>  $request->nacionalidade,  
            'fk_usuario' => auth()->guard('web')->user()->id, 
            'fk_deficiencia' => $request->deficiencia,
        ]);
        //Candidato::create($this->getParams());
        return redirect('/painel/candidato/dados/informacoes')->withInput(Request::only('cd_cpf'));
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

    public function getParams(CandidatoRequest $request){
    	//$cpf = Candidato::where('cd_cpf', auth()->guard('web')->user()->id)->value('cd_cpf');
		$params = [
			'cd_cpf' =>  $request->cpf, 
			'ds_estado_civil' => $request->estado_civil, 
			'ic_genero' => $request->genero, 
			'dt_nascimento' =>  $request->dt_nascimento, 
			'ds_nacionalidade' =>  $request->nacionalidade,  
			'fk_usuario' => auth()->guard('web')->user()->id, 
			'fk_deficiencia' => $request->deficiencia,
		];
		return $params;
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Vaga;
use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\AreaTI;
use App\Models\PerfilVaga;

use App\Models\Candidato;
use App\Models\CandidatoVaga;

class VagaController extends Controller
{
	/*public function __construct()
	{
	    $this->middleware('empresa');
	}*/

	public function listarTodas()
    {
    	$t = 0;
		if(isset(auth()->guard('web')->user()->id)){
			
			$cpf = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->value('cd_cpf');
			$result  = CandidatoVaga::where('fk_candidato', $cpf)->get();
			$tes = CandidatoVaga::where('fk_candidato', $cpf)->get();
			$teste = $result->count();
			if($teste > 0)

				$t=1;
			
			else

				$t=0;
		}else{
			$tes = null;
		}
    	
        return view('vagas')
        ->with('vagas', Vaga::all())
        ->with('teste', $t)
        ->with('flag', 0)
        //->with('candidato', $cpf)
        ->with('result', $tes)
        ->with('areasTI', AreaTI::all());
    }

    public function lista()
    {
    	$cnpj_empresa = Empresa::where('fk_usuario',auth()->guard('empresa')->user()->id)->value('cd_cnpj');
        $vagas = Vaga::all()->where('fk_empresa', $cnpj_empresa);
        return view('area-empresa.vagas.listagem')->with('vagas', $vagas);
    }
    public function mostra($id)
    {
        $vaga = Vaga::where('cd_vaga', $id)->first();
        $perfil = PerfilVaga::where('fk_vaga', $id)->first();
        if(empty($vaga))
        {
        	return "Esta vaga não existe";
        }
        return view('area-empresa.vagas.detalhes')
        	->with('perfil', $perfil)
        	->with('vaga', $vaga);
    }
    
    public function novo(){
    	return view('area-empresa.vagas.form')
    		->with('cidades',Cidade::all())
    		->with('areasTI',AreaTI::all());
    }

	public function adiciona(Request $request){
		$empresa = (
			!empty($request->empresa) > 0 ? 
			$request->empresa : 
			Empresa::where('fk_usuario',auth()->guard('empresa')->user()->id)->value('cd_cnpj')
		);
		
		$request->salario = str_replace(['.', ','], '', $request->salario);

        $this->validate($request, [
            'nome' => 'required|alpha|max:14',
            //'ds_razao_social' => 'required|alpha_num|max:45',
			'nivel' => 'required|alpha', 
			'dataExpiracao' =>  'required|date|after:today', 
			'quantidade' =>  'required|numeric', 
			'salario' => 'required|numeric', 
			'beneficios[0]' => 'boleano', 
			'beneficios[1]' =>'boleano', 
			'beneficios[2]' => 'boleano', 
			'beneficios[3]' => 'boleano', 
			'beneficios[4]' => 'boleano', 
			'contratacao' => 'nullable|alpha',
			'empresa' => 'required|numeric|',  
			'areaTI' => 'required|numeric',
			'cidade' => 'required|numeric',
        ]);
    
			Vaga::create(
				$this->getParams()
			/*[
			'nm_vaga' =>  $request->nome, 
			'ds_nivel' => $request->nivel, 
			'dt_expiracao' =>  $request->dataExpiracao, 
			'qt_vagas' =>  $request->quantidade, 
			'vl_salario_vaga' => $request->salario, 
			'ic_vale_transporte' => (empty($beneficios[0]) ? false : true), 
			'ic_vale_alimentacao' => (empty($beneficios[1]) ? false : true), 
			'ic_plano_saude' => (empty($beneficios[2]) ? false : true), 
			'ic_plano_dentario' => (empty($beneficios[3]) ? false : true), 
			'ic_seguro_vida' => (empty($beneficios[4]) ? false : true), 
			'nm_contratacao' => $request->contratacao,
			'fk_empresa' => $empresa,  
			'fk_area_ti' => Request::input('areaTI'),
			'fk_cidade' => Request::input('cidade')]*/);
    	return redirect('/painel/empresa/vagas')->withInput(Request::only('nome'));
    }
    
    public function editar($id){
    	$vaga = Vaga::where('cd_vaga', $id)->first();
        return view('area-empresa.vagas.form')
        	->with('areasTI',AreaTI::all())
        	->with('cidades',Cidade::all())
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
		$empresa = (
			!empty(Request::input('empresa')) > 0 ? 
			Request::input('empresa') : 
			Empresa::where('fk_usuario',auth()->guard('empresa')->user()->id)->value('cd_cnpj')
		);
		$beneficios = [];
		if(count(Request::input('beneficio')) > 0){
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
		}

		$params = [
			'nm_vaga' =>  Request::input('nome'), 
			'ds_nivel' => Request::input('nivel'), 
			'dt_expiracao' =>  Request::input('dataExpiracao'), 
			'qt_vagas' =>  Request::input('quantidade'), 
			'vl_salario_vaga' => Request::input('salario'), 
			'ic_vale_transporte' => (empty($beneficios[0]) ? false : true), 
			'ic_vale_alimentacao' => (empty($beneficios[1]) ? false : true), 
			'ic_plano_saude' => (empty($beneficios[2]) ? false : true), 
			'ic_plano_dentario' => (empty($beneficios[3]) ? false : true), 
			'ic_seguro_vida' => (empty($beneficios[4]) ? false : true), 
			'nm_contratacao' => Request::input('contratacao'),
			'fk_empresa' => $empresa,  
			'fk_area_ti' => Request::input('areaTI'),
			'fk_cidade' => Request::input('cidade')
		];
		  
		return $params;
	}
	//----------------------------------PAGINA DE VAGAS--------------------------------------------
	
}

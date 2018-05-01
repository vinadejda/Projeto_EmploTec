<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Experiencia;
use App\Models\Candidato;

class ExperienciaController extends Controller
{
    protected function getCpf(){
        $cpf = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->value('cd_cpf');
        // $cpf = Experiencia::where('fk_candidato',auth()->guard('web')->user()->id)->value('fk_candidato');
         //$cpf = Experiencia::where('fk_usuario',auth()->guard('web')->user()->id);
         //print_r($cpf);
        return $cpf;
    }
	public function infoExperiencia()
    {    
        $exp = Experiencia::where('fk_candidato', $this->getCpf())->get();  
        //$candidato = Candidato::where('fk_usuario',auth()->guard('web')->user()->id)->value('cd_cpf');
        //$exp= Candidato::where('cd_candidato',$this->getCpf())->first();
        return view('area-user.experiencia.experiencia')
        //->with('categorias',Categoria::all())
        //->with('cpf', $this->getCpf())
        ->with('exp',$exp);
    }

    public function salva(){
        Experiencia::create($this->getParams());
        return redirect('/painel/candidato/experiencia/informacoes');
    }
    public function adiciona(){
        $exp = Experiencia::where('fk_candidato', $this->getCpf())->first();
        return view('area-user.experiencia.form')
        //->with('categorias',Categoria::all())
        ->with('exp',$exp);
        //->with('deficiencia',Deficiencia::all());
    }
    public function edita(){
        $exp = Experiencia::where('fk_candidato', $this->getCpf())->first();
        return view('area-user.experiencia.form')
        //->with('categorias',Categoria::all())
        ->with('exp',$exp);
        //->with('deficiencia',Deficiencia::all());
    }

    public function altera(){
        $params = $this->getParams();
        Experiencia::where('fk_candidato', $this->getCpf())->update($params);
        return redirect()->action('ExperienciaController@infoExperiencia')->withInput(Request::only('cpf'));
    }

    /*public function remove($cnpj){
        $empresas = EmpresasModel::where('cnpj', $cnpj)->delete();
        return redirect()
        ->action('EmpresaController@listarEmpresas');
    }
*/


    public function getParams(){
        $cpf = Candidato::where('fk_usuario',auth()->guard('web')->user()->id)->first();
        //$candidato =  Experiencia::where('fk_candidato', $teste)->first();
		$params = [
			'nm_cargo_experiencia' =>  Request::input('cargo'), 
			'ds_experiencia' => Request::input('descricao'), 
			'nm_empresa' => Request::input('empresa'), 
			'ds_segmento_empresa' =>  Request::input('segmento'), 
			'vl_salario' =>  Request::input('salario'), 
			'dt_inicio_experiencia' => Request::input('dataInicio'), 
			'dt_termino_experiencia' => Request::input('dataTermino'), 
			'fk_candidato' => $cpf->cd_cpf,
		];
		return $params;
	}
}

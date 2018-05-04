<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Curriculo;
use App\Models\Candidato;


class CurriculoController extends Controller
{
    protected function getCpf(){
        $cpf = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->value('cd_cpf');
        return $cpf;
    }
	public function infoCurriculo()
    {    
        $curriculo = Curriculo::where('fk_candidato', $this->getCpf())->get(); 
        return view('area-user.curriculo.curriculo')
        ->with('curriculo',$curriculo);
    }

    public function salva(){
        Curriculo::create($this->getParams());
        return redirect('/painel/candidato/curriculo/informacoes');
    }
    public function adiciona(){
        $curriculo = Curriculo::where('fk_candidato', $this->getCpf())->first();
        return view('area-user.curriculo.form')
        ->with('curriculo',$curriculo);
    }
    public function edita(){
        $curriculo = Curriculo::where('fk_candidato', $this->getCpf())->first();
        return view('area-user.curriculo.form')
        ->with('curriculo',$curriculo);
    }

    public function altera(){
        $params = $this->getParams();
        Curriculo::where('fk_candidato', $this->getCpf())->update($params);
        return redirect()->action('CurriculoController@infoCurriculo');
    }

    /*public function remove($cnpj){
        $empresas = EmpresasModel::where('cnpj', $cnpj)->delete();
        return redirect()
        ->action('EmpresaController@listarEmpresas');
    }
*/


    public function getParams(){
        $cpf = Candidato::where('fk_usuario',auth()->guard('web')->user()->id)->value('cd_cpf');
      	
		$params = [
			'ds_objetivo_profissional' =>  Request::input('objetivo'), 
			'vl_prentencao_salarial' => Request::input('vl_salario'), 
			'ds_info_complementar' => Request::input('informacoes'), 
			'ds_resumo_profissional' =>  Request::input('resumo'), 
			'fk_candidato' => $cpf,
		];
		return $params;
	}
}

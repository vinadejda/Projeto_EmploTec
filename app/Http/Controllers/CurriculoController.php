<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function salva(Request $request){
        
        $this->validate($request, [
            'objetivo' => 'required|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç]+$)+/|max:100',
            'vl_salario' => 'nullable',
            'infomacoes' => 'nullable|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç ]+$)+/|max:250',
            'resumo' => 'nullable|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç]+$)+/',
            
        ]);//|regex:/(^[\d{1,3}(\.\d{3})*|\d+)(\,\d{2})?$
        //regex:/(^\d{1,3}(\.\d{3})*|\d+)(\,\d{2})?$/
        $cpf = Candidato::where('fk_usuario',auth()->guard('web')->user()->id)->value('cd_cpf');
        $salario = str_replace(['.'], '', $request->vl_salario);
        $salario = str_replace([','], '.', $salario);
        Curriculo::create([
            'ds_objetivo_profissional' =>  $request->objetivo, 
            'vl_prentencao_salarial' => $salario, 
            'ds_info_complementar' => $request->informacoes, 
            'ds_resumo_profissional' =>  $request->resumo, 
            'fk_candidato' => $cpf,
        ]);
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

    public function altera(Request $request){
         $this->validate($request, [
            'objetivo' => 'required|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç]+$)+/|max:100, ',
            'vl_salario' => 'nullable|',
            'infomacoes' => 'nullable|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç ]+$)+/|max:250',
            'resumo' => 'nullable|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç]+$)+/',
            
        ]);//regex:/(^[\d{1,3}(\.\d{3})*|\d+)(\,\d{2})?$
        $cpf = Candidato::where('fk_usuario',auth()->guard('web')->user()->id)->value('cd_cpf');
         $salario = str_replace(['.'], '', $request->vl_salario);
        $salario = str_replace([','], '.', $salario);
        Curriculo::where('fk_candidato', $this->getCpf())->update([
            'ds_objetivo_profissional' =>  $request->objetivo, 
            'vl_prentencao_salarial' => $salario, 
            'ds_info_complementar' => $request->informacoes, 
            'ds_resumo_profissional' =>  $request->resumo, 
            'fk_candidato' => $cpf,
        ]);
        return redirect()->action('CurriculoController@infoCurriculo');
    }

    /*public function remove($cnpj){
        $empresas = EmpresasModel::where('cnpj', $cnpj)->delete();
        return redirect()
        ->action('EmpresaController@listarEmpresas');
    }
*/


    public function getParams(Request $request){
        $cpf = Candidato::where('fk_usuario',auth()->guard('web')->user()->id)->value('cd_cpf');
      	
		$params = [
			'ds_objetivo_profissional' =>  $request->objetivo, 
			'vl_prentencao_salarial' => $request->vl_salario, 
			'ds_info_complementar' => $request->informacoes, 
			'ds_resumo_profissional' =>  $request->resumo, 
			'fk_candidato' => $cpf,
		];
		return $params;
	}
}

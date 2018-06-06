<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Models\Candidato;
use App\Models\CandidatoVaga;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\AreaTI;
use Illuminate\Support\Facades\DB;


class CandidatoVagaController extends Controller
{

    public function adiciona($id)
	{
		$vaga = Vaga::where('cd_vaga', $id)->first();
		$cpf = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
		CandidatoVaga::create([
			'fk_candidato' => $cpf->cd_cpf,
    		'fk_vaga' => $vaga->cd_vaga,
		]);
        return redirect('/vagas');
	}

	public function informacoes()
	{
		$cpf = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
		$vagasCandidato = CandidatoVaga::where('fk_candidato', $cpf->cd_cpf)->get();
		$vagas = DB::table('vaga')
		    ->join('candidato_vaga', 'candidato_vaga.fk_vaga', '=', 'vaga.cd_vaga')
		    ->join('area_ti', 'area_ti.cd_areaTI', '=', 'vaga.fk_area_ti')
			->join('empresa', 'empresa.cd_cnpj', '=', 'vaga.fk_empresa')
			->join('cidade', 'cidade.cd_cidade', '=', 'vaga.fk_cidade')
		    ->where('candidato_vaga.fk_candidato', $cpf->cd_cpf)
		    ->select('vaga.cd_vaga','vaga.nm_vaga', 'vaga.ds_nivel', 'vaga.vl_salario_vaga', 'area_ti.nm_areaTI', 'cidade.nm_cidade', 'empresa.ds_razao_social', 'area_ti.cd_areaTI', DB::raw('(select count(pc.fk_pergunta) as qtd from pergunta_candidato pc 
												join pergunta p on (p.cd_pergunta = pc.fk_pergunta) 
												where fk_areaTI = vaga.fk_area_ti and fk_cpf = candidato_vaga.fk_candidato) as qtd'))
		    ->get();
		return view('area-user.vagas.informacoes')
		->with('vagasCandidato', $vagasCandidato)
		->with('vagas', $vagas);
	}

	public function cancela($id)
	{
		$cpf = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
		CandidatoVaga::where('fk_candidato', '=', $cpf->cd_cpf)->where('fk_vaga', '=', $id)->delete();

        return redirect('/vagas');
	}



}

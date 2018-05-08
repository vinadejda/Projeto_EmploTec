<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Models\Candidato;
use App\Models\CandidatoVaga;


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
		$candidato = CandidatoVaga::where('fk_candidato', $cpf->cd_cpf)->get();

		return view('area-user.vagas.informacoes')
		->with('candidato', $candidato)
		->with('vagas', Vaga::all());
	}



}

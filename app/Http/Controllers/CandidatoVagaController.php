<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\AreaTI;

class CandidatoVagaController extends Controller
{
    public function visualizarVagas()
	{
		return view('vagas')
		->with('areasTI', AreaTI::all())
		->with('vagas', Vaga::all());
	}
}

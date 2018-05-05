<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Alternativa;

class TesteController extends Controller
{
    public function criarTeste()
    {
    	Pergunta::create($this->getParams());
    	Alternativa::create($this->getParamsAlt());
    }
}

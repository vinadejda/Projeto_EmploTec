<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilVagaController extends Controller
{
    public function novo($id){
    	return view('area-empresa.perfil-vaga.form')
    	->with('vaga', $id);
    }
}

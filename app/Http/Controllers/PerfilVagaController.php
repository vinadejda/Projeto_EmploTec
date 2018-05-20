<?php

namespace App\Http\Controllers;

//use Request;
use App\Models\Vaga;
use App\Models\Empresa;
use App\Models\PerfilVaga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PerfilVagaController extends Controller
{
    public function novo($id = null){
    	$cnpj_empresa = Empresa::where('fk_usuario',auth()->guard('empresa')->user()->id)->value('cd_cnpj');
    	$vagas = Vaga::all()->where('fk_empresa', $cnpj_empresa);
    	return view('area-empresa.perfil-vaga.form')
    	->with('id_vaga', $id)
    	->with('vagas', $vagas);
    }
    public function lista()
    {
    	$cnpj_empresa = Empresa::where('fk_usuario',auth()->guard('empresa')->user()->id)->value('cd_cnpj');
        $vaga = Vaga::where('fk_empresa', $cnpj_empresa)->value('cd_vaga');
        $perfilVagas = DB::table('perfil_vaga')
		    ->join('vaga', 'perfil_vaga.fk_vaga', '=', 'vaga.cd_vaga')
		    ->join('empresa', 'vaga.fk_empresa', '=', 'empresa.cd_cnpj')
		    ->join('users', 'empresa.fk_usuario', '=', 'users.id')
		    ->where('users.id', auth()->guard('empresa')->user()->id)
		    ->select('perfil_vaga.*', 'vaga.nm_vaga')
		    ->get();

        //PerfilVaga::all()->where('fk_vaga', $vaga);
        return view('area-empresa.perfil-vaga.listagem')->with('perfis', $perfilVagas);
    }

    public function adiciona(Request $request){
        $this->validate($request, [
            'nome' => 'required|alpha|',
            'genero' => 'required|alpha',
            'idade' => 'required|numeric',
            'competencia' => 'required|alpha_num|max:45',
            'formacao' => 'required|alpha',
            'vaga' => 'required|numeric',
        ]);
		PerfilVaga::create($this->getParams());
    	return redirect()->action('PerfilVagaController@lista')->withInput($request->nome);
    }

    public function editar($id){
    	$cnpj_empresa = Empresa::where('fk_usuario',auth()->guard('empresa')->user()->id)->value('cd_cnpj');
    	$vagas = Vaga::all()->where('fk_empresa', $cnpj_empresa);
    	$perfil = PerfilVaga::where('cd_perfil_vaga', $id)->first();
        return view('area-empresa.perfil-vaga.form')
        	->with('id_vaga', $perfil->fk_vaga)
        	->with('vagas', $vagas)
        	->with('perfil',$perfil);
    }
    public function altera(){
    	$params = $this->getParams();
    	PerfilVaga::where('cd_perfil_vaga',Request::only('id'))->update($params);
    	return redirect()->action('PerfilVagaController@lista')->withInput(Request::only('nome'));
    }
    public function remove($id){
	    $perfilVaga = PerfilVaga::where('cd_perfil_vaga',$id);
	    $perfilVaga->delete();

	    return redirect()->action('PerfilVagaController@lista');
	}
	public function getParams(){
		$params = [
			'nm_perfil_vaga' =>  Request::input('nome'), 
			'ds_genero' => Request::input('genero'), 
			'nr_idade' =>  Request::input('idade'), 
			'ds_interresse' =>  Request::input('competencia'), 
			'ds_formacao' => Request::input('formacao'),
			'fk_vaga' => Request::input('vaga'),
		];
		  
		return $params;
	}
}

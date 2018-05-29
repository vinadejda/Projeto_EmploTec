<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Pergunta;
use App\Models\Alternativa;
use App\Models\AreaTI;
use App\Models\Candidato;
use App\Models\PerguntaCandidato;
use Illuminate\Support\Facades\DB;

class TesteController extends Controller
{

	public function cadastra(){
       // $areaTI = DB::select('select * from area_ti')->get();
        return view('area-admin.teste.form')
        //->with('areaTI', $areaTI); 
        ->with('areasTI',AreaTI::all());
    }
    public function adiciona()
    {
    	Pergunta::create($this->getParams());
    	Alternativa::create($this->getParamsAltA());
    	Alternativa::create($this->getParamsAltB());
    	Alternativa::create($this->getParamsAltC());
    	Alternativa::create($this->getParamsAltD());
    	Alternativa::create($this->getParamsAltE());
    	return redirect()->action('TesteController@lista');
    }
    public function lista()
	{
		return view('area-admin.teste.listagem')
		->with('pergunta', Pergunta::all())
		->with('alternativas', Alternativa::all())
		->with('areasTI', AreaTI::all());
	}
	public function editar($id){
    	$pergunta = Pergunta::where('cd_pergunta', $id)->first();
    	$alternativa = Alternativa::where('fk_pergunta', $id)->get();
        return view('area-admin.teste.form')
        	->with('areasTI',AreaTI::all())
        	->with('alternativas',$alternativa)
        	->with('i', 0)
        	->with('pergunta',$pergunta);
    }
    public function altera(){
        $params = $this->getParams();
        $params0 = $this->getParamsAltA();
        $params1 = $this->getParamsAltB();
        $params2 = $this->getParamsAltC();
        $params3 = $this->getParamsAltD();
        $params4 = $this->getParamsAltE();

        Pergunta::where('cd_pergunta', Request::input('cd_pergunta'))->update($params);

        Alternativa::where('cd_alternativa', Request::input('cd_alternativa0'))
        ->update($this->getParamsAltA());

    	Alternativa::where('cd_alternativa', Request::input('cd_alternativa1'))
        ->update($params1);

        Alternativa::where('cd_alternativa', Request::input('cd_alternativa2'))
        ->update($params2);

        Alternativa::where('cd_alternativa', Request::input('cd_alternativa3'))
        ->update($params3);

        Alternativa::where('cd_alternativa', Request::input('cd_alternativa4'))
        ->update($params4);
        
        return redirect()->action('TesteController@lista');
    }
	public function remove($id){
		Alternativa::where('fk_pergunta', $id)->delete();
	    $pergunta = Pergunta::where('cd_pergunta',$id);
	    $pergunta->delete();

	    return redirect()->action('TesteController@lista');
	}
    public function getParams()
    {		
		$params = [
			'ds_pergunta' => Request::input('pergunta'), 
			'fk_areaTI' => Request::input('areaTI'),
		];
		  
		return $params;
	}

	public function getParamsAltA()
    {
    	$pergunta = (
			!empty(Request::input('cd_pergunta')) > 0 ? 
			Request::input('cd_pergunta'): 
			Pergunta::where('ds_pergunta', Request::input('pergunta'))->value('cd_pergunta') 
			
		);
    	

		$params = [
			'ds_alternativa' => Request::input('alternativa0'), 
			'ic_alternativa' => (Request::input('opcao') == 0 ? 1 : 0),
			'fk_pergunta' => $pergunta,
		];
		  
		return $params;
	}
	public function getParamsAltB()
    {
    	$pergunta = (
			!empty(Request::input('cd_pergunta')) > 0 ? 
			Request::input('cd_pergunta'): 
			Pergunta::where('ds_pergunta', Request::input('pergunta'))->value('cd_pergunta') 
			
		);

		$params = [
			'ds_alternativa' => Request::input('alternativa1'), 
			'ic_alternativa' => (Request::input('opcao') == 1 ? 1 : 0),
			'fk_pergunta' => $pergunta,
		];
		  
		return $params;
	}
	public function getParamsAltC()
    {
    	$pergunta = (
			!empty(Request::input('cd_pergunta')) > 0 ? 
			Request::input('cd_pergunta'): 
			Pergunta::where('ds_pergunta', Request::input('pergunta'))->value('cd_pergunta') 
			
		);
		

		$params = [
			'ds_alternativa' => Request::input('alternativa2'), 
			'ic_alternativa' => (Request::input('opcao') == 2 ? 1 : 0),
			'fk_pergunta' => $pergunta,
		];
		  
		return $params;
	}
	public function getParamsAltD()
    {
    	$pergunta = (
			!empty(Request::input('cd_pergunta')) > 0 ? 
			Request::input('cd_pergunta'): 
			Pergunta::where('ds_pergunta', Request::input('pergunta'))->value('cd_pergunta') 
			
		);		

		$params = [
			'ds_alternativa' => Request::input('alternativa3'), 
			'ic_alternativa' => (Request::input('opcao') == 3 ? 1 : 0),
			'fk_pergunta' => $pergunta,
		];
		  
		return $params;
	}
	public function getParamsAltE()
    {
    	$pergunta = (
			!empty(Request::input('cd_pergunta')) > 0 ? 
			Request::input('cd_pergunta'): 
			Pergunta::where('ds_pergunta', Request::input('pergunta'))->value('cd_pergunta') 
			
		);
		

		$params = [
			'ds_alternativa' => Request::input('alternativa4'), 
			'ic_alternativa' => (Request::input('opcao') == 4 ? 1 : 0),
			'fk_pergunta' => $pergunta,
		];
		  
		return $params;
	}

	public function realizar($id)
	{
		$perguntas = Pergunta::where('fk_areaTI',$id)->get();
		$pergunta = Pergunta::where('fk_areaTI',$id)->first();
		$nome = AreaTI::where('cd_areaTI', $pergunta->fk_areaTI)->first();
		return view('area-user.teste.form')
		->with('numero', 1)
		->with('perguntas', $perguntas)
		->with('alternativas', Alternativa::all())
		->with('areaTI', $nome);
	}

	public function concluir()
	{
		$resultado = 0;
		$candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first()->cd_cpf;
		$perguntas = Pergunta::where('fk_areaTI', Request::input('id'))->get();
		foreach ($perguntas as $p) {
			PerguntaCandidato::create([
				'fk_pergunta' => Request::input($p->cd_pergunta),
   				'fk_cpf' => $candidato,
			]);
			$alternativas = Alternativa::where('fk_pergunta', $perguntas->cd_pergunta)->get();
			foreach ($alternativas as $a) {
				if($a == Request::input($p->cd_pergunta))
					$resultado += 1;
			}
		}
	}
}

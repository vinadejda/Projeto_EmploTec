<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\Deficiencia;
use App\Models\Cidade;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
//use App\Http\Requests\CandidatoRequest;

class CandidatoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('web');
    }
    public function informacoes()
    {
        $candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->get();
        $usuario = User::where('id', auth()->guard('web')->user()->id)->get();
       // $deficiencia = Deficiencia::where('cd_deficiencia', $candidato->fk_deficiencia)->first();
        return view('area-user.candidato.informacoes')
        ->with('candidato',$candidato)
        ->with('deficiencia', Deficiencia::all());
    }

    public function listarDeficiencia(){
        $candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
        $deficiencia = Deficiencia::all();
        return view('auth.form')
        ->with('candidato',$candidato)
        ->with('deficiencia', $deficiencia);
    }
   /* protected function validator(array $data)
    {
        $data['cd_cpf'] = str_replace(['.', '-'], '', Request::input('cd_cpf'));
        return Validator::make($data, [
            'cd_cpf' => 'required|number|max:14|unique:candidato',
            'estado_civil' => 'required|alpha|email|max:10',
            'igenero' => 'required|alpha|max:45',
            'dt_nascimento' => 'required|date|before:2016-12-31',
            'nacionalidade' => 'nullable|alpha|max:45',
            'deficiencia' => 'nullable|numeric|max:1'
        ]);
    }*/

   

    public function create(Request $request){
        $request->tel = str_replace(['(', ')' , ' ', '-'], '', $request->tel);
        $request->celular = str_replace(['(', ')' , ' ', '-'], '', $request->celular);
        $request->cd_cpf = str_replace(['.', '-'], '', $request->cd_cpf);
        $this->validate($request, [
            'nome' => 'required|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º °]+$)+/|max:45',
            'email' => 'sometimes|required|string|email|max:45|unique:users',
            'endereco' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'nr' => 'required|numeric',
            'bairro' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'complemento' => 'nullable|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'tel' => 'nullable',
            'celular' => 'nullable',
            'foto' => 'nullable|image|max:250',  
            'linkedin' => 'nullable|url|max:45',
            'facebook' => 'nullable|url|max:45',
            'twitter' => 'nullable|url|max:45',
            'portifolio' => 'nullable|url|max:45',
            'cidade' => '',
            'estado_civil' => 'required|regex:/(^[A-Za-z]+$)+/|max:10',
            'genero' => 'required|regex:/(^[A-Za-z]+$)+/|max:45',
            'dt_nascimento' => 'required|date|before:2016-12-31',
            'nacionalidade' => 'nullable|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç]+$)+/|max:45',
            'deficiencia' => 'nullable|numeric|max:1'
        ]);
       
        Candidato::create([
            'cd_cpf' => $request->cd_cpf, 
            'ds_estado_civil' => $request->estado_civil, 
            'ic_genero' => $request->genero, 
            'dt_nascimento' =>  $request->dt_nascimento, 
            'ds_nacionalidade' =>  $request->nacionalidade,  
            'fk_usuario' => auth()->guard('web')->user()->id, 
            'fk_deficiencia' => $request->deficiencia,
        ]);
        //Candidato::create($this->getParams());
        return redirect('/painel/candidato/dados/informacoes')->withInput($request->only('cd_cpf'));
    }
    public function editar(){
    	$candidato = Candidato::where('fk_usuario', auth()->guard('web')->user()->id)->first();
        $usuario = User::where('id', auth()->guard('web')->user()->id)->first();
        return view('area-user.candidato.form')
        ->with('candidato',$candidato)
        ->with('usuario', $usuario)
        ->with('cidade', Cidade::all())
        ->with('deficiencia',Deficiencia::all());
    }

    public function altera(Request $request){
        $request->tel = str_replace(['(', ')' , ' ', '-'], '', $request->tel);
        $request->celular = str_replace(['(', ')' , ' ', '-'], '', $request->celular);
    	 $this->validate($request, [
            'nome' => 'required|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º °]+$)+/|max:45',
            'email' => 'required|string|email|max:45',
            'endereco' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'nr' => 'required|numeric',
            'bairro' => 'required|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'complemento' => 'nullable|regex:/(^[A-Za-z0-9 \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç º ° ]+$)+/|max:45',
            'tel' => 'nullable',
            'celular' => 'nullable',
            'foto' => 'nullable|image|max:250',  
            'linkedin' => 'nullable|url|max:45',
            'facebook' => 'nullable|url|max:45',
            'twitter' => 'nullable|url|max:45',
            'portifolio' => 'nullable|url|max:45',
            'cidade' => '',
            'estado_civil' => 'required|regex:/(^[A-Za-z]+$)+/|max:10',
            'genero' => 'required|regex:/(^[A-Za-z]+$)+/|max:45',
            'dt_nascimento' => 'required|date|before:2016-12-31',
            'nacionalidade' => 'nullable|regex:/(^[A-Za-z \' ã á â é ê í î õ ó ô ú û ç Ã Á Â Ê É Í Î Õ Ô Ó Ú Û Ç]+$)+/|max:45',
            'deficiencia' => 'nullable|numeric|max:1'
        ]);
    	Candidato::where('cd_cpf', $request->cd_cpf)->update([
            'cd_cpf' => $request->cd_cpf, 
            'ds_estado_civil' => $request->estado_civil, 
            'ic_genero' => $request->genero, 
            'dt_nascimento' =>  $request->dt_nascimento, 
            'ds_nacionalidade' =>  $request->nacionalidade,  
            'fk_usuario' => auth()->guard('web')->user()->id, 
            'fk_deficiencia' => $request->deficiencia,
        ]);
        User::where('id', auth()->guard('web')->user()->id)->update(
            [
            'name' => $request->nome,
            'email' => $request->email,
            'ds_rua' => $request->endereco,
            'nr_endereco' => $request->nr,
            'ds_bairro' => $request->bairro,
            'ds_complemento' => $request->complemento,
            'nr_tel' => $request->tel,
            'nl_user' => 2,
            'nr_cel' => $request->celular,
            'im_perfil' => $request->foto,
            'link_linkedin' => $request->linkedin,
            'link_facebook' => $request->facebook,
            'link_twitter' => $request->twitter,
            'link_site' => $request->portifolio,
            'fk_cidade' => $request->cidade,
        ]);
    	return redirect()->action('CandidatoController@informacoes')/*->withInput($request->cd_cpf)*/;
    }

    /*public function remove($cnpj){
		$empresas = EmpresasModel::where('cnpj', $cnpj)->delete();
		return redirect()
		->action('EmpresaController@listarEmpresas');
    }
*/

    /*public function getParams(CandidatoRequest $request){
        $request->cpf =  str_replace(['.', '-'], 'replace', $this->request->get('cd_cpf'));
    	//$cpf = Candidato::where('cd_cpf', auth()->guard('web')->user()->id)->value('cd_cpf');
		$params = [
			'cd_cpf' =>  $request->cpf, 
			'ds_estado_civil' => $request->estado_civil, 
			'ic_genero' => $request->genero, 
			'dt_nascimento' =>  $request->dt_nascimento, 
			'ds_nacionalidade' =>  $request->nacionalidade,  
			'fk_usuario' => auth()->guard('web')->user()->id, 
			'fk_deficiencia' => $request->deficiencia,
		];
		return $params;
	}*/
}

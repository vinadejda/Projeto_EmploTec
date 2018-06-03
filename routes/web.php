<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::get('/vagas','VagaController@listarTodas');

//Route::get('/vagas', 'CandidatoVagaController@visualizarVagas');



Route::get('/empresas', function () {
    return view('empresas');
});

Route::get('/sobrenos', function () {
    return view('sobrenos');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');




//-----------------------ROTAS DO USUARIO-------------------------------------

Route::get('/painel/candidato/dashboard', function () {
    return view('area-user.dashboard.index');
})->name('dashboard-candidato');






//-----------------------CANDIDATO------------------------------------------
Route::group(['prefix'=>'painel/candidato'], function(){

    //------------------Rotas protegidas do painel candidato-------------------
    Route::group(['middleware' => ['web']], function(){

//-----------------------DADOS PESSOAIS------------------------------------------
        Route::group(['prefix'=>'dados'], function(){

            Route::get('/informacoes', 'CandidatoController@informacoes');
            Route::post('/salva', 'CandidatoController@create');
            Route::get('/adiciona', 'CandidatoController@listarDeficiencia');
            Route::get('/edita', 'CandidatoController@editar');
            Route::post('/altera', 'CandidatoController@altera');

        });

//-----------------------------CURRICULO---------------------------------------------------------
        Route::group(['prefix'=>'curriculo'], function(){
            Route::get('/informacoes','CurriculoController@infoCurriculo');
            Route::get('/adiciona', 'CurriculoController@adiciona');
            Route::post('/salva', 'CurriculoController@salva');
            Route::get('/edita', 'CurriculoController@edita');
            Route::post('/altera', 'CurriculoController@altera');

        });
//------------------------------EXPERIENCIA------------------------------------------------------
        Route::group(['prefix'=>'experiencia'], function(){
            Route::get('/informacoes','ExperienciaController@infoExperiencia');
            Route::get('/adiciona', 'ExperienciaController@adiciona');
            Route::post('/salva', 'ExperienciaController@salva');
            Route::get('/edita', 'ExperienciaController@edita');
            Route::post('/altera', 'ExperienciaController@altera');
            //Route::get('/painel/candidato/informacoes', 'CandidatoController@informacoes');
        });
//------------------------------EXPERIENCIA------------------------------------------------------
        Route::group(['prefix'=>'vagas'], function(){
            Route::get('/informacoes','CandidatoVagaController@informacoes');
            Route::get('/candidatura/{id}', 'CandidatoVagaController@adiciona')->where('id', '[0-9]+');
            Route::get('/cancelar/{id}', 'CandidatoVagaController@cancela')->where('id', '[0-9]+');
            //Route::get('/exclui', 'ExperienciaController@exclui');
            //Route::post('/excluir', 'ExperienciaController@altera');
            //Route::get('/painel/candidato/informacoes', 'CandidatoController@informacoes');
            Route::group(['prefix' => 'testes'], function(){
                Route::get('realizar/{id}', 'TesteController@realizar')->where('id', '[0-9]+');
                Route::post('concluir', 'TesteController@concluir');
                Route::get('/resultado','TesteController@resultado');

            });
        });



        //Route::get('/painel/ca');
   });
});


//-------------------------END ROTAS USUARIO-------------------------------------




//------------------------ROTAS ACESSO EMPRESA---------------------------------

Route::group(['prefix'=>'/empresa'], function(){



	Route::get('login', ['as' => 'empresa.login', 'uses' => 'EmpresaAuth\LoginController@showLoginForm']);
	Route::post('login', ['uses' => 'EmpresaAuth\LoginController@login']);
    Route::post('logout', ['as' => 'empresa.logout', 'uses' => 'EmpresaAuth\LoginController@logout']);
// Registration Routes...
    Route::get('register', ['as' => 'empresa.register', 'uses' => 'EmpresaAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['uses' => 'EmpresaAuth\RegisterController@register']);
// Password Reset Routes...
    Route::get('password/reset', ['as' => 'empresa.password.request', 'uses' => 'EmpresaAuth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'empresa.password.email', 'uses' => 'EmpresaAuth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'empresa.password.reset.token', 'uses' => 'EmpresaAuth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['uses' => 'EmpresaAuth\ResetPasswordController@reset']);
});  

//--------------------Rotas do painel da empresa-------------------
Route::group(['prefix'=>'painel/empresa'], function(){

    //------------------Rotas protegidas do painel empresa-------------------
    Route::group(['middleware' => ['empresa']], function(){
        Route::get('/dashboard', function(){return view('area-empresa.dashboard.index');})->name('dashboard-empresa');
        Route::group(['prefix'=>'/vagas'], function(){
            Route::get('/','VagaController@lista');
            Route::get('/cadastro', 'VagaController@novo');
            Route::post('/adiciona', 'VagaController@adiciona');
            Route::post('/altera', 'VagaController@altera');
            Route::get('/mostra/{id}', 'VagaController@mostra')->where('id', '[0-9]+');
            Route::get('/remove/{id}', 'VagaController@remove')->where('id', '[0-9]+');
            Route::get('/editar/{id}', 'VagaController@editar')->where('id', '[0-9]+');

            Route::group(['prefix'=>'/perfil'], function(){
                Route::get('/cadastro/{id?}', 'PerfilVagaController@novo')->where('id', '[0-9]+');
            });
            
        });
        Route::group(['prefix'=>'/perfil'], function(){
            Route::get('/','PerfilVagaController@lista');
            Route::post('/adiciona', 'PerfilVagaController@adiciona');
            Route::post('/altera', 'PerfilVagaController@altera');
            Route::get('/remove/{id}', 'PerfilVagaController@remove')->where('id', '[0-9]+');
            Route::get('/editar/{id}', 'PerfilVagaController@editar')->where('id', '[0-9]+');
        });
        //Empresa Info
        Route::get('/info', ['as' => 'empresa.info','uses' => 'EmpresaController@showRegistrationInfoForm']);
        Route::post('/info', ['uses' => 'EmpresaController@cadastrar'])->name('cadastro-empresa');
        Route::get('/editar', 'EmpresaController@editar');
        Route::post('/alterar', 'EmpresaController@altera');
    });
});




//-------------------------END ROTAS EMPRESA---------------------------------







//-------------------------ROTAS ADMINISTRATIVAS-----------------------------

Route::group(['prefix'=>'admin'], function(){
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);

    Route::get('/', function(){return view('area-admin.dashboard.index');})->name('dashboard-admin');

    Route::post('login', ['uses' => 'AdminAuth\LoginController@login']);
    Route::post('logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'admin.register', 'uses' => 'AdminAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['uses' => 'AdminAuth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'admin.password.request', 'uses' => 'AdminAuth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'admin.password.email', 'uses' => 'AdminAuth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'admin.password.reset.token', 'uses' => 'AdminAuth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['uses' => 'AdminAuth\ResetPasswordController@reset']);
});

        Route::view('/admin/home','admin-home')->middleware('admin');

//--------------------Rotas do painel da empresa-------------------

Route::group(['prefix'=>'painel/admin'], function(){

    //------------------Rotas protegidas do painel empresa-------------------
    Route::group(['middleware' => ['admin']], function(){

        Route::view('dashboard','area-admin.dashboard.index');

        Route::get('/perfil', 'AdminController@infoAdmin');
        Route::get('/perfil/edita', 'AdminController@edita');
        Route::post('/perfil/altera', 'AdminController@altera');
        Route::get('/lista', 'AdminController@listaAdmin');
        Route::get('/cadastrarnovo', 'AdminController@adiciona');
        Route::post('/salva', 'AdminController@salva');
        Route::post('/listaradmin', 'AdminController@salva');
        Route::get('/remove/{id}', 'AdminController@remove')->where('id', '[0-9]+');
        Route::get('/mostra/{id}', 'AdminController@mostra')->where('id', '[0-9]+');
        
        Route::group(['prefix'=>'/testes'], function(){
            Route::get('/cadastra', 'TesteController@cadastra');
            Route::post('/adiciona', 'TesteController@adiciona');
            Route::get('/visualizar', 'TesteController@lista');
            Route::get('/remove/{id}', 'TesteController@remove')->where('id', '[0-9]+');
            Route::get('/editar/{id}', 'TesteController@editar')->where('id', '[0-9]+');
            Route::post('/altera', 'TesteController@altera');
        });
    });
});


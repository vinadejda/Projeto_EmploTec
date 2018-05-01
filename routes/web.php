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

Route::get('/vagas', function () {
    return view('vagas');
});

Route::get('/empresas', function () {
    return view('empresas');
});

Route::get('/sobrenos', function () {
    return view('sobrenos');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/painel/candidato/dashboard', function () {
    return view('area-user.dashboard.index');
});

//ROTAS USUARIO
Route::get('/painel/candidato/curriculo', 'CurriculoController@index');
Route::post('/painel/candidato/curriculo/adicionarcurriculo', 'CurriculoController@adiciona');
Route::get('/painel/candidato/experiencia','ExperienciaController@infoExperiencia');

Route::post('/painel/candidato/experiencia/adiciona', 'ExperienciaController@adiciona');




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
        Route::get('/', function(){return view('area-empresa.dashboard.index');})->name('dashboard-empresa');
        Route::group(['prefix'=>'/vagas'], function(){
            Route::get('/','VagaController@lista');
            Route::get('/cadastro', 'VagaController@novo');
            Route::post('/adiciona', 'VagaController@adiciona');
            Route::post('/altera', 'VagaController@altera');
            Route::get('/mostra/{id}', 'VagaController@mostra')->where('id', '[0-9]+');
            Route::get('/remove/{id}', 'VagaController@remove')->where('id', '[0-9]+');
            Route::get('/editar/{id}', 'VagaController@editar')->where('id', '[0-9]+');

            Route::group(['prefix'=>'/perfil'], function(){
                Route::get('/cadastro/{id}', 'PerfilVagaController@novo')->where('id', '[0-9]+');
            });
            
        });
        
        //Empresa Info
        Route::get('info', ['as' => 'empresa.info','uses' => 'EmpresaController@showRegistrationInfoForm']);
        Route::post('info', ['uses' => 'EmpresaController@cadastrar'])->name('cadastro-empresa');
        Route::get('/editar', 'EmpresaController@editar');
        Route::post('/alterar', 'EmpresaController@altera');
    });
});




//-------------------------END ROTAS EMPRESA---------------------------------

//-------------------------ROTAS ADMINISTRATIVAS-----------------------------

Route::group(['prefix'=>'admin'], function(){
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);

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


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
});

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



//ROTAS EMPRESA

Route::group(['prefix'=>'empresa'], function(){
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


Route::view('/empresa/home','empresa-home')->middleware('empresa');

Route::get('/empresa/vagas','VagaController@lista');
Route::get('/empresa/vagas/mostra/{id}', 'VagaController@mostra')->where('id', '[0-9]+');
Route::get('/empresa/vagas/remove/{id}', 'VagaController@remove')->where('id', '[0-9]+');
Route::get('/empresa/vagas/editar/{id}', 'VagaController@editar')->where('id', '[0-9]+');
Route::get('/empresa/vagas/cadastro', 'VagaController@novo');
Route::post('/empresa/vagas/adiciona', 'VagaController@adiciona');
Route::post('/empresa/vagas/altera', 'VagaController@altera');

Route::get('/empresa/dashboard', function () {
    return view('area-empresa.dashboard.index');
});



//ROTAS ADMINISTRATIVAS

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


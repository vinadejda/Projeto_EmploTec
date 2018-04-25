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

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/sobrenos', function () {
    return view('sobrenos');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Route::middleware(['empresa'])->group(function(){
//group(['middleware' => 'empresa'], function() {
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


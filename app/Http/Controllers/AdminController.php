<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminController extends Controller
{
    
    public function listarAdmin(){
    	//$adm = DB::select('select im_perfil, name, email from users');
    	//return view('/admin/home')->with('adm', $adm);

	//$adm = DB::select( 'select * from users where nl_user = 1');
	//return view('home')->with('adm', $adm);

$adm = DB::table('users')->get();

        return view('listagem', ['adm' => $adm]);
    }

     public function index(){
    	return view('/admin/home');
    }

}

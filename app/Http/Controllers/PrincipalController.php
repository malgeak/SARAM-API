<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(Request $request){
    	$Sesion = false;
    	$Token = $request->input("token", null);
    	if (!is_null($Token)) {
    		$Sesion=true;
    	}
    	return view('Contents.main')->with("Sesion", $Sesion);
    }

    public function servicio(Request $request){
    	return view('Contents.servicio');
    }

    public function galeria(Request $request){
    	return view('Contents.galeria');
    }

    public function contacto(Request $request){
    	return view('Contents.contacto');
    }

    public function acerca(Request $request){
    	return view('Contents.acercade');
    }
}

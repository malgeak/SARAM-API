<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cpanelController extends Controller
{
    public function inicio (Request $request){
    	$result = (new sarv1Controller)->getDatos($request);
    	$result_object = json_decode($result);	
    	$token = $request->header('Authorization'); 
        $jwtAuth = new \JWTAuth();
        $User = $jwtAuth->checkToken($token, true);
        $datos = array (
        	'status'=> $result_object->status,
        	'Estado' => $result_object->Estado,
        	'Nombre'=>  $User->Nombre
        );
    	return view('Cpanel.inicio')->with('resultado', $datos);
    }

    public function contactos(Request $request){
    	$result = (new UserController)->getContactos($request);
    	$result_object = json_decode($result);	
    	if ($result_object->status==1) {
    		return view('Cpanel.contactos')->with('contactos', $result_object->contactos);
    	}else{
    		echo "Error de conexión";
    	}
    }
}

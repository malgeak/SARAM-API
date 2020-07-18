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
        $Motos = (new UserController)->getMotos($request);
        $Motos = json_decode($Motos);
        $datos = array (
        	'status'=> $result_object->status,
        	'Estado' => $result_object->Estado,
        	'Nombre'=>  $User->Nombre
        );
    	return view('Cpanel.inicio')->with(['resultado'=>$datos,
            'Motos' => $Motos->motos]);
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

    public function info(Request $request){
        $result = (new UserController)->getMotos($request);
        $result_object = json_decode($result);  
        if ($result_object->status==1) {
            return view('Cpanel.info')->with('Motos', $result_object->motos);
        }else{
            echo "Error de conexión";
        }
    }


    public function perfil(Request $request){
        $result = (new UserController)->getUser($request);
        $result_object = json_decode($result);  
        return view('Cpanel.perfil')->with('Usuario', $result_object);
    }
}

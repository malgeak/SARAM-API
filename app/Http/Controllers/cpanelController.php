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

    public function email (Request $request){
        $params_array['nombre'] = $request->input("Nombre", null);
        $params_array['correo'] = $request->input("Correo", null);
        $params_array['telefono'] = $request->input("Telefono", null);
        $params_array['mensaje'] = $request->input("Mensaje", null);

        if(!isset($params_array['correo'])){
            if (!isset($params_array['telefono']) || $params_array['telefono']=='undefined') {
             $data = array(
            'status'=>false,
            'Mensaje'=>"Por favor, ingrese al menos un contacto."
            );
            return json_encode($data);    
            }
        }

        $validate = \Validator::make($params_array, [
           'nombre'=>'regex:{^[a-zA-Z ]+$}'
        ]); 
        if ($validate->fails()) {
             $data = array(
            'status'=>false,
            'Mensaje'=>"Nombre invalido, solo se aceptan letras"
            );
            return json_encode($data);    
        }
        if (isset($params_array['correo'])) {
         $validate = \Validator::make($params_array, [
           'correo'=>'email',
        ]); 
        if ($validate->fails()) {
             $data = array(
            'status'=>false,
            'Mensaje'=>"Correo invalido, por favor verifiquelo"
            );
            return json_encode($data);    
        }
        }
        $validate = \Validator::make($params_array, [
           'mensaje'=>'required',
        ]); 
        if ($validate->fails()) {
             $data = array(
            'status'=>false,
            'Mensaje'=>"Escriba su mensaje por favor, nos servirá mucho"
            );
            return json_encode($data);    
        }

        $subject = "Información de contacto";
        $for = "contacto@saram.com";
        \Mail::send('Emails.contacto', $request->all(), function($msj) use($subject, $for){
            $msj->from("saram@saram.com", "Systema Automático SARAM");
            $msj->subject($subject);
            $msj->to($for);
        });
        $data = array(
            'status'=>true,
            'Mensaje'=>"En el menor tiempo posible te contactaremos por alguno de los medios que nos proporcionaste, ¡Gracias!"
        );
        return json_encode($data);
    }
}

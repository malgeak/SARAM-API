<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
class UserController extends Controller
{
    public function registro (Request $request){
        //Recogemos los datos
        $params_array['nombre']= $request->input('Nombre', null);
        $params_array['apellidos']= $request->input('Apellidos', null);
        $params_array['correo']= $request->input('Correo', null);
        $params_array['contrasena']= $request->input('Contrasena', null);
        $params_array['confirmacion']= $request->input('Confirmacion', null);
        //Validar Datos
        $validate = \Validator::make($params_array, [
           'nombre'=>'required|regex:{^[a-zA-Z ]+$}',
           'apellidos'=>'required|regex:{^[a-zA-Z ]+$}', 
           'correo'=>'required|email|unique:usuarios,Correo',
           'contrasena'=>'required', 
        ]); 
        
        if($validate->fails()){
            $data=array(
              'status'=>false,
              'mensaje'=>"Error al registrar el usuario",
              'errores'=>$validate->errors()
            );
        }else{
            //Cifrado de contraseña
            $pwd = hash('sha256', $params_array['contrasena']);
            //Crear Usuario
            $User = new Usuario();
            $User->Nombre = $params_array['nombre'];
            $User->Apellidos = $params_array['apellidos'];
            $User->Correo = $params_array['correo'];
            $User->Contrasena = $pwd;
            $User->save();
            $data=array(
              'status'=>true,
              'mensaje'=>"Usuario registrado exitosamente"
            );
            
        }
        return json_encode($data);
    }
    
    public function login (Request $request){
        //Recogemos los datos
        $params_array['correo']= $request->input('Correo', null);
        $params_array['contrasena']= $request->input('Contrasena', null);
        //Cifrado de contraseña
            $pwd = hash('sha256', $params_array['contrasena']);
        //Validar credenciales
        $user = Usuario::where([
           'Correo'=>$params_array['correo'],
           'Contrasena'=>$pwd
        ])->first();
        if(is_object($user)){
            $data=array(
              'status'=>true,
              'mensaje'=>"Bienvenido"
            );
        }else{
            $data=array(
              'status'=>false,
              'mensaje'=>"Email o contraseña incorrecta, por favor verefique sus datos."
            );
        }
        echo json_encode($data);
    }
}

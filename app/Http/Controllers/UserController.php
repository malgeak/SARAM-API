<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Moto;
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
        //JWT 
        $jwt = new \JWTAuth();
        //Recogemos los datos
        $params_array['correo']= $request->input('Correo', null);
        $params_array['contrasena']= $request->input('Contrasena', null);
        
        $validate = \Validator::make($params_array, [
            "correo" => 'required',
            "contrasena" => 'required'
        ]);
        if($validate->fails()){
            //Validación fallida
            $data = array(
              'status' => false,
              'mensaje' => "Es necesario que ingrese todos los datos"  
            );
        }else{
            //Cifrado de contraseña
            $pwd = hash('sha256', $params_array['contrasena']);
            
            $data = $jwt->credentials($params_array['correo'], $pwd);
        }
        
        
        echo json_encode($data);
    }
    
    public function AddMoto(Request $request){
        //Recibimos parametros.
        $params_array['Modelo']=$request->input('Modelo', null);
        $params_array['Marca']=$request->input('Marca', null);
        $params_array['Cilindraje']=$request->input('Cilindraje', null);
        $params_array['Placa']=$request->input('Placa', null);
        $params_array['SARAM']=$request->input('SARAM', null);
        
        $validate = \Validator::make($params_array, [
           "Modelo" => 'required',
           "Marca" => 'required',
           "Cilindraje" => 'required',
           "Placa" => 'required',
            "SARAM" => 'required'
        ]);
        
        if($validate->fails()){
            $data = array(
              'status' => false,
              'mensaje' => "Es necesario que ingrese todos los datos"  
            );
        }else{
            //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            
            //Validacion placa y SARAM code
            $placa = Moto::where(['Placa'=>$params_array['Placa']])->first();
            $saram = Moto::where(['ID_saram'=>$params_array['SARAM']])->first();
            
            if(is_object($saram)){
                $data = array(
                    'status' => false,
                    'mensaje' => "Codigo SARAM ya utilizado",
                    'variable'  =>  "SARAM"
                    );    
                return json_encode($data);
            }
            if(is_object($placa)){
                $data = array(
                    'status' => false,
                    'mensaje' => "Placa ya registrada",
                    'variable'  =>  "Placa"
                    );    
                return json_encode($data);
            }
            //Instancia de modelo Moto
            $Moto = new Moto();
            $Moto->ID_usuario = $User->sub;
            $Moto->Modelo = $params_array['Modelo'];
            $Moto->Marca = $params_array['Marca'];
            $Moto->Cilindraje = $params_array['Cilindraje'];
            $Moto->Placa = $params_array['Placa'];
            $Moto->ID_saram = $params_array['SARAM'];
            $Moto->save();
            $data=array(
              'status'=>true,
              'mensaje'=>"Moto registrada exitosamente"
            );
        }
        echo json_encode($data);
    }
    public function UpdateMoto(Request $request){
        //Recibimos parametros.
        $params_array['Modelo']=$request->input('Modelo', null);
        $params_array['Marca']=$request->input('Marca', null);
        $params_array['Cilindraje']=$request->input('Cilindraje', null);
        $params_array['Placa']=$request->input('Placa', null);
        $params_array['SARAM']=$request->input('SARAM', null);
        $params_array['ID_Motocicleta'] = $request->input('ID_Moto', null);
        
        $validate = \Validator::make($params_array, [
           "Modelo" => 'required',
           "Marca" => 'required',
           "Cilindraje" => 'required',
           "Placa" => 'required',
           "SARAM" => 'required',
           "ID_Motocicleta" => 'required'
        ]);
        
        
        if($validate->fails()){
            $data = array(
              'status' => false,
              'mensaje' => "Es necesario que ingrese todos los datos",
            );
        }else{
            //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
             //Validacion placa y SARAM code
            $placa = Moto::where(['Placa'=>$params_array['Placa']])
                    ->where('ID_Motocicleta', '<>', $params_array['ID_Motocicleta'])->first();
            $saram = Moto::where(['ID_saram'=>$params_array['SARAM']])
                    ->where('ID_Motocicleta', '<>', $params_array['ID_Motocicleta'])->first();
            
            if(is_object($saram)){
                $data = array(
                    'status' => false,
                    'mensaje' => "Codigo SARAM ya utilizado",
                    'variable'  =>  "SARAM"
                    );    
                return json_encode($data);
            }
            if(is_object($placa)){
                $data = array(
                    'status' => false,
                    'mensaje' => "Placa ya registrada",
                    'variable'  =>  "Placa"
                    );    
                return json_encode($data);
            }
            //Actualización
            Moto::where(
                ['ID_usuario'=>$User->sub,
                'ID_Motocicleta'=>$params_array['ID_Motocicleta']])->update([
                    'Modelo'=>$params_array['Modelo'],
                    'Marca'=>$params_array['Marca'],
                    'Cilindraje'=>$params_array['Cilindraje'],
                    'Placa'=>$params_array['Placa'],
                    'ID_saram'=>$params_array['SARAM']
                ]);
            
            $data=array(
              'status'=>true,
              'mensaje'=>"Moto actualizada exitosamente"
            );
        }
        echo json_encode($data);
    }
    public function getMotos(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
        //Obtenemos todas sus motos
            $Motos = Moto::where(['ID_usuario'=>$User->sub])->get();
            $data=array(
              'status'=>true,
              'motos'=>$Motos
            );
            echo json_encode($data);
    }
    
    public function getUser(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
        //Obtenemos todos los datos
            $Usuario = Usuario::where(['ID_usuario'=>$User->sub])->first();
            echo json_encode($Usuario);
    }
    public function userReady(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
        //Obtenemos todos los datos
            $Usuario = Usuario::where(['ID_usuario'=>$User->sub])->first();
            $Ready = true;
            if (is_null($Usuario->Edad) || is_null($Usuario->Direccion))
                $Ready=false;
            $data = array("ready"=>$Ready);
            echo json_encode($data);
            
    }
}

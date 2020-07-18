<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Generator;
use App\Usuario;
use App\Moto;
use App\Device;
use App\Contactos;

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
            $validar_saram = Device::where(['ID_saram'=>$params_array['SARAM']])->first();
            
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
            if(is_object($validar_saram)){
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
            }else{
            $data=array(
              'status'=>false,
              'mensaje'=>"Codigo Saram invalido"
            );    
            }
        }
        echo json_encode($data);
    }
    public function DeleteMoto(Request $request){
        $params_array['ID_Motocicleta'] = $request->input('ID_Moto', null);
        Moto::where(['ID_Motocicleta'=>$params_array['ID_Motocicleta']])->delete();
        $data = array(
            "status" => true,
            "mensaje"=> "Motocicleta elimnida"
        );
        
        return json_encode($data);
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
            $validar_saram = Device::where(['ID_saram'=>$params_array['SARAM']])->first();
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
            if(is_object($validar_saram)){
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
           }else{
               $data=array(
              'status'=>false,
              'mensaje'=>"Codigo SARAM invalido"
            );
           }
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
            return json_encode($data);
    }
    public function setContactos (Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            
        //Recogemos datos
            $params_array['Nombre']=$request->input('Nombre', null);
            $params_array['Apellidos']=$request->input('Apellidos', null);
            $params_array['Numero_Tel']=$request->input('Numero_Tel', null);
            $params_array['Correo']=$request->input('Correo', null);

            $validate = \Validator::make($params_array, [
           'Nombre'=>'required',
           'Numero_Tel'=>'required', 
            ]);


            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Ingrese los campos con *, son obligatorios"
                ]);
                return json_encode($data);
            }


            $validate = \Validator::make($params_array, [
           'Nombre'=>'regex:{^[a-zA-Z ]+$}',
            ]);

            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Nombre invalido"
                ]);
                return json_encode($data);
            }
            if(!is_null($params_array['Apellidos'])){
            $validate = \Validator::make($params_array, [
           'Apellidos'=>'regex:{^[a-zA-Z ]+$}',
            ]);

            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Apellido invalido"
                ]);
                return json_encode($data);
            }
            }
            if(!is_null($params_array['Correo'])){
            $validate = \Validator::make($params_array, [
           'Correo'=>'email',
            ]);

            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Correo invalido"
                ]);
                return json_encode($data);
            }
            }


        $numero_existe = Contactos::where(["ID_Usuario"=>$User->sub, "Numero_Tel"=>$params_array['Numero_Tel']])->first();
        
        if(is_object($numero_existe)){
            $data = array([
            "status"=>false,
            "mensaje"=>"Contacto ya registrado"
            ]);
            return json_encode($data);
        }
            
        $Contacto = new Contactos();
        $Contacto->ID_Usuario = $User->sub;
        $Contacto->Nombre =  $params_array['Nombre'];
        if(!is_null($params_array['Apellidos']))
              $Contacto->Apellidos = $params_array['Apellidos'];
        $Contacto->Numero_Tel =  $params_array['Numero_Tel'];
        if(!is_null($params_array['Correo']))
            $Contacto->Correo =  $params_array['Correo'];
        $Contacto->save();
        
        $data = array([
            "status"=>true,
            "mensaje"=>"Contacto de emergencia registrado"
        ]);
        
        return json_encode($data);
    }

    public function updateContactos (Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            
        //Recogemos datos
            $params_array['Nombre']=$request->input('Nombre', null);
            $params_array['Apellidos']=$request->input('Apellidos', null);
            $params_array['Numero_Tel']=$request->input('Numero_Tel', null);
            $params_array['Correo']=$request->input('Correo', null);

            $validate = \Validator::make($params_array, [
           'Nombre'=>'required',
           'Numero_Tel'=>'required', 
            ]);


            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Ingrese los campos con *, son obligatorios"
                ]);
                return json_encode($data);
            }


            $validate = \Validator::make($params_array, [
           'Nombre'=>'regex:{^[a-zA-Z ]+$}',
            ]);

            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Nombre invalido"
                ]);
                return json_encode($data);
            }
            if(!is_null($params_array['Apellidos'])){
            $validate = \Validator::make($params_array, [
           'Apellidos'=>'regex:{^[a-zA-Z ]+$}',
            ]);

            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Apellido invalido"
                ]);
                return json_encode($data);
            }
            }
            if(!is_null($params_array['Correo'])){
            $validate = \Validator::make($params_array, [
           'Correo'=>'email',
            ]);

            if ($validate->fails()) {
                $data = array([
                "status"=>false,
                "mensaje"=>"Correo invalido"
                ]);
                return json_encode($data);
            }
            }


        Contactos::where(["ID_Usuario"=>$User->sub, "Numero_Tel"=>$params_array['Numero_Tel']])->update([
            'Nombre'=>$params_array['Nombre'],
            'Apellidos'=>$params_array['Apellidos'],
            'Correo'=> $params_array['Correo']
        ]);
        
        $data = array([
            "status"=>true,
            "mensaje"=>"Contacto de emergencia Actualizado"
        ]);
        
        return json_encode($data);
    }
    
    public function delContactos (Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            
        //Recogemos datos
            $params_array['Numero_Tel']=$request->input('Numero_Tel', null);
            
            Contactos::where(['Numero_Tel'=>$params_array['Numero_Tel'], 
                'ID_Usuario'=>$User->sub])->delete();
            
        $data = array([
            "status"=>true,
            "mensaje"=>"Contacto de emergencia eliminado"
        ]);
        
        return json_encode($data);
    }
    
    public function getContactos (Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            
        //Recogemos datos
            $Contactos = Contactos::where([
                'ID_Usuario'=>$User->sub])->get();
            
        $data = array(
            "status"=>true,
            "contactos"=>$Contactos
        );
        
        return json_encode($data);
    }
    public function getUser(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
        //Obtenemos todos los datos
            $Usuario = Usuario::where(['ID_usuario'=>$User->sub])->first();
            return json_encode($Usuario);
    }
    public function userReady(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
        //Obtenemos todos los datos
            $Usuario = Usuario::where(['ID_usuario'=>$User->sub])->first();
            $Ready = true;
            if (is_null($Usuario->Edad) || is_null($Usuario->Direccion)
                    || is_null($Usuario->Telefono) || is_null($Usuario->Sexo))
                $Ready=false;
            $data = array("ready"=>$Ready);
            echo json_encode($data);
            
    }
    
    public function updateUser (Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            //Recogemos los datos
        $params_array['nombre']= $request->input('Nombre', null);
        $params_array['apellidos']= $request->input('Apellidos', null);
        $params_array['correo']= $request->input('Correo', null);
        $params_array['Edad']= $request->input('Edad', null);
        $params_array['Sexo']= $request->input('Sexo', null);
        $params_array['Direccion']= $request->input('Direccion', null);
        $params_array['Telefono']= $request->input('Telefono', null);
        $params_array['Tipo_Sangre']= $request->input('Tipo_Sangre', null);
        $params_array['Alergias']= $request->input('Alergias', null);
        $params_array['Religion']= $request->input('Religion', null);
        $params_array['Extras']= $request->input('Extras', null);
        //Validar Datos
        $validate = \Validator::make($params_array, [
           'nombre'=>'required|regex:{^[a-zA-Z ]+$}',
           'apellidos'=>'required|regex:{^[a-zA-Z ]+$}', 
           'correo'=>'required|email',
        ]);
           
        if($validate->fails()){
            $data = array(
                "status" => false,
                "mensaje" => "Verifique los campos solicitados",
                "errores" => $validate->errors()
            );
        }else{
        $correo = Usuario::where(["Correo" => $params_array['correo']])
                ->where("ID_usuario", "<>", $User->sub)->first();
        if(is_object($correo)){
            $data = array(
                "status" => false,
                "mensaje" => "Correo ya registrado por otro usuario",
                "Campo" => "Correo"
            );
            return $data;
        }  
        $Usuario= Usuario::where(["ID_usuario"=>$User->sub])->first();
        
        $Usuario->Nombre = $params_array['nombre'];
        $Usuario->Apellidos = $params_array['apellidos'];
        $Usuario->Correo = $params_array['correo'];
        if(!is_null($params_array['Edad'])){
            $validate = \Validator::make($params_array, [
             'Edad' => 'date'
            ]);
            if($validate->fails()){
              $data = array(
                "status" => false,
                "mensaje" => "Fecha con formato invalido",
                "Campo" => "Fecha"
                );
              return $data;
            }
            $Usuario->Edad = $params_array['Edad'];
        }
        if(!is_null($params_array['Sexo']))
            $Usuario->Sexo = $params_array['Sexo'];
        if(!is_null($params_array['Direccion']))
            $Usuario->Direccion = $params_array['Direccion'];
        if(!is_null($params_array['Telefono'])){
            $validate = \Validator::make($params_array, [
             'Telefono' =>  'regex:/^\d{10,13}$/'
            ]);
            if($validate->fails()){
              $data = array(
                "status" => false,
                "mensaje" => "Numero de telefono invalido",
                "Campo" => "Telefono"
                );
              return $data;
            }
            $Usuario->Telefono = $params_array['Telefono'];
        }
        if(!is_null($params_array['Tipo_Sangre']))
            $Usuario->Tipo_sangre = $params_array['Tipo_Sangre'];
        if(!is_null($params_array['Alergias']))
            $Usuario->Alergias = $params_array['Alergias'];
        if(!is_null($params_array['Religion']))
            $Usuario->Religion = $params_array['Religion'];
        if(!is_null($params_array['Extras']))
            $Usuario->Informacion_adicional = $params_array['Extras'];
        
        $Usuario->save();
        $data = array(
            "status" => true,
            "mensaje" => "La actualización de sus datos fué exitosa"
        );
        }
        echo json_encode($data);
    }

    public function QRgenerator (Request $request){
        $token=$request->header('Authorization');
        $Generador = new Generator;
        return $Generador->size(250)->generate($token);        
    }
    public function QRCheck(Request $reqeuest){
         $token = $request->input('Token'); 
         $jwtAuth = new \JWTAuth();
         $Usuario = $jwtAuth->checkToken($token, false);        
         if($Usuario){
            $User = $jwtAuth->checkToken($token, true);        
                $data=array(
                    'status'=>true,
                    'mensaje'=>"Bienvenido",
                    'Token'=>$token,
                    'Nombre'=>$User->Nombre,
                    'Apellidos'=>$User->Apellidos
                );
         }else{
            $data=array(
                    'status'=>false,
                    'mensaje'=>"El codigo QR es invalido"
                );
         }

    }
}

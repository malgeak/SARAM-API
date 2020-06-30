<?php
namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\Usuario;


class JWTAuth{
    public $key;
    
    public function __construct() {
        $this->key = "pKNwktlV&e8w";
    }
    public function credentials($email, $password, $getToken = null){
        //Buscar si existen las credenciales
        $user = Usuario::where([
           'Correo'=>$email,
           'Contrasena'=>$password
        ])->first();
        //Comprobar que las credenciales sean correctas
        $pad = false;
        if(is_object($user))
            $pad = true;
        //Generar token
        if($pad){
            //Datos dentro del token
            $token = array(
                "sub" => $user->ID_usuario,
                "Correo"    => $user->Correo,
                "Nombre"    => $user->Nombre,
                "Apellidos" => $user->Apellidos,
                "iat"       => time(),
                "exp"       => time()+ (7*24*60*60)
            );
            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decode = JWT::decode($jwt, $this->key, ['HS256']);
            //Devolver token o datos codificados.
            if(is_null($getToken)){
                $data=array(
                    'status'=>true,
                    'mensaje'=>"Bienvenido",
                    'Token'=>$jwt,
                    'Nombre'=>$user->Nombre,
                    'Apellidos'=>$user->Apellidos
                );
            }else{
                $data = $decode;
            }
        }else{
             $data=array(
              'status'=>false,
              'mensaje'=>"Email o contraseña incorrecta, por favor verefique sus datos."
            );
        }
        
      return $data;  
    }
    
    public function checkToken($token, $getIdentity = false){
        $auth=false;
        try{
            $decode = JWT::decode($token, $this->key, ['HS256']);      
        }catch (\UnexpectedValueException $e) {
            $auth = false;
        } catch (\DomainException $e){
            $auth = false;
        }
        
        if(!empty($decode) && is_object($decode) && isset($decode->sub)){
            $auth = true;
        }else{
            $auth = false;
        }
        
        if($getIdentity){
            return $decode;
        }
        
        return $auth;
    }
    
}
?>
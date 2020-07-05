<?php
namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\Device;


class TokenDevice{
    public $key;
    
    public function __construct() {
        $this->key = "s1JInCVv3DY";
    }
    public function setToken($ID, $Version){
        //Buscar si existen las credenciales
        $Device = Device::where([
           'ID_saram'=>$ID,
           'Version'=>$Version,
        ])->first();
        //Comprobar que las credenciales sean correctas
        $pad = false;
        if(is_object($Device))
            $pad = true;
        //Generar token
        if($pad){
            //Datos dentro del token
            $token = array(
                "sub" => $Device->ID_saram,
                "Version"    => $Device->Version,
                "iat"    => $Device->created_at
            );
            $jwt = JWT::encode($token, $this->key, 'HS256');
            $data =$jwt;
        }else{
             $data=array(
              'status'=>false,
              'mensaje'=>"Datos incorrectos"
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
        
        if(!empty($decode) && is_object($decode) && isset($decode->sub) &&
                isset($decode->Version) && isset($decode->iat)){
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

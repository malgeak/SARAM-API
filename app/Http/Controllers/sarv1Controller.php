<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moto;
use App\Estado;

class sarv1Controller extends Controller
{
    public function setUpdate(Request $request){
        //TokenSystem
        $token = new \TokenDevice();
        $params_array['ID_saram']= $request->input('ID_saram', null);
        $params_array['Version']= $request->input('Version', null);
        
        $data = $token->setToken($params_array['ID_saram'], $params_array['Version']);
       
        echo json_encode($data);
    }
    
    public function saveDatos(Request $request){
        //Desencriptamos token para obtener información del usuario
            $ID_device = $request->input("vs", null);
            if(!is_null($ID_device)){
        //Recibimos los datos
            $params_array['Estado']=$request->input('ve', null);
            $params_array['Longitud']=$request->input('lon', null);
            $params_array['Latitud']=$request->input('lat', null);
            
        //Comprobar si ya existe registro.
            $Moto = Moto::select("ID_Motocicleta")->where(["ID_saram"=>$ID_device])->first();
            
            $registro = Estado::where(['ID_motocicleta'=>$Moto->ID_Motocicleta])->first();
            
            
            if(is_object($registro)){
                Estado::where(['ID_motocicleta'=>$Moto->ID_Motocicleta])
                        ->update([
                            'Posicion'=>$params_array['Estado'],
                            'longitud'=>$params_array['Longitud'],
                            'latitud' => $params_array['Latitud']]);
            }else{
                $Estado = new Estado();
                $Estado->ID_motocicleta=$Moto->ID_Motocicleta;
                $Estado->Posicion=$params_array['Estado'];
                $Estado->longitud=$params_array['Longitud'];
                $Estado->latitud=$params_array['Latitud'];
                $Estado->save();
            }}
            else{
                echo "Error de autenticación";
            }
    }
    
    public function getDatos(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            $ID_motocicleta = $request->input('ID_motocicleta');
            
            $ID_motos=Moto::select("ID_Motocicleta")->where(['ID_usuario'=>$User->sub, 'ID_Motocicleta' => $ID_motocicleta])->get();
            
            foreach ($ID_motos as $Moto => $ID) {
                $Estado = Estado::where(['ID_motocicleta'=>$ID->ID_Motocicleta])->first();
                if(isset($Estado->Posicion) && !$Estado->Posicion=="1"){
                    $data = array(
                        "status"=>true,
                        "Estado" =>0,
                        "Datos"=>$Estado
                    );
                    return json_encode($data);
                }
            }
            $data = array(
                        "status"=>true,
                        "Estado" =>1
                    );
                    return json_encode($data);
            
    }
    
    public function getUbicacion(Request $request){
        //Desencriptamos token para obtener información del usuario
            $token = $request->header('Authorization'); 
            $jwtAuth = new \JWTAuth();
            $User = $jwtAuth->checkToken($token, true);
            
         //Recibimos los datos
            $params_array['ID_motocicleta']=$request->input('ID_motocicleta', null);
            if(!is_null($params_array['ID_motocicleta'])){
                $Datos = Estado::select(['longitud', 'latitud'])
                        ->where(["ID_motocicleta"=>$params_array['ID_motocicleta']])
                        ->first();
                if(is_object($Datos)){
                $data = array(
                    "status"=> true,
                    "longitud" => $Datos->longitud,
                    "latitud" => $Datos->latitud
                );
                
                return json_encode($data);
                }else{
                    $data = array(
                    "status"=> false,
                    "mensaje"=>"No hay una ubicación de la motocicleta registrada"
                );
                
                return json_encode($data);
                }
            }else{
              $Latitudes = array();
              $Longitudes = array();
              $ID_motos=Moto::select("ID_Motocicleta")->where(['ID_usuario'=>$User->sub])->get();
              foreach ($ID_motos as $Moto => $ID) {
                $Estado = Estado::where(['ID_motocicleta'=>$ID->ID_Motocicleta])->first();
                if(is_object($Estado)){
                    array_push($Latitudes, $Estado->latitud);
                    array_push($Longitudes, $Estado->longitud);
                }
                }
                $data = array(
                    "status"=> true,
                    "longitud" => $Longitudes,
                    "latitud" => $Latitudes
                );
                
                return json_encode($data);
            }
            
    }
}

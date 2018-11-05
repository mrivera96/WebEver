<?php
namespace App\modelo;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;
use App\ApiResponse;
class ModeloUsuarios extends Model {
    protected $table='usuarios';
    public $timestamps = false;

    public static function usuarioExiste($user){
        try{
            $usr = new ModeloUsuarios();

            $usuarios=$usr->where([["nombre_usuario","=",$user],['estado_usuario','=',1]])
                ->orWhere([["id_usuario","=",$user],['estado_usuario','=',1]])->get()->count();


            if( $usuarios>0){
                return new ApiResponse(
                    200,
                    "OK",
                    true
                );
            }else{
                return new ApiResponse(
                    200,
                    "OK",
                    false
                );
            }


        }catch (Exception $e){
            return new ApiResponse(
                500,
                "error en la base de datos",
                null
            );
        }

    }

    public static function obtenerUsuario($usuario){
        try{
            $usr = new ModeloUsuarios();
            if(self::usuarioExiste($usuario)->getContent()){
                $usuarioSalida = $usr->where('id_usuario','=',$usuario)->get();
                return new ApiResponse(200,
                "OK",
                $usuarioSalida
                );
            }else{
                return new ApiResponse(400,
                    "El usuario no existe",
                    null
                );
            }


        }catch (Exception $e){
            return new ApiResponse(500,
                "Error en la base de datos",
                null
            );
        }
    }

    public static function emailExiste($mail){
        try{
            $usr = new ModeloUsuarios();

            $usuarios=$usr->where("correo","=",$mail)->get()->count();


            if( $usuarios>0){
                return new ApiResponse(
                    200,
                    "OK",
                    true
                );
            }else{
                return new ApiResponse(
                    200,
                    "OK",
                    false
                );
            }


        }catch (Exception $e){
            return new ApiResponse(
                500,
                "error en la base de datos",
                null
            );
        }

    }


    public static function crearUsuario($nombre_usuario, $nombre_propio, $correo, $contrasena, $rol){
        if(!self::usuarioExiste($nombre_usuario)->getContent()){
            if(!self::emailExiste($correo)->getContent()){
                $pass = password_hash($contrasena, PASSWORD_DEFAULT);

                try{
                    $usr = new ModeloUsuarios();
                    $insert=array('nombre_usuario'=>$nombre_usuario,
                        'nombre_propio'=>$nombre_propio,
                        'correo'=>$correo,
                        'contrasena'=>$pass,
                        'rol'=>$rol,
                        'estado_usuario'=>1);
                    $usr->insert($insert);
                    return new ApiResponse(
                        200,
                        "Usuario creado correctamente.",
                        null
                    );
                }catch (Exception $e){
                    return new ApiResponse(
                        500,
                        "error en la base de datos",
                        null
                    );
                }
            }else{
                return new ApiResponse(
                    400,
                    "el email ya existe",
                    null
                );
            }


        }else{
            return new ApiResponse(
                400,
                "el usuario ya existe",
                null
            );
        }
    }


        public function eliminarUsuario($id_usua){
            $usr = new ModeloUsuarios();
            try{
                $usuario=$usr->where('id_usuario','=',$id_usua);
                $delete = array("estado_usuario"=>"2");
                $usuario->update($delete);
                return new ApiResponse(
                    200,
                    "Usuario eliminado correctamente.",
                    null
                );

            }catch (Exception $e){
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
            }
        }

        public static function loginUsuario($usuario, $contrasena){

            if(self::usuarioExiste($usuario)->getContent()){
                $usr = new ModeloUsuarios();
                try{
                    $user = $usr ->where([['nombre_usuario','=',$usuario], ['estado_usuario','=',1]])->get()->first();
                    $pass=$user->contrasena;


                    if(password_verify($contrasena,$pass)){
                        $tokenobj = new Token();
                        $token=$tokenobj -> generarToken( $usuario);
                        if($token!=false){
                            $data = JWT::decode($token, Token::getClave(), array('HS256'));
                            return
                                new ApiResponse(
                                    200,
                                    "usuario autenticado con éxito",
                                    array('token' => $token, 'rol' => $data -> rolUsr, 'idUrs' => $data -> idUsuario, 'ste' => $data -> usrSts)
                                );
                        }else{
                            return new ApiResponse(
                                400,
                                "Error en la base de datos",
                                null
                            );
                        }

                    }else{
                        return new ApiResponse(
                            400,
                            "credenciales incorrectas",
                            null
                        );
                    }



                }catch (Exception $e){
                    return new ApiResponse(
                        500,
                        "error en la base de datos",
                        null
                    );
                }
            }else{
                return new ApiResponse(
                    400,
                    "credenciales incorrectas",
                    null
                );
            }


        }


        public function actualizarUsuario($id_usua, $nombre_usua, $nombre_pro, $corr){
            $usr = new ModeloUsuarios();
            try{
                $usuario=$usr->where([['id_usuario','=',$id_usua],['estado_usuario','=',1]]);
                $update = array("nombre_usuario"=>$nombre_usua,
                    "nombre_propio"=>$nombre_pro,
                    "correo"=>$corr);
                $usuario->update($update);
                return new ApiResponse(
                    200,
                    "Usuario actualizado correctamente.",
                    null
                );

            }catch (Exception $e){
                return new ApiResponse(
                    500,
                    "error en la base de datos",
                    null
                );
            }
        }


}
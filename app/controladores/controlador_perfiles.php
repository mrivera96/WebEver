<?php
namespace App\controladores;
use App\modelo\ModeloPerfiles;
use App\controladores\Utilities;
use App\ApiResponse;
use App\modelo\Perfiles;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;
use Slim\Http\UploadedFile;
/******************************************************************************************
 *                              CONFTROLADOR PARA LOS PERFILES                            *
 ******************************************************************************************/
class controladorPerfiles{
    private $upload_directory;
    function __construct($upload_directory) {
        $this->upload_directory = $upload_directory;
    }

    public function listarPerfiles(Request $request,Response  $response){

        $request_data = $request->getParams();
        if(isset($request_data['ctg'])){
            $ctg = $request_data['ctg'];
        }else{
            $ctg=null;
        }
        if(isset($request_data['ste'])){
            $ste = $request_data['ste'];
        }else{
            $ste=null;
        }


        $respuesta = ModeloPerfiles::listarPerfiles($ctg,$ste);


        $response -> write(json_encode($respuesta ->toArray2()));
        return $response ->withHeader('Content-type','application/json')
            ->withStatus($respuesta ->getStatus());


    }

    public function obtenerPerfil(Request $request,Response  $response){
        if(!Utilities::haveEmptyParameters(array('cto'), $request, $response)){
            $request_data = $request->getParams();
            $cto = $request_data['cto'];
            $perf= new ModeloPerfiles() ;
            $respuesta = $perf-> getPerfilPorId($cto);


            $response -> write(json_encode($respuesta ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($respuesta ->getStatus());

        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(400);
        }
    }

    public function buscar(Request $request,Response  $response){
        if(!Utilities::haveEmptyParameters(array('busqueda','categoria','region'), $request, $response)){
            $request_data = $request->getParams();
            $busqueda=$request_data['busqueda'];
            $categoria=$request_data['categoria'];
            $region=$request_data['region'];
            $perf= new ModeloPerfiles() ;
            $respuesta = $perf-> buscarPorFiltros($busqueda, $categoria, $region);

            $response -> write(json_encode($respuesta ->toArray2()));
            return $response ->withHeader('Content-type','application/json')
                ->withStatus($respuesta ->getStatus());

        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(400);
        }
    }

    public function crearPerfil(Request $request,Response $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array(
                'lat_rec','longitud_rec','nomborg_rec','direccion_rec','desc_rec','id_categoria',
                'id_region','id_usuario','id_estado'
            ), $request, $response)){
                define('KB', 1024);
                define('MB', 1048576);
                define('GB', 1073741824);
                define('TB', 1099511627776);
                $request_data = $request->getParsedBody();


                $error_tel=false;
                $error_cel=false;
                $error_mail=false;

                if (!isset($request_data['email_rec']) || empty($request_data['email_rec'])) {

                } else {
                    if (strpos($request_data['email_rec'], "@") === false || strpos($request_data['email_rec'], ".") === false) {
                        $error_mail = true;
                        $err = new ApiResponse(
                            400,
                            "email inválido",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                }

                if (!isset($request_data['numtel_rec']) || empty($request_data['numtel_rec'])) {
                    if (!isset($_POST['numcel_rec']) || empty($_POST['numcel_rec'])) {
                        $error_tel = true;
                        $err = new ApiResponse(
                            400,
                            "Debe ingresar al menos un número telefónico.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                } else {
                    if (strlen($request_data['numtel_rec']) < 8 || strpos($request_data['numtel_rec'],"2")!==0 || strlen($request_data['numtel_rec']) > 8) {
                        $error_tel = true;
                        $err = new ApiResponse(
                            400,
                            "El número telefónico ingresado no es válido.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                }

                if (!isset($request_data['numcel_rec']) || empty($request_data['numcel_rec'])) {
                    if (!isset($request_data['numtel_rec']) || empty($request_data['numtel_rec'])) {
                        $error_cel = true;
                        $err = new ApiResponse(
                            400,
                            "Debe ingresar al menos un número telefónico.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                } else {
                    if (strlen($request_data['numcel_rec']) < 8 || strlen($request_data['numcel_rec']) > 8) {
                        $error_cel = true;
                        $err = new ApiResponse(
                            400,
                            "El número telefónico ingresado no es válido.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                }


                if($error_tel    === false && $error_cel   === false && $error_mail   === false ){
                    $nomborg_rec=$request_data['nomborg_rec'];
                    $numtel_rec=$request_data['numtel_rec'];
                    $numcel_rec=$request_data['numcel_rec'];
                    $direccion_rec=$request_data['direccion_rec'];
                    $email_rec=$request_data['email_rec'];
                    $desc_rec=$request_data['desc_rec'];
                    $id_categoria=$request_data['id_categoria'];
                    $lat_rec=$request_data['lat_rec'];
                    $longitud_rec=$request_data['longitud_rec'];
                    $id_region=$request_data['id_region'];
                    $id_usuario=$request_data['id_usuario'];
                    $id_estado=$request_data['id_estado'];

                    $uploadedFiles = $request->getUploadedFiles();
                    $imagen=$uploadedFiles['imagen'];
                    if($imagen!=null){
                        if($imagen->getSize()>500*KB){
                            $err = new ApiResponse(
                                400,
                                "El tamaño de la imagen excede el límite permitido.",
                                null
                            );
                            $response->write(json_encode($err->toArray()));
                            return $response->withHeader('Content-type', 'application/json')
                                ->withStatus($err->getStatus());
                        }
                        if ($imagen->getError() === UPLOAD_ERR_OK) {
                            $filename = $this->moveUploadedFile($this->upload_directory, $imagen);
                            $ruta_img=$request->getUri()->getBasePath().'/imagenes/'. $filename;
                        }else{
                            $filename=null;
                        }
                    }




                    $resp = Perfiles::crearPerfil(
                        $nomborg_rec, $numtel_rec, $numcel_rec, $direccion_rec, $email_rec,
                        $desc_rec, $id_categoria, $lat_rec, $longitud_rec, $id_region, $id_usuario,
                        $id_estado, $ruta_img);

                    $response->write(json_encode($resp->toArray()));
                    return $response->withHeader('Content-type', 'application/json')
                        ->withStatus($resp->getStatus());
                }
            }else{
                return $response -> withHeader('Content-type','application/json')
                    -> withStatus(400);
            }
        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(401);
        }


    }

    function moveUploadedFile($directory, UploadedFile $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }

    public function eliminarPerfil(Request $request,Response $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('cto'), $request, $response)){
                $request_data = $request->getParsedBody();
                $id=$request_data['cto'];
                $resp=Perfiles::eliminarPerfil($id);
                $response->write(json_encode($resp->toArray()));
                return $response->withHeader('Content-type', 'application/json')
                    ->withStatus($resp->getStatus());
            }else{
                return $response -> withHeader('Content-type','application/json')
                    -> withStatus(400);
            }
        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(401);
        }
    }

    public function actualizarPerfil(Request $request,Response $response){
        if(!Utilities::verificaToken($request,$response)){
            if(!Utilities::haveEmptyParameters(array('cto','lat_rec','longitud_rec','nomborg_rec','direccion_rec','desc_rec','id_categoria',
                'id_region'), $request, $response)){
                $request_data = $request->getParsedBody();
                define('KB', 1024);
                define('MB', 1048576);
                define('GB', 1073741824);
                define('TB', 1099511627776);

                $error_tel=false;
                $error_cel=false;
                $error_mail=false;

                if (!isset($request_data['email_rec']) || empty($request_data['email_rec'])) {

                } else {
                    if (strpos($request_data['email_rec'], "@") === false || strpos($request_data['email_rec'], ".") === false) {
                        $error_mail = true;
                        $err = new ApiResponse(
                            400,
                            "email inválido",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                }

                if (!isset($request_data['numtel_rec']) || empty($request_data['numtel_rec'])) {
                    if (!isset($_POST['numcel_rec']) || empty($_POST['numcel_rec'])) {
                        $error_tel = true;
                        $err = new ApiResponse(
                            400,
                            "Debe ingresar al menos un número telefónico.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                } else {
                    if (strlen($request_data['numtel_rec']) < 8 || strpos($request_data['numtel_rec'],"2")!==0 || strlen($request_data['numtel_rec']) > 8) {
                        $error_tel = true;
                        $err = new ApiResponse(
                            400,
                            "El número telefónico ingresado no es válido.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                }

                if (!isset($request_data['numcel_rec']) || empty($request_data['numcel_rec'])) {
                    if (!isset($request_data['numtel_rec']) || empty($request_data['numtel_rec'])) {
                        $error_cel = true;
                        $err = new ApiResponse(
                            400,
                            "Debe ingresar al menos un número telefónico.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                } else {
                    if (strlen($request_data['numcel_rec']) < 8 || strlen($request_data['numcel_rec']) > 8) {
                        $error_cel = true;
                        $err = new ApiResponse(
                            400,
                            "El número telefónico ingresado no es válido.",
                            null
                        );
                        $response->write(json_encode($err->toArray()));
                        return $response->withHeader('Content-type', 'application/json')
                            ->withStatus($err->getStatus());
                    }
                }


                if($error_tel    === false && $error_cel   === false && $error_mail   === false ){
                    $nomborg_rec=$request_data['nomborg_rec'];
                    $numtel_rec=$request_data['numtel_rec'];
                    $numcel_rec=$request_data['numcel_rec'];
                    $direccion_rec=$request_data['direccion_rec'];
                    $email_rec=$request_data['email_rec'];
                    $desc_rec=$request_data['desc_rec'];
                    $id_categoria=$request_data['id_categoria'];
                    $lat_rec=$request_data['lat_rec'];
                    $longitud_rec=$request_data['longitud_rec'];
                    $id_region=$request_data['id_region'];
                    $id_cto=$request_data['cto'];


                    $uploadedFiles = $request->getUploadedFiles();
                    $imagen=$uploadedFiles['imagen'];
                    if($imagen!=null){
                        if($imagen->getSize()>500*KB){
                            $err = new ApiResponse(
                                400,
                                "El tamaño de la imagen excede el límite permitido.",
                                null
                            );
                            $response->write(json_encode($err->toArray()));
                            return $response->withHeader('Content-type', 'application/json')
                                ->withStatus($err->getStatus());
                        }
                        if ($imagen->getError() === UPLOAD_ERR_OK) {
                            $filename = $this->moveUploadedFile($this->upload_directory, $imagen);
                            $ruta_img=$request->getUri()->getBasePath().'/imagenes/'. $filename;
                        }else{
                            $filename=null;
                        }
                    }


                    $resp = Perfiles::actualizarPerfil(
                        $nomborg_rec, $numtel_rec, $numcel_rec, $direccion_rec, $email_rec,
                        $desc_rec, $id_categoria, $lat_rec, $longitud_rec, $id_region, $ruta_img,
                        $id_cto);

                    $response->write(json_encode($resp->toArray()));
                    return $response->withHeader('Content-type', 'application/json')
                        ->withStatus($resp->getStatus());
                }
            }
        }

    }

    public function gestionarSolicitud(Request $request,Response $response){
        if(!Utilities::verificaToken($request,$response)){
            if($_SESSION['rol']==1){
                if(!Utilities::haveEmptyParameters(array('cto','opr'), $request, $response)){
                    $request_data = $request->getParsedBody();

                    $resp = Perfiles::gestionarSolicitud($request_data['cto'],$request_data['opr']);

                    $response->write(json_encode($resp->toArray()));
                    return $response->withHeader('Content-type', 'application/json')
                        ->withStatus($resp->getStatus());
                }else{
                    return $response -> withHeader('Content-type','application/json')
                        -> withStatus(400);
                }
            }else{
                return $response -> withHeader('Content-type','application/json')
                    -> withStatus(401);
            }

        }else{
            return $response -> withHeader('Content-type','application/json')
                -> withStatus(401);
        }

    }
}

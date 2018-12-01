<?php

namespace App\controladores;
use Slim\Http\Response as Response;
use Slim\Http\Request as Request;
class controladorVistas{
    private $container=null;
    public function __construct($container){
        $this->container=$container;
    }

    public function index(Request $request,Response $response){
        return $this->container->renderer->render($response, "/inicio.php");
    }

    public function acercade(Request $request,Response $response){
        return $this->container->renderer->render($response, "/acercadeweb.php");
    }
    public function resultados(Request $request,Response $response){
        return $this->container->renderer->render($response, "/resultado_busqueda.php");
    }
    public function perfiles(Request $request,Response $response){
        return $this->container->renderer->render($response, "/listaDeContactos.php");
    }
    public function perfil(Request $request,Response $response){
        return $this->container->renderer->render($response, "/PerfilOrganizacion.php");
    }
    public function mapa(Request $request,Response $response){
        return $this->container->renderer->render($response, "/mapa.php");
    }
    public function registro(Request $request,Response $response){
        return $this->container->renderer->render($response, "/registrarCuentaUsuario.php");
    }
    public function login(Request $request,Response $response){
        switch($this->redirectionLogin()){
            case 0:
                return $this->container->renderer->render($response, "/login.php");
                break;
            case 1:
                return $response->withHeader('Location','usuarios');
                break;
            case 2:
                return $response->withHeader('Location','panelControlCliente');
                break;

        };
    }
    public function usuarios(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/mostrar_usuarios.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function nuevoUsuario(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/formulario_registro.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function editarUsuario(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/editar_usuarios.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function administrarPerfiles(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/administracion-de-perfiles.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function nuevoPerfilAdmin(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/nuevo-perfil.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function editarPerfilAdmin(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/editar-perfil.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function solicitudesNuevas(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/nuevas-solicitudes.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function solicitudesRechazadas(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/solicitudes-rechazadas.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function perfilesEliminados(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $this->container->renderer->render($response, "/perfiles-eliminados.php");
                break;
            case 2:
                return $response ->withHeader('Location','inicio');
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function panelControlCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/contactosUsuario.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function contactosAprobadosCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/contactosUsuarioAprobado.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function contactosEliminadosCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/contactosUsuarioEliminado.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function contactosPendientesCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/contactosUsuariosPendientes.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function editarUsuarioCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/editarUsuarioNormal.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function editarPerfilCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/edicionDePerfilUsuarioNormal.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }
    public function nuevoPerfilCliente(Request $request,Response $response){
        switch ($this->verificarLogin()){
            case 1:
                return $response ->withHeader('Location','inicio');
                break;
            case 2:
                return $this->container->renderer->render($response, "/nuevoContacto.php");
                break;
            case 0:
                return $response ->withHeader('Location','inicio');
                break;
        }
    }

    /**
     * **************************************************************************************
     *              función de redirección del login                                        *
     * **************************************************************************************
     **/
    function redirectionLogin(){
        if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {

            if (($_SESSION['rol'] == 2)) {
                return 2;
            } else if (($_SESSION['rol'] == 1)) {
                return 1;
            }
        }else{
            return 0;
        }

    }
    /**
     * **************************************************************************************
     *                            FUNCIÓN QUE VERIFICA SI ESTÁ LOGUEADO                     *
     * **************************************************************************************
     **/
    function verificarLogin(){
        if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
            if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
                return 1;
            }else if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
                return 2;
            }
        }else{
            return 0;
        }
    }

}
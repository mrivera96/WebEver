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

        if (!isset($titulo) || empty($titulo)) {
            $titulo = 'Agenda Electroníca Oriental';
        }
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>true];
        return $this->container->renderer->render($response, "inicio.twig",$params);
    }

    public function acercade(Request $request,Response $response){
        $titulo = 'Acerca de....';
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>false
        ];
        return $this->container->renderer->render($response, "/acercadeweb.twig",$params);
    }
    public function resultados(Request $request,Response $response){
        $titulo = 'Resultado de búsqueda';
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>true,
            'busqueda'=>$request->getParam('busqueda'),
            'region'=>$request->getParam('region'),
            'categoria'=>$request->getParam('categoria')
        ];
        return $this->container->renderer->render($response, "/resultado_busqueda.twig",$params);
    }
    public function perfiles(Request $request,Response $response){
        $titulo = 'Lista de Contactos';
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>true,
            'cty'=>$request->getParam('cty'),
            'name_cty'=>$request->getParam('name_cty')];
        return $this->container->renderer->render($response, "/listaDeContactos.twig",$params);
    }
    public function perfil(Request $request,Response $response){
        $titulo = 'Perfil de Contacto';
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>true,
            'cto'=>$request->getParam('cto')
            ];
        return $this->container->renderer->render($response, "/PerfilOrganizacion.twig",$params);
    }
    public function mapa(Request $request,Response $response){
        $titulo = 'Ubicación';
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>false,
            'numct'=>$request->getParam('numct')
        ];
        return $this->container->renderer->render($response, "/mapa.twig",$params);
    }
    public function registro(Request $request,Response $response){
        $titulo = 'Formulario de  Registro';
        $params=['titulo'=>$titulo,
            'rol'=>$this->verificarLogin(),
            'buscador'=>false,
        ];
        return $this->container->renderer->render($response, "/registrarCuentaUsuario.twig",$params);
    }
    public function login(Request $request,Response $response){
        switch($this->redirectionLogin()){
            case 0:
                $titulo = 'Acceder a la cuenta';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/login.twig",$params);
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
                $titulo = 'Usuarios';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/mostrar_usuarios.twig",$params);
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
                $titulo = 'Formulario de Registro';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/formulario_registro.twig",$params);
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
                $titulo = 'Edición de Cuenta';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'usuario'=>$request->getParam('usuario'),
                    'id_logueado'=>$_SESSION['idUrs']
                ];
                return $this->container->renderer->render($response, "/editar_usuarios.twig",$params);
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
                $titulo = "Administración de Perfiles";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/administracion-de-perfiles.twig",$params);
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
                $titulo = "Nuevo Perfil";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/nuevo-perfil.twig",$params);
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
                $titulo = "Edición de Perfil";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'cto'=>$request->getParam('cto')
                ];
                return $this->container->renderer->render($response, "/editar-perfil.twig",$params);
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
                $titulo = "Nuevas Solicitudes";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/nuevas-solicitudes.twig",$params);
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
                $titulo = "Solicitudes Rechazadas";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/solicitudes-rechazadas.twig",$params);
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
                $titulo = "Perfiles Eliminados";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/perfiles-eliminados.twig",$params);
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
                $titulo = 'Contactos';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                ];
                return $this->container->renderer->render($response, "/contactosUsuario.twig",$params);
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
                $titulo = 'Contactos Aprobados';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'id_logueado'=>$_SESSION['idUrs']
                ];
                return $this->container->renderer->render($response, "/contactosUsuarioAprobado.twig",$params);
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
                $titulo = 'Contactos Pendientes';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'id_logueado'=>$_SESSION['idUrs']
                ];
                return $this->container->renderer->render($response, "/contactosUsuariosPendientes.twig",$params);
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
                $titulo = 'Edición de Cuenta';
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'id_logueado'=>$_SESSION['idUrs']
                ];
                return $this->container->renderer->render($response, "/editarUsuarioNormal.twig",$params);
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
                $titulo = "Edición de Perfil";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'cto'=>$request->getParam('cto')
                ];
                return $this->container->renderer->render($response, "/edicionDePerfilUsuarioNormal.twig",$params);
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
                $titulo = "Nuevo Perfil";
                $params=['titulo'=>$titulo,
                    'rol'=>$this->verificarLogin(),
                    'buscador'=>false,
                    'id_usuario'=>$_SESSION['idUrs']
                ];
                return $this->container->renderer->render($response, "/nuevoContacto.twig",$params);
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
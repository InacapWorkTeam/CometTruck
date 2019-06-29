<?php

    /**
     * Clase paginas hereda de Controlador para poder
     * operar con las vistas y modelos corrrespondientes.
     * Esta clase contiene los metodos principales que se utilizaran
     * para la funcionalidad del sistema.
     */
    class paginas extends Controlador{
        
        /**
         * Constructor por defecto donde ese generara un nuevo
         * objeto modelo Persona, para utilizar los metodos
         */
        public function __construct() {

            $this->usuarioModelo = $this->modelo('Persona'); 
            $this->recolectorModelo = $this->modelo('Persona');       
            $this->adminModelo = $this->modelo('Persona');
            $this->solicitudModelo = $this->modelo('Solicitud');
            $this->moderadorModelo = $this->modelo('Moderador');
        }

        /**
         * Metodo para mostrar el contenido de la pagina inicio
         * de la pagina web.
         */
        public function index() {

            //$usuarios = $this->usuarioModelo->obtenerUsuarios(); // se obtienen los usuarios

            //$datos = [
            //   'usuarios' => $usuarios  
            //];
            //$this->vista('paginas/inicio', $datos); // se carga la vista con los datos
          
            $this->vista('paginas/inicio');
            
            
        }

        /**
         * Metodo para mostrar el contenido de las ofertas
         * de la pagina web.
         */
        public function oferta() {
            $this->vista('paginas/oferta'); // se carga la vista
        }

         /**
         * Metodo para realizar el inicio de sesion
         */
        public function login() {
             // validacion si se envio el formulario     
             if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'cuenta' => trim($_POST['cuenta']),
                    'rut' => trim($_POST['rut']),
                    'contrasena' => trim($_POST['contrasena'])
                ];
                if(strtoupper($datos['cuenta']) == 'USUARIO') {
                     // se evalua si se encontraron resultados
                    if($this->usuarioModelo ->obtenerUsuarioId($datos) > 0){
                        session_start(); 
                        $usuarios = $this->usuarioModelo->obtenerUsuarioId($datos); // se obtienen los usuarios
                        $_SESSION['usuario'] = $usuarios->Nombre;
                        $_SESSION['idUser'] = $usuarios->ID_Usuario; 
                        
                        $this->vista('paginas/inicioUsuario');
                        
                    }// se buscan coincidencias con el recolector

                }elseif(strtoupper($datos['cuenta']) == 'RECOLECTOR'){
                    if($this->recolectorModelo ->obtenerRecolectorId($datos) > 0){
                        session_start(); 
                        $recolector = $this->recolectorModelo->obtenerRecolectorId($datos); // se obtienen los recolectores
                        $_SESSION['recolector'] = $recolector->Nombre;
                        $_SESSION['idRec'] = $recolector->ID_Recolector;
                        $this->vista('paginas/inicioRecolector');
                    }
                }elseif(strtoupper($datos['cuenta']) == 'ADMINISTRADOR'){
                    if($this->adminModelo ->obtenerAdminId($datos) > 0){
                        session_start(); 
                        $administrador = $this->adminModelo->obtenerAdminId($datos); // se obtienen los administradores
                        $_SESSION['administrador'] = $administrador->Nombre;
                        $_SESSION['idAdmin'] = $administrador->ID_Administrador;
                        $usuarios = $this->adminModelo->obtenerUsuarios(); // se obtienen los usuarios
                        $datos = [
                        'usuarios' => $usuarios  
                        ];
                        
                        $this->vista('paginas/inicioAdmin', $datos);
                    }
                }elseif(strtoupper($datos['cuenta']) == 'MODERADOR'){
                    if($this->moderadorModelo ->obtenerModId($datos) > 0){
                        session_start(); 
                        $moderador = $this->moderadorModelo->obtenerModId($datos); // se obtienen los administradores
                        $_SESSION['moderador'] = $moderador->Nombre;
                        $_SESSION['idMod'] = $moderador->ID_Moderador;
                        $solicitudes = $this->solicitudModelo->obtenerSolicitudesRevision(); // se obtienen los usuarios
                        $datos = [
                        'solicitudes' => $solicitudes  
                        ];
                        
                        $this->vista('paginas/inicioMod', $datos);
                    }
                }
                else {
                    $datos = [
                        'mensaje' => '*Datos incorrectos*'
                    ];
                    $this->vista('paginas/login', $datos);
                }
            }
            else{ // si no se dejan los datos en blanco y se carga de nuevo el formulario
                $datos = [
                    'cuenta' => '',
                    'rut' => '',
                    'contrasena' => ''
                ];
                $this->vista('paginas/login', $datos); // se carga la vista
            }
        }

        /**
         * Metodo para utilizar en el boton logo
         * con la finalizad de refireccionar
         * al inicio del recolector
         */
        public function inicioRec(){
            $this->vista('paginas/inicioRecolector');
        }

        /**
         * Metodo para utilizar en el boton logo
         * con la finalizad de refireccionar
         * al inicio del usuario
         */
        public function inicioUse(){
            $this->vista('paginas/inicioUsuario');
        }

        /**
         * Metodo para utilizar en el boton logo
         * con la finalizad de refireccionar
         * al inicio del Administrador
         */
        public function inicioAdmin(){

            $usuarios = $this->adminModelo->obtenerUsuarios(); // se obtienen los usuarios
            $datos = [
            'usuarios' => $usuarios  
            ];
            
            $this->vista('paginas/inicioAdmin', $datos);// se carga la vista con los datos
        
        }

        /**
         * Metodo para cargar la vista del moderador
         * con las solicitudes pendientes de revision
         */
        public function inicioMod(){
            
            $solicitudes = $this->solicitudModelo->obtenerSolicitudesRevision(); // se obtienen los usuarios
            $datos = [
            'solicitudes' => $solicitudes  
            ];
            
            $this->vista('paginas/inicioMod', $datos);// se carga la vista con los datos
        
        }

        /**
         * Metodo para cerrar sesion
         */
        public function cerrarSesion() {
            $this->vista('paginas/cerrarSesion');
        }

        /**
         * Metodo para cargar la vista de registro de cuenta
         */
        public function registrarse() {
            $this->vista('paginas/registrarse');
        }

        /**
         * Metodo para recuperar los datos del formulario llenado
         * por el usuario, para utilizar el metodo agregarUsuario()
         * de la clase persona para guardarlo en la base de datos
         */
        public function formusuario() {
               // validacion si se envio el formulario     
               if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'rut' => trim($_POST['rut']),
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'fechaNacimiento' => trim($_POST['fechaNacimiento']),
                    'telefono' => trim($_POST['telefono']),
                    'email' => trim($_POST['email']),
                    'contrasena' => trim($_POST['contrasena']),
                    'estado' => 1
                ];

                // se evalua si existe el metodo agregar usuario
                if($this->usuarioModelo ->agregarUsuario($datos)) {
                    redireccionar('paginas/formusuario');
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ // si no se dejan los datos en blanco y se carga de nuevo el formulario
                $datos = [
                    'rut' => '',
                    'nombre' => '',
                    'apellido' => '',
                    'fechaNacimiento' => '',
                    'telefono' => '',
                    'email' => '',
                    'contrasena' => ''
                ];
                $this->vista('paginas/formusuario',$datos);
            }
            
        }

        /**
         * Metodo para recuperar los datos del formulario llenado
         * por el recolector, para utilizar el metodo agregarRecolector()
         * de la clase persona para guardarlo en la base de datos
         */
        public function formrecolector() {
            // validacion si se envio el formulario     
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

             $datos = [
                 'rut' => trim($_POST['rut']),
                 'nombre' => trim($_POST['nombre']),
                 'apellido' => trim($_POST['apellido']),
                 'fechaNacimiento' => trim($_POST['fechaNacimiento']),
                 'telefono' => trim($_POST['telefono']),
                 'email' => trim($_POST['email']),
                 'contrasena' => trim($_POST['contrasena']),
                 'estado' => 1
             ];

             // se evalua si existe el metodo agregar usuario
             if($this->recolectorModelo ->agregarRecolector($datos)) {
                redireccionar('paginas/registrarse');
             }
             else {
                 die('Algo salio mal');
             }
         }
         else{ // si no se dejan los datos en blanco y se carga de nuevo el formulario
             $datos = [
                 'rut' => '',
                 'nombre' => '',
                 'apellido' => '',
                 'fechaNacimiento' => '',
                 'telefono' => '',
                 'email' => '',
                 'contrasena' => ''
             ];
             $this->vista('paginas/formrecolector',$datos);
         }
         
     } // fin agregar recolector

        /**
         * Metodo para cargar la vista de ofertar 
        * una solicitud por parte del recolector
        */
        public function ofertarRecolector() {
            $this->vista('paginas/ofertarRecolector');
        } // ofertar recolector

        /**
         * Metodo para subir la oferta realizada
         * por el recolector
         */
        public function subirOferta() {

            $this->ofertaModelo = $this->modelo('Oferta');
             // validacion si se envio el formulario     
             if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'nombre' => trim($_POST['nombre']),
                    'precio' => trim($_POST['precio']),
                    'fecha' => trim($_POST['fecha']),
                    'estado' => 1,
                    'id_solicitud' => trim($_POST['id_solicitud']),
                    'id_recolector' => trim($_POST['id_recolector']),
                    'nombreRecolector' => trim($_POST['nombreRecolector'])
                ];
   
                // se evalua si existe el metodo insertarOferta 
                if($this->ofertaModelo ->insertarOferta($datos)) {
                   $this->vista('paginas/oferta');
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ // si no se dejan los datos en blanco y se carga de nuevo el formulario
                $datos = [
                    'nombre' => '',
                    'precio' => '',
                    'fecha' => '',
                    'estado' => '',
                    'id_solicitud' => '',
                    'id_recolector' => '',
                    'nombreRecolector' => ''
                ];
                $this->vista('paginas/ofertarRecolector');
            }
        } // fun subir oferta

        /**
         * Funcion para realizar una modificacion
         * hacia un usuario, la cual sera implementada en
         * un futuro por el administrador pa la gestion de cuentas
         * @param $id procedente del usuario
         */
        public function editar($id) {
            $paginamodelo = new paginas();
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'id_usuario' => $id,
                    'rut' => trim($_POST['rut']),
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'fechaNacimiento' => trim($_POST['fechaNacimiento']),
                    'telefono' => trim($_POST['telefono']),
                    'email' => trim($_POST['email']),
                    'contrasena' => trim($_POST['contrasena']),
                    'estado' => trim($_POST['estado'])
                ];

                // se evalua si existe el metodo agregar usuario
                if($this->usuarioModelo ->actualizarUsuario($datos)) {
                    $paginamodelo->inicioAdmin();
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ 
                // se obtiene la informacion de usuario desde el modelo
                $usuario = $this->usuarioModelo->obtenerUsuario($id);

                $datos = [
                    'id_usuario' => $usuario->ID_Usuario,
                    'rut' => $usuario->Rut,
                    'nombre' => $usuario->Nombre,
                    'apellido' => $usuario->Apellido,
                    'fechaNacimiento' => $usuario->Fecha_Nacimiento,
                    'telefono' => $usuario->Telefono,
                    'email' => $usuario->Email,
                    'contrasena' => $usuario->Contrasena,
                    'estado' => $usuario->Estado
                ];

                $this->vista('paginas/editar', $datos);
            }
        }

        /**
         * Funcion para dar de baja un usuario, en un futuro
         * sera implementado por administrador pa la
         * gestion de cuentas.
         * @param $id del usuario
         */
        public function eliminar($id) {
    
            $paginamodelo = new paginas();
            // se obtiene la informacion del usuario desde el modelo
            $usuario = $this->usuarioModelo->obtenerUsuario($id);

            $datos = [
                'id_usuario' => $usuario->ID_Usuario
            ];
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') { // si se envian los datos
                
                $datos = [
                    'id_usuario' => $id
                ];
                
                if($this->usuarioModelo->eliminarUsuarioLog($datos)) {
                    $paginamodelo->inicioAdmin();
                }
                else {
                    die('Algo salio mal');
                }
            }else {
                $this->vista('paginas/eliminar', $datos);
            }
            
        }

        /**
         * Funcion para realizar una modificacion
         * hacia un usuario, la cual sera implementada en
         * un futuro por el administrador pa la gestion de cuentas
         * @param $id procedente del usuario
         */
        public function editarRecolector($id) {
            $paginamodelo = new paginas();
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'id_recolector' => $id,
                    'rut' => trim($_POST['rut']),
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'fechaNacimiento' => trim($_POST['fechaNacimiento']),
                    'telefono' => trim($_POST['telefono']),
                    'email' => trim($_POST['email']),
                    'contrasena' => trim($_POST['contrasena']),
                    'estado' => trim($_POST['estado'])
                ];

                // se evalua si existe el metodo agregar usuario
                if($this->recolectorModelo ->actualizarRecolector($datos)) {
                    $paginamodelo->admRecolector();
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ 
                // se obtiene la informacion de usuario desde el modelo
                $recolector = $this->recolectorModelo->obtenerRecolector($id);

                $datos = [
                    'id_recolector' => $recolector->ID_Recolector,
                    'rut' => $recolector->Rut,
                    'nombre' => $recolector->Nombre,
                    'apellido' => $recolector->Apellido,
                    'fechaNacimiento' => $recolector->Fecha_Nacimiento,
                    'telefono' => $recolector->Telefono,
                    'email' => $recolector->Email,
                    'contrasena' => $recolector->Contrasena,
                    'estado' => $recolector->Estado
                ];

                $this->vista('paginas/editarRecolector', $datos);
            }
        }

        /**
         * Funcion para dar de baja un usuario, en un futuro
         * sera implementado por administrador pa la
         * gestion de cuentas.
         * @param $id del usuario
         */
        public function eliminarRecolector($id) {
    
            $paginamodelo = new paginas();
            // se obtiene la informacion del usuario desde el modelo
            $recolector = $this->recolectorModelo->obtenerRecolector($id);

            $datos = [
                'id_recolector' => $recolector->ID_Recolector
            ];
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') { // si se envian los datos
                
                $datos = [
                    'id_recolector' => $id
                ];
                
                if($this->recolectorModelo->eliminarRecolectorLog($datos)) {
                    $paginamodelo->admRecolector();
                }
                else {
                    die('Algo salio mal');
                }
            }else {
                $this->vista('paginas/eliminarRecolector', $datos);
            }
            
        }

        /**
         * Funcion para realizar una modificacion
         * hacia un moderador, la cual sera implementada en
         * por el administrador pa la gestion de cuentas
         * @param $id procedente del moderador
         */
        public function editarModerador($id) {
            $paginamodelo = new paginas();
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'id_moderador' => $id,
                    'rut' => trim($_POST['rut']),
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'email' => trim($_POST['email']),
                    'contrasena' => trim($_POST['contrasena']),
                    'estado' => trim($_POST['estado'])
                ];

                // se evalua si existe el metodo agregar usuario
                if($this->moderadorModelo ->actualizarModerador($datos)) {
                    $paginamodelo->admModerador();
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ 
                // se obtiene la informacion de usuario desde el modelo
                $moderador = $this->moderadorModelo->obtenerModerador($id);

                $datos = [
                    'id_moderador' => $moderador->ID_Moderador,
                    'rut' => $moderador->Rut,
                    'nombre' => $moderador->Nombre,
                    'apellido' => $moderador->Apellido,
                    'email' => $moderador->Email,
                    'contrasena' => $moderador->Contrasena,
                    'estado' => $moderador->Estado
                ];

                $this->vista('paginas/editarModerador', $datos);
            }
        }

        /**
         * Funcion para dar de baja a un moderador, el cual
         * sera implementado por administrador para la
         * gestion de cuentas.
         * @param $id del moderador
         */
        public function eliminarModerador($id) {
    
            $paginamodelo = new paginas();
            // se obtiene la informacion del usuario desde el modelo
            $moderador = $this->moderadorModelo->obtenerModerador($id);

            $datos = [
                'id_moderador' => $moderador->ID_Moderador
            ];
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') { // si se envian los datos
                
                $datos = [
                    'id_moderador' => $id
                ];
                
                if($this->moderadorModelo->eliminarModeradorLog($datos)) {
                    $paginamodelo->admModerador();
                }
                else {
                    die('Algo salio mal');
                }
            }else {
                $this->vista('paginas/eliminarModerador', $datos);
            }
            
        }
        
       /**
        * Metodo para cargar la vista con los recolectores
        * obtenidos por medio de una tabla.
        */
        public function admRecolector() {
            $recolectores = $this->recolectorModelo->obtenerRecolectores(); // se obtienen los usuarios
            $datos = [
            'recolectores' => $recolectores  
            ];
            
            $this->vista('paginas/tablaRecolectores', $datos); // se carga la vista con los datos
        }

       /**
        * Metodo para cargar la vista con los moderadores
        * obtenidos por medio de una tabla.
        */
        public function admModerador() {
            $moderadores = $this->moderadorModelo->obtenerModeradores(); // se obtienen los usuarios
            $datos = [
            'moderadores' => $moderadores  
            ];
            
            $this->vista('paginas/tablaModeradores', $datos); // se carga la vista con los datos
        }

        /**
         * Metodo para obtener el listado de notificaciones
         * correspondientes al moderador
         */
        public function notificacionMod() {

        }

        /**
         * Metodo para revisar las solicitudes de afiliacion
         * de los recolectores.
         */
        public function modRecolector() {
            $recolectores = $this->recolectorModelo->obtenerRecolectores(); // se obtienen los recolectores
            $datos = [
            'recolectores' => $recolectores  
            ];
            
            $this->vista('tablaRecolectores', $datos); // se carga la vista con los datos
        }
        
        /**
         * Metodo para validar las publicaciones
         * revisadas por el moderador, una vez validada
         * se genera una notificacion al usuario indicando
         * la revision.
         */
        public function validarSolicitud($id_solicitud, $id_usuario) {
            $paginamodelo = new paginas();
            if($this->moderadorModelo->validarSolicitud($id_solicitud)) {
                if($this->moderadorModelo->enviarNotificacionUsuario($id_solicitud, $id_usuario)) {
                    $paginamodelo->inicioMod();
                }
            }
            else {
                $paginamodelo->inicioMod();
            }
        } 

        /**
         * Metodo para advertir de algun error en la 
         * publicacion del usuario.
         */
        public function advertirUsuario($id_solicitud) {
            $paginamodelo = new paginas();
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'id_solicitud' => $id_solicitud,
                    'id_usuario' => trim($_POST['id_usuario']),
                    'comentario' => trim($_POST['comentario'])
                ];

                // se evalua si existe el metodo agregar usuario
                if($this->moderadorModelo ->advertirUsuario($datos)) {
                    $paginamodelo->inicioMod();
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ 
                // se obtiene la informacion de usuario desde el modelo
                $solicitudAdvertencia = $this->solicitudModelo->obtenerSolicitudAdvertencia($id_solicitud);

                $datos = [
                    'id_solicitud' => $solicitudAdvertencia->ID_Solicitud,
                    'id_usuario' => $solicitudAdvertencia->ID_Usuario,
                    'id_comentario' => ''
                ];

                $this->vista('paginas/advertirUsuario', $datos);
            }
        }

        /**
         * Metodo para advertir al administrador
         * sobre una cuenta problematica, para que
         * este bloquee al usuario.  
         */
        public function advertirAdministrador($id_solicitud) {
            $paginamodelo = new paginas();
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = [
                    'id_solicitud' => $id_solicitud,
                    'id_usuario' => trim($_POST['id_usuario']),
                    'comentario' => trim($_POST['comentario'])
                ];

                // se evalua si existe el metodo agregar usuario
                if($this->moderadorModelo ->advertirAdministrador($datos)) {
                    $paginamodelo->inicioMod();
                }
                else {
                    die('Algo salio mal');
                }
            }
            else{ 
                // se obtiene la informacion de usuario desde el modelo
                $solicitudAdvertencia = $this->solicitudModelo->obtenerSolicitudAdvertencia($id_solicitud);

                $datos = [
                    'id_solicitud' => $solicitudAdvertencia->ID_Solicitud,
                    'id_usuario' => $solicitudAdvertencia->ID_Usuario,
                    'id_comentario' => ''
                ];

                $this->vista('paginas/advertirAdministrador', $datos);
            }
        }

        public function subirImagen() {
            if(isset($_FILES['img'])) {
                
            }
        }

        /**
         * Metodo para subir la solicitud de retiro
         * realizada por el usuario, y cargar la vista 
         * correspondiente.
         */
        public function solicitudRetiro() {
            $paginasMod = new paginas();
            // validacion si se envio el formulario     
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $geocodeData = $paginasMod->getGeocodeData($_POST['searchAddress']); 
                if($geocodeData) {         
                    //$address = $geocodeData[2];  
                    $datos = [
                        'producto' => trim($_POST['producto']),
                        'descripcion' => trim($_POST['descripcion']),
                        'ciudad' => trim($_POST['ciudad']),
                        'comuna' => trim($_POST['comuna']),
                        'calle' => trim($_POST['calle']),
                        'numeroCalle' => trim($_POST['numeroCalle']),
                        'tipoDomicilio' => trim($_POST['tipoDomicilio']),
                        'puntoReferencia' => trim($_POST['puntoReferencia']),
                        'lat' => $geocodeData[0],
                        'long' => $geocodeData[1]
                    ];
                
                    // se evalua si existe el metodo agregar usuario
                    if($this->solicitudModelo->ingresarSolicitud($datos)) {
                        $datos = [
                            'mensaje' => 'Solicitud enviada, espere aprobacion del moderador'
                        ];
                        $this->vista('paginas/crearSolicitud', $datos);
                    }
                    else {
                        die('Algo salio mal');
                    }
                }
            }
            else{ // si no se dejan los datos en blanco y se carga de nuevo el formulario
                $datos = [
                    'producto' => '',
                    'descripcion' => '',
                    'ciudad' => '',
                    'comuna' => '',
                    'calle' => '',
                    'numeroCalle' => '',
                    'tipoDomicilio' => '',
                    'puntoReferencia' => '',
                    'lat' => '',
                    'long' => ''
                ];
                $this->vista('paginas/crearSolicitud');
            }
        } // fin crear solicitud
        

        /**
         * Metodo para obtener las solicitudes del usuario
         * y cargar la vista con los resultados obtenidos
         */
        public function solicitudesUsuario() {
            session_start();
            $id = $_SESSION['idUser'];
            $solicitudesUsuario = $this->solicitudModelo->obtenerSolicitudesUsuario($id);
            $datos = [
                'solicitudesUsuario' => $solicitudesUsuario
            ];
            $this->vista('paginas/solicitudesUsuario', $datos);
        }

        /**
         * Metodo para obtener las notificaciones 
         * y cargar la vista con los datos obtenidos
         */
        public function notificacionesUsuario() {
            session_start();
            $id = $_SESSION['idUser'];
            $notificacionesUsuario = $this->usuarioModelo->obtenerNotificacionesUsuario($id);
            $datos = [
                'notificacionesUsuario' => $notificacionesUsuario
            ];
            $this->vista('paginas/notificacionesUsuario', $datos);
        }

        public function getGeocodeData($address) { 
            $address = urlencode($address);     
            $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyB7L-s7sFpWB_X1guPIPFqra7m7KQr68Pc";
            $geocodeResponseData = file_get_contents($googleMapUrl);
            $responseData = json_decode($geocodeResponseData, true);
            if($responseData['status']=='OK') {
                $latitude = isset($responseData['results'][0]['geometry']['location']['lat']) ? $responseData['results'][0]['geometry']['location']['lat'] : "";
                $longitude = isset($responseData['results'][0]['geometry']['location']['lng']) ? $responseData['results'][0]['geometry']['location']['lng'] : "";
                $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";         
                if($latitude && $longitude && $formattedAddress) {         
                    $geocodeData = array();                         
                    array_push(
                        $geocodeData, 
                        $latitude, 
                        $longitude, 
                        $formattedAddress
                    );             
                    return $geocodeData;             
                } else {
                    return false;
                }         
            } else {
                echo "ERROR: {$responseData['status']}";
                return false;
            }
        }


    }
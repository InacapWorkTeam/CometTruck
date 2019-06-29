<?php

    /**
     * Class Core, se encarga de mapear la url en el
     * navegador.
     */
    class Core{

        // atributos correspondientes a la url
        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        /**
         * Core constructor por defecto, este se encarga de realizar
         * las operaciones de mapeo de la url
         */
        public function __construct() {
 
           $url = $this->getUrl();
           // se evalua si el controlador existe en controladores
           if(file_exists('../app/controladores/' .ucwords($url[0]).'.php')) { 
                // si existe se setea como controlador por defecto
                $this->controladorActual = ucwords($url[0]);

                // unset indice para desmontar el controlador actual que empezo con las paginas
                unset($url[0]);
            }
            // requerir el controlador
            require_once '../app/controladores/' . $this->controladorActual . '.php'; // .php para no escribir extension en navegador
            $this->controladorActual = new $this->controladorActual;

            // se chequea la segunda parte de la url que vendria siendo el metodo
            if(isset($url[1])) {
                if(method_exists($this->controladorActual, $url[1])) {
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }

            // obtener los parametros            
            $this->parametros = $url ? array_values($url) : [];

            // llamar callback con parametros array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }

        /**
         * Funcion para obtener la url
         * @return array|mixed|string la url validada
         */
        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/'); // extrayendo espacios
                $url = filter_var($url, FILTER_SANITIZE_URL); // validacion url PARA QUE SEA LEIDO COMO URL
                $url = explode('/', $url);
                return $url;
            }
        }

     } // fin clase

     

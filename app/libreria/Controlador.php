<?php

    /**
     * Class Controlador principal,esta se encarga
     * de poder cargar los modelos y vistas existentes.
     */
    class Controlador {

        /**
         * Funcion para cargar el modelo
         * @param $modelo que se instanciara
         * @return mixed una instancia del modelo pasado como parametro
         */
        public function modelo($modelo) {

            require_once ('../app/modelo/' . $modelo . '.php');  // se carga
            return new $modelo(); // se instancia el modelo

        } // fin modelo

        /**
         * Funcion que se obtiene la vista y los datos
         * correspondientes a ella.
         * @param $vista representacion de las paginas que se
         * mostraran al usuario
         * @param array $datos proporcionados por la vista a ejecutar
         */
        public function vista($vista, $datos = []) {

            // se chequea si el archivo vista existe
            if(file_exists('../app/vistas/' . $vista . '.php')) {
                require_once ('../app/vistas/' . $vista . '.php');
            }
            else {
                // si el archivo de la vista no existe 
                die('La vista no existe');
            }

        } // fin vista

    } // fin clase
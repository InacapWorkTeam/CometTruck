<?php

    /**
     * Clase para conectarse a la base de datos
     * y las consultas correspondientes segun las
     * operaciones solicitadas
     */
    class Base {
        
        // atributos de conexion
        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSW;
        private $nombre_base = DB_NOMBRE;

        // atributos de funcionamiento
        private $dbh;
        private $stmt;
        private $error;

        /**
         * Base constructor por defecto, generando una instancia
         * de pdo, para realizar la conexion con la base de datos.
         */
        public function __construct() {

             // configurar conexion
             $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_base;
             $opciones = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

             // instanciar pdo
             try {
                //error_reporting(0);
                 $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
                 $this->dbh->exec('set names utf8'); // arreglo caracteres especiales
             }
             catch(PDOException $ex) {
                $this->error = $ex->getMessage();
                echo $this->error;
             }

        } // fin constructor

        /**
         * Se prepara la query para realizar la operacion
         * correspondiente.
         * @param $sql correspondiente a la consulta a ejecutar
         */
        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        } // fin query

        /**
         * Se vincula la consulta query, validando el valor de
         * de entrada, y segun el valor de este se le asigna
         * un valor asignado por defecto correspondiente a la
         * clase pdo.
         *
         * @param $parametro que se ingresa
         * @param $valor del parametro
         * @param null $tipo del parametro
         */
        public function bind($parametro, $valor, $tipo = null) {
            if(is_null($tipo)) {
                switch(true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                } 
            } 
            $this->stmt->bindValue($parametro, $valor, $tipo);

        } // fin bind


        /**
         * Funcion para ejecutar la query
         * @return mixed variable ejecutada
         */
        public function execute() { 

            return $this->stmt->execute();
        
        } // fin execute


        /**
         * Funcion para obtener los registros
         * @return mixed con los resgistros correspondientes
         */
        public function registros(){
        
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        
        } // fin registros

        /**
         * Funcion para obtener un solo registro
         * @return mixed con el registro correspondiente
         */
        public function registro(){
        
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        
        } // fin registro

        /**
         * Funcion para obtener la cantidad de filas
         * @return mixed con las filas encontradas
         */
        public function rowCount(){
        
            return $this->stmt->rowCount();
        
        } // fin rowcount


    } // fin clase
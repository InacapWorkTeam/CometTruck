<?php

/**
 * Class Moderador esta hereda de la clase persona
 * para obtener los atributos y operaciones correspondientes
 */
class Moderador extends Persona
{
     // variable de conexion
     private $db;

    /**
     * Moderador constructor por defecto
     */
    public function __construct()
    {
        $this->db = new Base();
    } // fin constructor

    /**
     * Metodo para obtener el usuario 
     * segun los datos ingresados en 
     * el login
     */
    public function obtenerModId($datos) {

        $this->db->query('SELECT * FROM Moderador WHERE Rut=:rut AND Contrasena=:contrasena AND Estado=1');
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':contrasena', $datos['contrasena']);
        $fila = $this->db->registro();
        return $fila;
    }

    /**
    * Se obtienen los moderadores de la base de datos
    * mediante la consulta correspondiente
    * @return mixed los resultados obtenidos en la consulta
    */
    public function obtenerModeradores() {

        $this->db->query('SELECT * FROM Moderador');
        $resultados = $this->db->registros();
        return $resultados;
        
    } // fin obtener usuarios

    /**
     * Funcion para obtener los moderadores con el id
     * @param $datos moderador
     * @return mixed la fila encontrada
     */
    public function obtenerModerador($id) {
    
        $this->db->query('SELECT * FROM Moderador WHERE ID_Moderador = :id');
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    
    } // fin obtener usuario

     /**
     * Funcion para registrar moderadores en la base de datos
     * @param $datos correspondientes al moderador
     * @return bool indicando si se hizo o no el ingreso
     */
    public function agregarModerador($datos) {

        $this->db->query('INSERT INTO Moderador (Rut, Nombre, Apellido, Email, Contrasena, Estado) VALUES (:rut, :nombre, :apellido, :email, :contrasena, :estado)');

        // vinculacion de valores
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':email', $datos['email']);
        $this->db->bind(':contrasena', $datos['contrasena']);
        $this->db->bind(':estado', $datos['estado']);
    
        // ejecucion query
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }

    } // fin agregar recolector

    /**
     * Funcion para modificar los datos del moderador si el administrador lo necesita
     * @param $datos correspondientes al moderador
     * @return bool indicando si se hizo o no la actualizacion
     */
    public function actualizarModerador($datos) {
        
        $this->db->query('UPDATE Moderador SET Rut = :rut, Nombre = :nombre, Apellido = :apellido, Email = :email, Contrasena = :contrasena, Estado = :estado WHERE ID_Moderador = :id');
            
        // vinculacion de valores
        $this->db->bind(':id', $datos['id_moderador']);
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':email', $datos['email']);
        $this->db->bind(':contrasena', $datos['contrasena']);
        $this->db->bind(':estado', $datos['estado']);

        // ejecucion query
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }

    } // fin actualizar

    
    /**
     * Funcion para el borrado logico de un moderador
     * si el administrador lo necesita
     * @param $datos id del moderador a eliminar
     * @return bool indicando si se hizo o no la actualizacion
     */
    public function eliminarModeradorLog($datos) {
        
        $this->db->query('UPDATE Moderador SET Estado = :estado WHERE ID_Moderador = :id');

        // vinculacion de valores
        $this->db->bind(':id', $datos['id_moderador']);
        $this->db->bind(':estado', 0);

        // ejecucion query
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }

    } // fin eliminacion

    /**
     * Metodo para cambiar el estado de la solicitud
     * a publicada, despues de la revision del 
     * moderador.
     */
    public function validarSolicitud($id_solicitud) {
        $this->db->query('UPDATE Solicitud SET Seguimiento=:Publicada WHERE ID_Solicitud=:id');
        $this->db->bind(':Publicada', 'Publicada');
        $this->db->bind(':id', $id_solicitud);

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Metodo para realizar el envio de una notificacion
     * para confirmar la revision de la solcitud por parte
     * del moderador hacia el usuario.
     */
    public function enviarNotificacionUsuario($id_solicitud, $id_usuario) {
        $this->db->query('INSERT INTO Reporte (ID_Tipo, Comentario, ID_Usuario, ID_Solicitud, Estado) VALUES (:id_tipo, :comentario, :id_usuario, :id_solicitud, :estado)');
        $this->db->bind(':id_tipo', 3);
        $this->db->bind(':comentario', 'Solicitud aprobada y publicada');
        $this->db->bind(':id_usuario', $id_usuario);
        $this->db->bind(':id_solicitud', $id_solicitud);
        $this->db->bind(':estado', 'Enviado');

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    
    /**
     * Metodo para realizar el envio de una advertencia
     * hacia el usuario, debido a algun error en la 
     * solicitud
     */
    public function advertirUsuario($datos) {
        $this->db->query('INSERT INTO Reporte (ID_Tipo, Comentario, ID_Usuario, ID_Solicitud, Estado) VALUES (:id_tipo, :comentario, :id_usuario, :id_solicitud, :estado)');
        $this->db->bind(':id_tipo', 2);
        $this->db->bind(':comentario', $datos['comentario']);
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        $this->db->bind(':id_solicitud', $datos['id_solicitud']);
        $this->db->bind(':estado', 'Enviado');

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Metodo para realizar el envio de una advertencia
     * hacia el administrador, advirtiendo sobre 
     * una cuenta problematica
     */
    public function advertirAdministrador($datos) {
        $this->db->query('INSERT INTO Reporte (ID_Tipo, Comentario, ID_Usuario, ID_Solicitud, Estado) VALUES (:id_tipo, :comentario, :id_usuario, :id_solicitud, :estado)');
        $this->db->bind(':id_tipo', 4);
        $this->db->bind(':comentario', $datos['comentario']);
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        $this->db->bind(':id_solicitud', $datos['id_solicitud']);
        $this->db->bind(':estado', 'Enviado');

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

} // fin clase
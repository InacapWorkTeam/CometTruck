<?php


/**
 * Class Persona, esta refleja la estructura y los metodos
 * correspondientes a las operaciones de los actores
 * principales del sistema(Recolector/Usuario)
 */
class Persona
{
    // atributos
    private $_id;
    private $_rut;
    private $_nombre;
    private $_apellido;
    private $_fecha_nacimiento;
    private $_telefono;
    private $_email;
    private $_contrasena;
    private $_estado;


    // objeto base de datos
    private $db;

    /**
     * Persona constructor que instancia un obj de la base de datos
     */
    public function __construct() {
  
      $this->db = new Base();
  
      } // fin constructor


    // getter and setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getRut()
    {
        return $this->_rut;
    }

    /**
     * @param mixed $rut
     */
    public function setRut($rut)
    {
        $this->_rut = $rut;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->_nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->_apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->_apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->_fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->_fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->_telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->_telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->_contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->_contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->_estado = $estado;
    }

   /**
    * Se obtienen los recolectores de la base de datos
    * mediante la consulta correspondiente
    * @return mixed los resultados obtenidos en la consulta
    */
    public function obtenerRecolectores() {

        $this->db->query('SELECT * FROM Recolector');
        $resultados = $this->db->registros();
        return $resultados;
        
    } // fin obtener usuarios

    /**
     * Funcion para obtener los usuarios con el id
     * @param $datos usuario
     * @return mixed la fila encontrada
     */
    public function obtenerRecolector($id) {
    
        $this->db->query('SELECT * FROM Recolector WHERE ID_Recolector = :id');
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    
    } // fin obtener usuario

    /**
     * Se obtienen los usuarios de la base de datos
     * mediante la consulta correspondiente
     * @return mixed los resultados obtenidos en la consulta
     */
    public function obtenerUsuarios() {

        $this->db->query('SELECT * FROM Usuario');
        $resultados = $this->db->registros();
        return $resultados;
        
    } // fin obtener usuarios


    /**
     * Funcion para obtener el usuario, segun los datos
     * proporcionados por el usuario en el login
     * @param $datos usuario
     * @return mixed la fila encontrada
     */
    public function obtenerUsuarioId($datos) {
    
        $this->db->query('SELECT * FROM Usuario WHERE Rut=:rut AND Contrasena=:contrasena AND Estado=1');
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':contrasena', $datos['contrasena']);
        $fila = $this->db->registro();
        return $fila;
    
    } // fin obtener usuario

     /**
     * Funcion para obtener los usuarios con el id
     * @param $datos usuario
     * @return mixed la fila encontrada
     */
    public function obtenerUsuario($id) {
    
        $this->db->query('SELECT * FROM Usuario WHERE ID_Usuario = :id');
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    
    } // fin obtener usuario

    /**
     * Funcion para obtener los usuarios con el id
     * @param $id usuario
     * @return mixed la fila encontrada
     */
    public function obtenerRecolectorId($datos) {
    
        $this->db->query('SELECT * FROM Recolector WHERE Rut=:rut AND Contrasena=:contrasena AND Estado=1');
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':contrasena', $datos['contrasena']);
        $fila = $this->db->registro();
        return $fila;
    
    } // fin obtener usuario

       /**
     * Funcion para obtener los administradores
     * @param $datos del admin a buscar
     * @return mixed la fila encontrada
     */
    public function obtenerAdminId($datos) {
    
        $this->db->query('SELECT * FROM Administrador WHERE Rut=:rut AND Contrasena=:contrasena AND Estado=1');
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':contrasena', $datos['contrasena']);
        $fila = $this->db->registro();
        return $fila;
    
    } // fin obtener usuario

    /**
     * Funcion para registrar usuarios en la base de datos
     * @param $datos correspondientes al usuario
     * @return bool indicando si se hizo o no el ingreso
     */
    public function agregarUsuario($datos) {

        $this->db->query('INSERT INTO Usuario (Rut, Nombre,Apellido, Fecha_Nacimiento, Telefono, Email, Contrasena, Estado) VALUES (:rut, :nombre, :apellido, :fechaNacimiento, :telefono, :email, :contrasena, :estado)');

        // vinculacion de valores
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':fechaNacimiento', $datos['fechaNacimiento']);
        $this->db->bind(':telefono', $datos['telefono']);
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

    } // fin agregar usuario

    /**
     * Funcion para registrar usuarios en la base de datos
     * @param $datos correspondientes al usuario
     * @return bool indicando si se hizo o no el ingreso
     */
    public function agregarRecolector($datos) {

        $this->db->query('INSERT INTO Recolector (Rut, Nombre,Apellido, Fecha_Nacimiento, Telefono, Email, Contrasena, Estado) VALUES (:rut, :nombre, :apellido, :fechaNacimiento, :telefono, :email, :contrasena, :estado)');

        // vinculacion de valores
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':fechaNacimiento', $datos['fechaNacimiento']);
        $this->db->bind(':telefono', $datos['telefono']);
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
     * Funcion para modificar los datos del recolector si el administrador lo necesita
     * @param $datos correspondientes al recolector
     * @return bool indicando si se hizo o no la actualizacion
     */
    public function actualizarRecolector($datos) {
        
        $this->db->query('UPDATE Recolector SET Rut = :rut, Nombre = :nombre, Apellido = :apellido, Fecha_Nacimiento = :fechaNacimiento, Telefono = :telefono, Email = :email, Contrasena = :contrasena, Estado = :estado WHERE ID_Recolector = :id');

        // vinculacion de valores
        $this->db->bind(':id', $datos['id_recolector']);
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':fechaNacimiento', $datos['fechaNacimiento']);
        $this->db->bind(':telefono', $datos['telefono']);
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
     * Funcion para modificar los datos del usuario si el administrador lo necesita
     * @param $datos correspondientes al usuario
     * @return bool indicando si se hizo o no la actualizacion
     */
    public function actualizarUsuario($datos) {
        
        $this->db->query('UPDATE Usuario SET Rut = :rut, Nombre = :nombre, Apellido = :apellido, Fecha_Nacimiento = :fechaNacimiento, Telefono = :telefono, Email = :email, Contrasena = :contrasena, Estado = :estado WHERE ID_Usuario = :id');

        // vinculacion de valores
        $this->db->bind(':id', $datos['id_usuario']);
        $this->db->bind(':rut', $datos['rut']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':fechaNacimiento', $datos['fechaNacimiento']);
        $this->db->bind(':telefono', $datos['telefono']);
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
     * Funcion para el borrado logico de un usuario
     * si el administrador lo necesita
     * @param $datos id del usuario a eliminar
     * @return bool indicando si se hizo o no la actualizacion
     */
    public function eliminarUsuarioLog($datos) {
        
        $this->db->query('UPDATE Usuario SET Estado = :estado WHERE ID_Usuario = :id');

        // vinculacion de valores
        $this->db->bind(':id', $datos['id_usuario']);
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
     * Funcion para el borrado logico de un recolector
     * si el administrador lo necesita
     * @param $datos id del recolector a eliminar
     * @return bool indicando si se hizo o no la actualizacion
     */
    public function eliminarRecolectorLog($datos) {
        
        $this->db->query('UPDATE Recolector SET Estado = :estado WHERE ID_Recolector = :id');

        // vinculacion de valores
        $this->db->bind(':id', $datos['id_recolector']);
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
     * Metodo para obtener las notificaciones 
     * correspondientes al usuario
     * @* @param int $idUsuario id del usuario
     */
    public function obtenerNotificacionesUsuario($idUsuario) {
        
        $this->db->query('SELECT * FROM Reporte WHERE ID_Usuario=:id');
        $this->db->bind(':id', $idUsuario);
        $resultados = $this->db->registros();
        return $resultados;
    }

} // fin clase


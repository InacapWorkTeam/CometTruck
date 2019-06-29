<?php

/**
 * Class Oferta, en la cual se refleja la estructura que contendra una oferta
 */
class Oferta
{
    // atributos
    private $_id_oferta;
    private $_nombre;
    private $_precio;
    private $_fecha_creacion;
    private $_estado;
    private $_id_solicitud;
    private $_id_recolector;
    // objeto base de datos
    private $db;


    /**
     * Oferta constructor.
     * @param $_nombre de la oferta
     * @param $_precio de la oferta
     * @param $_fecha_creacion de la oferta
     * @param $_estado de la oferta
     * @param $_id_solicitud de la oferta
     * @param $_id_recolector id correspondiente al recolector
     */
    public function __construct($_nombre, $_precio, $_fecha_creacion, $_estado, $_id_solicitud, $_id_recolector)
    {
        $this->_nombre = $_nombre;
        $this->_precio = $_precio;
        $this->_fecha_creacion = $_fecha_creacion;
        $this->_estado = $_estado;
        $this->_id_solicitud = $_id_solicitud;
        $this->_id_recolector = $_id_recolector;
    } // fin constructor


    // getter and setters

    /**
     * @return mixed
     */
    public function getIdOferta()
    {
        return $this->_id_oferta;
    }

    /**
     * @param mixed $id_oferta
     */
    public function setIdOferta($id_oferta)
    {
        $this->_id_oferta = $id_oferta;
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
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->_precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->_fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion)
    {
        $this->_fecha_creacion = $fecha_creacion;
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
     * @return mixed
     */
    public function getIdSolicitud()
    {
        return $this->_id_solicitud;
    }

    /**
     * @param mixed $id_solicitud
     */
    public function setIdSolicitud($id_solicitud)
    {
        $this->_id_solicitud = $id_solicitud;
    }

    /**
     * @return mixed
     */
    public function getIdRecolector()
    {
        return $this->_id_recolector;
    }

    /**
     * @param mixed $id_recolector
     */
    public function setIdRecolector($id_recolector)
    {
        $this->_id_recolector = $id_recolector;
    }

    /**
     * Metodo para ingresar una oferta realizada por
     * el recolector
     */
    public function insertarOferta($datos) {

        $this->db->query('INSERT INTO Oferta(Nombre, Precio, Fecha, Estado, ID_Solicitud, ID_Recolector, Nombre_Recolector) VALUES (:nombre, :precio, :fecha, :estado, :id_solicitud, :id_recolector, :nombreRecolector)');

        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':precio', $datos['precio']);
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':id_solicitud', $datos['id_solicitud']);
        $this->db->bind(':id_recolector', $datos['id_recolector']);
        $this->db->bind(':nombreRecolector', $datos['nombreRecolector']);

        // ejecucion query
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }// fin ingresar oferta

} // fin clase
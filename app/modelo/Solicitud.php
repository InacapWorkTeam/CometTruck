<?php

/**
 * Class Solicitud, esta clase contiene los atributos y constructor
 * para la creacion correspondiente de una solicitud por parte del usuario
 */
class Solicitud
{
    // atributos
    private $_id;
    private $_producto;
    private $_descripcion;
    private $_ciudad;
    private $_comuna;
    private $_calle;
    private $_numero_domicilio;
    private $_tipo_domicilio;
    private $_punto_referencia;
    private $_coordenada_x;
    private $_coordenada_y;
    private $_id_tipo_recoleccion;
    private $_id_usuario;
    private $_id_recolector;
    private $_id_imagen;
    private $_seguimiento;
    private $_validacion_usuario;
    private $_validacion_recolector;
    private $_estado;

    //conexion db
    private $db;

    /**
     * Constructor solicitud por defecto
     */
    public function __construct()
    {
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
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->_producto;
    }

    /**
     * @param mixed $producto
     */
    public function setProducto($producto): void
    {
        $this->_producto = $producto;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->_descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->_ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad): void
    {
        $this->_ciudad = $ciudad;
    }

    /**
     * @return mixed
     */
    public function getComuna()
    {
        return $this->_comuna;
    }

    /**
     * @param mixed $comuna
     */
    public function setComuna($comuna): void
    {
        $this->_comuna = $comuna;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle): void
    {
        $this->_calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getNumeroDomicilio()
    {
        return $this->_numero_domicilio;
    }

    /**
     * @param mixed $numero_domicilio
     */
    public function setNumeroDomicilio($numero_domicilio): void
    {
        $this->_numero_domicilio = $numero_domicilio;
    }

    /**
     * @return mixed
     */
    public function getTipoDomicilio()
    {
        return $this->_tipo_domicilio;
    }

    /**
     * @param mixed $tipo_domicilio
     */
    public function setTipoDomicilio($tipo_domicilio): void
    {
        $this->_tipo_domicilio = $tipo_domicilio;
    }

    /**
     * @return mixed
     */
    public function getPuntoReferencia()
    {
        return $this->_punto_referencia;
    }

    /**
     * @param mixed $punto_referencia
     */
    public function setPuntoReferencia($punto_referencia): void
    {
        $this->_punto_referencia = $punto_referencia;
    }

    /**
     * @return mixed
     */
    public function getCoordenadaX()
    {
        return $this->_coordenada_x;
    }

    /**
     * @param mixed $coordenada_x
     */
    public function setCoordenadaX($coordenada_x): void
    {
        $this->_coordenada_x = $coordenada_x;
    }

    /**
     * @return mixed
     */
    public function getCoordenadaY()
    {
        return $this->_coordenada_y;
    }

    /**
     * @param mixed $coordenada_y
     */
    public function setCoordenadaY($coordenada_y): void
    {
        $this->_coordenada_y = $coordenada_y;
    }

    /**
     * @return mixed
     */
    public function getIdTipoRecoleccion()
    {
        return $this->_id_tipo_recoleccion;
    }

    /**
     * @param mixed $id_tipo_recoleccion
     */
    public function setIdTipoRecoleccion($id_tipo_recoleccion): void
    {
        $this->_id_tipo_recoleccion = $id_tipo_recoleccion;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario): void
    {
        $this->_id_usuario = $id_usuario;
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
    public function setIdRecolector($id_recolector): void
    {
        $this->_id_recolector = $id_recolector;
    }

    /**
     * @return mixed
     */
    public function getIdImagen()
    {
        return $this->_id_imagen;
    }

    /**
     * @param mixed $id_imagen
     */
    public function setIdImagen($id_imagen): void
    {
        $this->_id_imagen = $id_imagen;
    }

    /**
     * @return mixed
     */
    public function getSeguimiento()
    {
        return $this->_seguimiento;
    }

    /**
     * @param mixed $seguimiento
     */
    public function setSeguimiento($seguimiento): void
    {
        $this->_seguimiento = $seguimiento;
    }

    /**
     * @return mixed
     */
    public function getValidacionUsuario()
    {
        return $this->_validacion_usuario;
    }

    /**
     * @param mixed $validacion_usuario
     */
    public function setValidacionUsuario($validacion_usuario): void
    {
        $this->_validacion_usuario = $validacion_usuario;
    }

    /**
     * @return mixed
     */
    public function getValidacionRecolector()
    {
        return $this->_validacion_recolector;
    }

    /**
     * @param mixed $validacion_recolector
     */
    public function setValidacionRecolector($validacion_recolector): void
    {
        $this->_validacion_recolector = $validacion_recolector;
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
    public function setEstado($estado): void
    {
        $this->_estado = $estado;
    }

    /**
     * Metodo para obtener las solicitudes 
     * con seguimiento Pendiente revision
     * para ser revisadas por el moderador
     */
    public function obtenerSolicitudesRevision() {
     
        $this->db->query('SELECT * FROM Solicitud WHERE Seguimiento=:PendienteRevision');
        $this->db->bind(':PendienteRevision', 'PendienteRevision');
        $resultados = $this->db->registros();
        return $resultados;
    }

     /**
     * Metodo para obtener la solicitud erronea y
     * advertir al usuario sobre el problema.
     */
    public function obtenerSolicitudAdvertencia($id) {
     
        $this->db->query('SELECT * FROM Solicitud WHERE ID_Solicitud=:id');
        $this->db->bind(':id', $id);
        $resultado = $this->db->registro();
        return $resultado;
    }

    /**
     * Metodo para obtener la solicitudes del usuario
     * segun el parametro id, usado para el historial
     * de solicitudes
     */
    public function obtenerSolicitudesUsuario($id) {
     
        $this->db->query('SELECT * FROM Solicitud WHERE ID_Usuario=:id');
        $this->db->bind(':id', $id);
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function ingresarSolicitud($datos) {
        $this->db->query('INSERT INTO Solicitud (Producto, Descripcion, Ciudad, Comuna, Calle, Numero, Tipo_Domicilio, Punto_referencia, Coordenada_x, Coordenada_y, Seguimiento) VALUES (:producto, :descripcion, :ciudad, :comuna, :calle, :numeroCalle, :tipoDomicilio, :puntoReferencia, :lat, :long, :seguimiento)');

        $this->db->bind(':producto', $datos['producto']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':ciudad', $datos['ciudad']);
        $this->db->bind(':comuna', $datos['comuna']);
        $this->db->bind(':calle', $datos['calle']);
        $this->db->bind(':numeroCalle', $datos['numeroCalle']);
        $this->db->bind(':tipoDomicilio', $datos['tipoDomicilio']);
        $this->db->bind(':puntoReferencia', $datos['puntoReferencia']);
        $this->db->bind(':lat', $datos['lat']);
        $this->db->bind(':long', $datos['long']);
        $this->db->bind(':seguimiento', 'PendienteRevision');

        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }


} // fin clase
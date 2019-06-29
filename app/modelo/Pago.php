<?php

/**
 * Class Pago en la cual se refleja la estructura que contendra el pago
 * realizado por el usuario
 */
class Pago
{
    // atributos
    private $_id;
    private $_metodo_pago;
    private $_id_solicitud;
    private $_numero_transaccion;
    private $_monto;

    /**
     * Pago constructor.
     * @param $_metodo_pago que elije el usuario
     * @param $_id_solicitud realizada por el usuario
     * @param $_numero_transaccion que genera el pago
     * @param $_monto total del pago
     */
    public function __construct($_metodo_pago, $_id_solicitud, $_numero_transaccion, $_monto)
    {
        $this->_metodo_pago = $_metodo_pago;
        $this->_id_solicitud = $_id_solicitud;
        $this->_numero_transaccion = $_numero_transaccion;
        $this->_monto = $_monto;
    } // fin constructor

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
    public function getMetodoPago()
    {
        return $this->_metodo_pago;
    }

    /**
     * @param mixed $metodo_pago
     */
    public function setMetodoPago($metodo_pago)
    {
        $this->_metodo_pago = $metodo_pago;
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
    public function getNumeroTransaccion()
    {
        return $this->_numero_transaccion;
    }

    /**
     * @param mixed $numero_transaccion
     */
    public function setNumeroTransaccion($numero_transaccion)
    {
        $this->_numero_transaccion = $numero_transaccion;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->_monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->_monto = $monto;
    }


} // fin clase
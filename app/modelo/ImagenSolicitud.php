<?php

/**
 * Class ImagenSolicitud refleja tabla relacional imagen solicitud
 */
class ImagenSolicitud
{

    // atributos
    private $_id_relacion;
    private $_id_imagen;
    private $_id_solicitud;

    /**
     * ImagenSolicitud constructor.
     * @param $_id_imagen id correspondiente a la imagen
     * @param $_id_solicitud id correspondiente a la solicitud
     */
    public function __construct($_id_imagen, $_id_solicitud)
    {
        $this->_id_imagen = $_id_imagen;
        $this->_id_solicitud = $_id_solicitud;
    } // fin constructor


    // getter and setters

    /**
     * @return mixed
     */
    public function getIdRelacion()
    {
        return $this->_id_relacion;
    }

    /**
     * @param mixed $id_relacion
     */
    public function setIdRelacion($id_relacion)
    {
        $this->_id_relacion = $id_relacion;
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
    public function setIdImagen($id_imagen)
    {
        $this->_id_imagen = $id_imagen;
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


} //fin clase
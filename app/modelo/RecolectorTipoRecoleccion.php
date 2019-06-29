<?php

/**
 * Class RecolectorTipoRecoleccion, esta refleja la relacion entre
 * recolector y el tipo de recoleccion
 */
class RecolectorTipoRecoleccion
{

    // atributos
    private $_id_relacion;
    private $_id_recolector;
    private $_id_tipo_recoleccion;

    /**
     * RecolectorTipoRecoleccion constructor.
     * @param $_id_recolector id correspondiente al recolector
     * @param $_id_tipo_recoleccion id correspondiente al tipo de recoleccion
     */
    public function __construct($_id_recolector, $_id_tipo_recoleccion)
    {
        $this->_id_recolector = $_id_recolector;
        $this->_id_tipo_recoleccion = $_id_tipo_recoleccion;
    } // fin constructor


    //getter and setters

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
    public function setIdRelacion($id_relacion): void
    {
        $this->_id_relacion = $id_relacion;
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



} // fin clase
<?php

/**
 * Class TipoReporte con sus atributos y metodos correspondientes,
 * para reflejar el tipo de reporte que se reaslizara
 */
class TipoReporte
{
    // atributos
    private $_id_tipo;
    private $_nombre;
    private $_descripcion;

    /**
     * TipoReporte constructor.
     */
    public function __construct()
    {
    } // fin constructor

    // getter and setters

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->_id_tipo;
    }

    /**
     * @param mixed $id_tipo
     */
    public function setIdTipo($id_tipo): void
    {
        $this->_id_tipo = $id_tipo;
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
    public function setNombre($nombre): void
    {
        $this->_nombre = $nombre;
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


} // fin clase
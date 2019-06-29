<?php

/**
 * Class Imagen, esta se encarga de representar las imagenes
 * que proporcionara el usuario en la fase de publicación de retiro
 */
class Imagen 
{
    // atributos
    private $_id_imagen;
    private $_nombre;
    private $_bash;
    private $_ruta;

    /**
     * Imagen constructor.
     * @param $_nombre de la imagen
     * @param $_bash decodificacion de la imagen
     * @param $_ruta origen de la imagen
     */
    public function __construct($_nombre, $_bash, $_ruta)
    {
        $this->_nombre = $_nombre;
        $this->_bash = $_bash;
        $this->_ruta = $_ruta;
    } // fin constructor

    // getter and setters

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
    public function getBash()
    {
        return $this->_bash;
    }

    /**
     * @param mixed $bash
     */
    public function setBash($bash)
    {
        $this->_bash = $bash;
    }

    /**
     * @return mixed
     */
    public function getRuta()
    {
        return $this->_ruta;
    }

    /**
     * @param mixed $ruta
     */
    public function setRuta($ruta)
    {
        $this->_ruta = $ruta;
    }


} // fin clase
<?php

/**
 * Metodo para redireccionar la página, en caso
 * de que se necesite hacerlo, ayudando en la traza
 * de la pagina web
 * @param $pagina pagina a la que se va a redireccionar
 */
function redireccionar($pagina) {
    header('location: '.RUTA_URL.$pagina);
}
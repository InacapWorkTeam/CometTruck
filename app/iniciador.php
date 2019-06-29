<?php

    // se cargan las librerias
    require_once 'configuracion/configurar.php'; 
    require_once 'ayuda/url_helper.php';
    
    // require_once 'libreria/Base.php'; 
    // require_once 'libreria/Controlador.php';
    // require_once 'libreria/Core.php';

    // Autoload php, se cargan todas las librerias
    // sin tener que estar instanciandolas todas
    spl_autoload_register(function($nombreClase) {
        require_once 'libreria/' .$nombreClase. '.php';
    });
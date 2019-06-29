<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['usuario'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
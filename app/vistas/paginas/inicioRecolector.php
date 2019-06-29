<?php
    session_start();
    $varsesion = $_SESSION['recolector'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerRecolector.php';?>

<?php require RUTA_APP . '/vistas/includes/footer.php';?>
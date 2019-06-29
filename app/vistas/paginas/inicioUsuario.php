<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerUsuario.php';?>

<?php require RUTA_APP . '/vistas/includes/footer.php';?>   
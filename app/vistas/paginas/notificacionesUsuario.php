<?php
    session_start();
    //error_reporting(0);
    $varsesion = $_SESSION['usuario'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerUsuario.php';?>      
        <?php foreach($datos['notificacionesUsuario'] as $notificacion) : ?>
        <form class="formulario" action="<?php echo RUTA_URL;?>paginas/confirmarNotificacion/<?php echo $notificaion->ID_Reporte;?>" method="POST">
        <table class="tblIngresar">
            <tr><th>Notificacion de <?php echo $notificacion->Nombre_moderador;?></th></tr>
            <tr> 
                <td>Contenido </td>
                <td><?php echo $notificacion->Comentario;?></td>
            </tr>
            <tr>
                <td><input type="submit" value="Confirmar" id="sub_conf_ingresar"></td>
            </tr>
        </table>
        </form>
        <?php endforeach;?>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
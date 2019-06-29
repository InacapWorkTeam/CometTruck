<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['moderador'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerModerador.php'; ?>
    <form class="formulario" action="<?php echo RUTA_URL;?>paginas/advertirUsuario/<?php echo $datos['id_solicitud'];?>" method="POST">
    <table class="tblIngresar">
        <th>Advertencia usuario</th>
        <tr>
            <td><label for="id_usuario">ID usuario: <sup>*</sup></label></td>
            <td><input type="number" min= "<?php echo $datos['id_usuario'];?>" max="<?php echo $datos['id_usuario'];?>"name="id_usuario" value="<?php echo $datos['id_usuario'];?>"></td>
        </tr>
        <tr>
            <td><label for="id_solicitud">ID Solicitud: <sup>*</sup></label></td>
            <td><input type="number" min="<?php echo $datos['id_solicitud'];?>" max="<?php echo $datos['id_solicitud'];?>" name="id_solicitud" value="<?php echo $datos['id_solicitud'];?>"></td>
        </tr>
        <tr>
            <td><label for="comentario">Comentario: <sup>*</sup></label></td>
            <td><input type="text" name="comentario" value="<?php echo $datos['comentario'];?>"></td>
        </tr>
        <tr>
            <td>
                <form action="<?php echo RUTA_URL;?>paginas/inicioMod" method="POST">
                <input type="submit" value="Volver" id="sub_conf_ingresar">
                </form>
            </td>
            <td><input type="submit" value="Advertir" id="sub_conf_ingresar"></td>
        </tr>
    </table>
    </form>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>  
<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['administrador'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerAdministrador.php'; ?>
    <form class="formulario" action="<?php echo RUTA_URL;?>paginas/editarModerador/<?php echo $datos['id_moderador'];?>" method="POST">
    <table class="tblIngresar">
        <th>Editar moderador</th>
        <tr>
            <td><label for="rut">Rut: <sup>*</sup></label></td>
            <td><input type="text" name="rut" value="<?php echo $datos['rut'];?>"></td>
        </tr>
        <tr>
            <td><label for="nombre">Nombre: <sup>*</sup></label></td>
            <td><input type="text" name="nombre" value="<?php echo $datos['nombre'];?>"></td>
        </tr>
        <tr>
            <td><label for="apellido">Apellido: <sup>*</sup></label></td>
            <td><input type="text" name="apellido" value="<?php echo $datos['apellido'];?>"></td>
        </tr>
        <tr>
            <td><label for="email">Email: <sup>*</sup></label></td>
            <td><input type="text" name="email" value="<?php echo $datos['email'];?>"></td>
        </tr>
        <tr>
            <td><label for="contrasena">Contraseña: <sup>*</sup></label></td>
            <td><input type="text" name="contrasena" value="<?php echo $datos['contrasena'];?>"></td>
        </tr>
        <tr>
            <td><label for="estado">Estado: <sup>*</sup></label></td>
            <td><input type="number" min="0" max="1" name="estado" value="<?php echo $datos['estado'];?>"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                <form action="<?php echo RUTA_URL;?>paginas/admModerador" method="POST">
                <input type="submit" value="Volver" id="sub_conf_ingresar">
                </form>
            </td>
            <td><input type="submit" value="Editar moderador" id="sub_conf_ingresar"></td>
        </tr>
    </table>
    </form>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>  
<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['administrador'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerAdministrador.php';?>
    <table id="customers">
        <thead>
            <tr><th>Moderadores</th></tr>
            <tr>
                <th>Id</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['moderadores'] as $moderador) : ?>
            <tr>
                <td><?php echo $moderador->ID_Moderador; ?></td>
                <td><?php echo $moderador->Rut; ?></td>
                <td><?php echo $moderador->Nombre; ?></td>
                <td><?php echo $moderador->Apellido; ?></td>
                <td><?php echo $moderador->Email; ?></td>
                <td><?php echo $moderador->Contrasena; ?></td>
                <td><?php echo $moderador->Estado; ?></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/editarModerador/<?php echo $moderador->ID_Moderador; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/modificar.png"></a></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/eliminarModerador/<?php echo $moderador->ID_Moderador; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/borrar.png"></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
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
            <tr><th>RECOLECTORES</th></tr>
            <tr>
                <th>Id</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['recolectores'] as $recolector) : ?>
            <tr>
                <td><?php echo $recolector->ID_Recolector; ?></td>
                <td><?php echo $recolector->Rut; ?></td>
                <td><?php echo $recolector->Nombre; ?></td>
                <td><?php echo $recolector->Apellido; ?></td>
                <td><?php echo $recolector->Fecha_Nacimiento; ?></td>
                <td><?php echo $recolector->Telefono; ?></td>
                <td><?php echo $recolector->Email; ?></td>
                <td><?php echo $recolector->Contrasena; ?></td>
                <td><?php echo $recolector->Estado; ?></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/editarRecolector/<?php echo $recolector->ID_Recolector; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/modificar.png"></a></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/eliminarRecolector/<?php echo $recolector->ID_Recolector; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/borrar.png"></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
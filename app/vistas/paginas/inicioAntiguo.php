<?php require RUTA_APP . '/vistas/includes/header.php';?>
<table>
    <thead>
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
    <?php foreach($datos['usuarios'] as $usuario) : ?>
        <tr>
            <td><?php echo $usuario->ID_Usuario; ?></td>
            <td><?php echo $usuario->Rut; ?></td>
            <td><?php echo $usuario->Nombre; ?></td>
            <td><?php echo $usuario->Apellido; ?></td>
            <td><?php echo $usuario->Fecha_Nacimiento; ?></td>
            <td><?php echo $usuario->Telefono; ?></td>
            <td><?php echo $usuario->Email; ?></td>
            <td><?php echo $usuario->Contrasena; ?></td>
            <td><?php echo $usuario->Estado; ?></td>
            <td><a href="<?php echo RUTA_URL;?>paginas/editar/<?php echo $usuario->ID_Usuario; ?>">Editar</a></td>
            <td><a href="<?php echo RUTA_URL;?>paginas/eliminar/<?php echo $usuario->ID_Usuario; ?>">Eliminar</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
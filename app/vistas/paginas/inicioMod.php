<?php
    session_start();
    //error_reporting(0);
    $varsesion = $_SESSION['moderador'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerModerador.php';?>
<table id="customers">
        <thead>
            <tr><th>Solicitudes Pendientes</th></tr>
            <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Ciudad</th>
                <th>Comuna</th>
                <th>Calle</th>
                <th>Numero</th>
                <th>Tipo Domicilio</th>
                <th>Punto de referencia </th>
                <th>Coordenada x</th>
                <th>Coordenada y</th>
                <th>Id tipo recoleccion</th>
                <th>Id usuario</th>
                <th>Id recolector</th>
                <th>Id imagen</th>
                <th>Seguimiento</th>
                <th>Validacion usuario</th>
                <th>Validacion recolector</th>
                <th>Estado</th>
                <th>Fecha de creacion</th>
                <th>Revisar imagenes</th>
                <th>Validar solicitud</th>
                <th>Advertir usuario</th>
                <th>Notificar Admin</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($datos['solicitudes'] as $solicitud) : ?>
            <tr>
                <td><?php echo $solicitud->ID_Solicitud; ?></td>
                <td><?php echo $solicitud->Producto; ?></td>
                <td><?php echo $solicitud->Descripcion; ?></td>
                <td><?php echo $solicitud->Ciudad; ?></td>
                <td><?php echo $solicitud->Comuna; ?></td>
                <td><?php echo $solicitud->Calle; ?></td>
                <td><?php echo $solicitud->Numero; ?></td>
                <td><?php echo $solicitud->Tipo_Domicilio; ?></td>
                <td><?php echo $solicitud->Punto_referencia; ?></td>
                <td><?php echo $solicitud->Coordenada_x; ?></td>
                <td><?php echo $solicitud->Coordenada_y; ?></td>
                <td><?php echo $solicitud->ID_TRecoleccion; ?></td>
                <td><?php echo $solicitud->ID_Usuario; ?></td>
                <td><?php echo $solicitud->ID_Recolector; ?></td>
                <td><?php echo $solicitud->ID_Imagen; ?></td>
                <td><?php echo $solicitud->Seguimiento; ?></td>
                <td><?php echo $solicitud->Validacion_usuario; ?></td>
                <td><?php echo $solicitud->Validacion_recolector; ?></td>
                <td><?php echo $solicitud->Estado; ?></td>
                <td><?php echo $solicitud->Fecha_creacion; ?></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/revisarImagenes/<?php echo $solicitud->ID_Solicitud; ?>/<?php echo $solicitud->ID_Usuario; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/revisarImagen.png"></a></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/validarSolicitud/<?php echo $solicitud->ID_Solicitud; ?>/<?php echo $solicitud->ID_Usuario; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/validar.png"></a></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/advertirUsuario/<?php echo $solicitud->ID_Solicitud; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/advuser.png"></a></td>
                <td><a href="<?php echo RUTA_URL;?>paginas/advertirAdministrador/<?php echo $solicitud->ID_Solicitud; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/advadmin.png"></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
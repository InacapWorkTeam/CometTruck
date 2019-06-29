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
        <?php foreach($datos['solicitudesUsuario'] as $solicitud) : ?>
        <form class="formulario" action="<?php echo RUTA_URL;?>paginas/editarSolicitudUsuario/<?php echo $solicitud->ID_Solicitud;?>" method="POST">
        <table class="tblIngresar">
            <tr><th>Mis solicitudes</th></tr>
            <tr> 
                <td>ID Solicitud</td>
                <td><?php echo $solicitud->ID_Solicitud; ?></td>
            </tr>
            <tr>
                <td>Producto</td>
                <td><?php echo $solicitud->Producto; ?></td>
            </tr>
            <tr>
                <td>Descripcion</td>    
                <td><?php echo $solicitud->Descripcion; ?></td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td><?php echo $solicitud->Ciudad; ?></td>
            </tr>
            <tr>
                <td>Comuna</td>
                <td><?php echo $solicitud->Comuna; ?></td>
            </tr>
            <tr>
                <td>Calle</td>
                <td><?php echo $solicitud->Calle; ?></td>
            </tr>
            <tr>
                <td>Numero domicilio</td>
                <td><?php echo $solicitud->Numero; ?></td>
            </tr>
            <tr>
                <td>Tipo domicilio</td>
                <td><?php echo $solicitud->Tipo_Domicilio; ?></td>
            </tr>
            <tr>
                <td>Punto de referencia</td>
                <td><?php echo $solicitud->Punto_referencia; ?></td>
            </tr>
            <tr>
                <td>Seguimiento</td>
                <td><?php echo $solicitud->Seguimiento; ?></td>
            </tr>
            <tr>
                <td><a href="<?php echo RUTA_URL;?>paginas/visualizarImagenes/<?php echo $solicitud->ID_Solicitud; ?>"><img class="icono" src="<?php echo RUTA_URL;?>IMG/revisarImagen.png"></a></td>
                <td><input type="submit" value="Modificar" id="sub_conf_ingresar"></td>
            </tr>
        </table>
        </form>
        <?php endforeach;?>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
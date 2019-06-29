<?php
    session_start();
    $varsesion = $_SESSION['recolector'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerRecolector.php';?>
            <form name="formulario" method="post" action="<?php echo RUTA_URL;?>paginas/subirOferta">
                    <table class=tblIngresar>
                        <tr>
                            <td>
                                <p id="redondela">O</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre oferta</td>
                            <td>
                                <input type="text" name="nombre" value="" placeholder="Nombre de oferta" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Precio</td>
                            <td>
                                <input type="text" name="precio" value="" placeholder="Precio de la oferta" size="50">     
                            </td>
                        </tr> 
                        <tr>
                            <td>Fecha</td>
                            <td>
                                <input type="date" name="fecha" value="" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Confirmar" id="sub_confirmar" ></td>
                        </tr>
                    </table>
            </form>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
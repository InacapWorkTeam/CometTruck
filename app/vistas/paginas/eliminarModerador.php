<?php require RUTA_APP . '/vistas/includes/headerAdministrador.php';?>
<table class="tblIngresar">
    <tr>
        <td>¿Esta seguro/a?</td>
        <td>   
            <form action="<?php echo RUTA_URL;?>paginas/eliminarModerador/<?php echo $datos['id_moderador'];?>" method="POST"> 
            <input type="submit" value="Eliminar" id="sub_conf_ingresar">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="<?php echo RUTA_URL;?>paginas/admModerador" method="POST">
                <input type="submit" value="Volver" id="sub_conf_ingresar">
            </form>
        </td>
    </tr>
</table>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>  
<?php require RUTA_APP . '/vistas/includes/header.php';?>
<form name="ingresar" method="post" action="<?php echo RUTA_URL;?>paginas/login">
            <table class="tblIngresar">
                <?php if(isset( $datos['mensaje'])) {?>
                    <tr>
                        <td></td>
                        <td class="errorLogin"><?php echo $datos['mensaje'];?></td>
                    </tr>
                <?php }?>
                <tr>
                    <td>Tipo de cuenta</td>
                    <td>
                        <input type="text" name="cuenta" value="" placeholder="Usuario/Recolector/Moderador/Administrador" size="40">
                    </td>
                </tr>
                <tr>
                    <td>Rut</td>
                    <td>
                        <input type="text" name="rut" value="" placeholder="Ingrese rut" size="30">
                    </td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td>
                    <input type="password" name="contrasena" value="" placeholder="Ingrese contraseña" size="30">     
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br>
                        <input type="submit" value="Confirmar" id="sub_conf_ingresar">
                    </td>
                    </th>
                </tr>
                <tr>
                <td></td>
                    <td>
                    <a class="olvidoCon" href="#">¿Olvisaste tu contraseña?</a>  
                    </td>
                </tr>
            </table>
 </form>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
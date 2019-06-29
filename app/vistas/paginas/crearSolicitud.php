<?php require RUTA_APP . '/vistas/includes/headerUsuario.php';?>
<script async type="text/javascript" src="<?php echo RUTA_URL;?>JS/mapa.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7L-s7sFpWB_X1guPIPFqra7m7KQr68Pc&callback=initMap"></script>
<form name="formulario" method="post" action="<?php echo RUTA_URL;?>paginas/solicitudRetiro">
                    <table class="tblIngresar">
                    <?php if(isset( $datos['mensaje'])) {?>
                        <tr>
                            <td></td>
                            <td class="errorLogin"><?php echo $datos['mensaje'];?></td>
                        </tr>
                    <?php }?>
                    <tr>
                    <td>
                        <p id="redondela">S</p>
                    </td>
                    <td>Solicitud de retiro</td>
                        </tr>    
                        <tr>
                            
                        </tr>
                        <tr>
                            <td>Producto</td>
                            <td>
                                <input type="text" name="producto" value="" placeholder="Producto" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td>
                                <input type="text" name="descripcion" value="" placeholder="Descripcion" size="50">     
                            </td>
                        </tr> 
                        <tr>
                            <td>Ciudad</td>
                            <td>
                                <input type="text" name="ciudad" value="" placeholder="Ingrese ciudad" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Comuna</td>
                            <td>
                                <input type="text" name="comuna" value="" placeholder="Comuna" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Calle</td>
                            <td>
                                <input type="text" name="calle" value="" placeholder="Calle" size="50">    
                            </td>
                        </tr>
                        <tr>
                            <td>Numero de calle</td>
                            <td>
                                <input type="text" name="numeroCalle" value="" placeholder="Numero calle" size="50"> 
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo de domicilio</td>
                            <td>
                                    <input type="text" name="tipoDomicilio" value="" placeholder="Tipo Domicilio" size="50">     
                            </td>
                        </tr>
                        <tr>
                            <td>Punto de referencia</td>
                            <td>
                                    <input type="text" name="puntoReferencia" value="" placeholder="Punto de referencia" size="50">     
                            </td>
                        </tr>
                        <tr>
                            <td>Mapa</td>
                            <td class="mapa"><div id="map"></div></td>
                        </tr>
                        <form action="" method="post">
                            <tr>
                                <td></td>
                                <td>
                                        <input type='text' name='searchAddress' class="form-control" placeholder='Confirma tu direccion'/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type='submit' value='Localizar' id="sub_confirmar" /></td>
                            </tr>
                        </form>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Confirmar" id="sub_confirmar" ></td>
                        </tr>
                    </table>
            </form>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>   
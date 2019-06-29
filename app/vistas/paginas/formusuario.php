<!DOCTYPE html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-ompatible" content="ie-edge">
    <meta name="viewport"  content="width-device-width, initial-scale-1">

    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>css/claudio.css" title="style"/>

    <title>Formulario</title>
</head>
<html>
    <body width="90%" oncopy="return false" onpaste="return false">
            <form name="formulario" method="post" action="<?php echo RUTA_URL;?>paginas/formusuario">
                    <table>
                        <tr>
                            <td>
                                <p id="redondela">1</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Rut</td>
                            <td>
                                <input type="text" name="rut" value="" placeholder="Ingrese su rut" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>
                                <input type="text" name="nombre" value="" placeholder="Ingrese nombre" size="50">     
                            </td>
                        </tr> 
                        <tr>
                            <td>Apellido</td>
                            <td>
                                <input type="text" name="apellido" value="" placeholder="Ingrese apellido" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha de nacimiento</td>
                            <td>
                                <input type="text" name="fechaNacimiento" value="" placeholder="año/mes/dia" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Teléfono/Celular</td>
                            <td>
                                <input type="text" name="telefono" value="" placeholder="Ingrese teléfono" size="50">    
                            </td>
                        </tr>
                        <tr>
                            <td>Correo Electrónico</td>
                            <td>
                                <input type="text" name="email" value="" placeholder="Ingrese correo electrónico" size="50"> 
                            </td>
                        </tr>
                        <tr>
                             <td>
                                        <p id="redondela">2</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td>
                                    <input type="password" name="contrasena" value="" placeholder="Ingrese contraseña" size="50">     
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Confirmar" id="sub_confirmar" ></td>
                        </tr>
                    </table>
            </form>
    </body>
</html>
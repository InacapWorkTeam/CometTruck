<?php require RUTA_APP . '/vistas/includes/header.php'; ?>
<a href="<?php echo RUTA_URL;?>paginas"><i> Volver</i></a>
<div>
    <h2>Agregar Usuarios</h2>
    <form action="<?php echo RUTA_URL;?>paginas/agregar" method="POST">
        <div>
            <label for="nombre">Rut: <sup>*</sup></label>
            <input type="text" name="rut">
        </div>
        <div>
            <label for="nombre">Nombre: <sup>*</sup></label>
            <input type="text" name="nombre">
        </div>
        <div>
            <label for="nombre">Apellido: <sup>*</sup></label>
            <input type="text" name="apellido">
        </div>
        <div>
            <label for="nombre">Fecha de nacimiento: <sup>*</sup></label>
            <input type="text" name="fechaNacimiento">
        </div>
        <div>
            <label for="nombre">Telefono: <sup>*</sup></label>
            <input type="text" name="telefono">
        </div>
        <div>
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="nombre">Contraseña: <sup>*</sup></label>
            <input type="password" name="contrasena">
        </div>
        <input type="submit" value="Crear cuenta">
    </form>
</div>
<?php require RUTA_APP . '/vistas/includes/footer.php';?>  
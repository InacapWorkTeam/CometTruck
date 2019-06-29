<?php
    session_start();
    $varsesion = $_SESSION['recolector'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>css/claudio.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script async type="text/javascript" src="<?php echo RUTA_URL;?>JS/header.js"></script>
    <title><?php NOMBRE_SITIO;?></title>
</head>
<body oncopy="return false" onpaste="return false">
   <header>
        <div class="logo"><a href="<?php echo RUTA_URL;?>paginas/inicioRec"><img class="logo_IMG" src="<?php echo RUTA_URL;?>IMG/retiralo_completo_2.png"></a></div>
 
       <nav class="activate">
           <ul>
               <li class="sub-menu"><a href="#">Servicios</a>
                    <ul>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                    </ul>
               </li>
               <li><a href="#" >Equipo</a></li>
               <li><a href="#" >Contacto</a></li>
               <li><a href="#" >Quienes somos</a></li>
               <li><a href="#">Bienvenido <?php echo $_SESSION['recolector'];?></a></li>
               <li class="sub-menu">
                   <a href="#"><img class="imgUsuario" src="<?php echo RUTA_URL;?>IMG/imgPerfilUser.png"></a>
                    <ul>
                    <li><a href="<?php echo RUTA_URL;?>paginas/oferta">Retiros disponibles</a></li>
                    <li><a href="#">Mis retiros</a></li>
                    <li><a href="<?php echo RUTA_URL;?>paginas/cerrarSesion">Cerrar sesion</a></li>
                    </ul>
               </li>
           </ul>
       </nav>
       <div class="menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
   </header>
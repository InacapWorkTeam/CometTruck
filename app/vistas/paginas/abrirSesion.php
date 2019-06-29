<?php

    session_start();
    $_SESSION['usuario'] = 'nombreUsuario';
    header("Location:panel.php");
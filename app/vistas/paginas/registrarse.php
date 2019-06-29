<?php require RUTA_APP . '/vistas/includes/header.php';?>
<script async type="text/javascript" src="<?php echo RUTA_URL;?>JS/registrarse.js"></script>
        <div class="tab-container">
            <ul class="tabs" id="tabs">
                <li class="tabs_item active">Cliente</li>
                <li class="tabs_item">Recolector</li>
            </ul>
            <div class="panels">
                <div class="panels_item active">
                    <object class="object" type="text/html" data="<?php echo RUTA_URL;?>paginas/formusuario"></object>
                </div>           
                <div class="panels_item">
                    <object class="object" type="text/html" data="<?php echo RUTA_URL;?>paginas/formrecolector" ></object>
                </div>    
            </div>
        </div> <!-- fin div .tab-container -->
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
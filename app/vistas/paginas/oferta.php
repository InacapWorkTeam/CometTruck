<?php
    session_start();
    $varsesion = $_SESSION['recolector'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<?php require RUTA_APP . '/vistas/includes/headerRecolector.php';?>
<?php
    session_start();
    $varsesion = $_SESSION['recolector'];
    
    if($varsesion == null || $varsesion == '') {
        echo 'Sin autorizacion';
        die();
    }
?>
<script async type="text/javascript" src="<?php echo RUTA_URL;?>JS/oferta.js"></script>
            <div class="wrap">
                <!-- <h1>OFERTAS DE RECOLECCIÓN </h1> -->
                    <div class="store_wrapper">
                        <div class="category_list"><!-- Menú Izquierdo -->
                            <a href="#" class="category_item ct_item_active" category="all">Todo</a>
                            <a href="#" class="category_item" category="Dormitorio">Dormitorio</a>
                            <a href="#" class="category_item" category="Living">Living</a>
                            <a href="#" class="category_item" category="Cocina">Cocina</a>
                        </div>
                    <section class="product_list">
                        <!-- DORMITORIO -->
                        <div class="product_item" category="Dormitorio">
                            <img src="<?php echo RUTA_URL;?>IMG/cama_1pza.jpeg" alt="">
                            <a href="<?php echo RUTA_URL;?>paginas/ofertarRecolector">Cama 1 plaza</a>
                        </div>
                        <div class="product_item" category="Dormitorio">
                            <img src="<?php echo RUTA_URL;?>IMG/cuna.jpg" alt="">
                            <a href="#">Cuna</a>
                        </div>
                        <!-- LIVING -->
                         <div class="product_item" category="Living">
                            <img src="<?php echo RUTA_URL;?>IMG/sillon.jpg" alt="">
                            <a href="#">Sillón</a>
                        </div>
                        <div class="product_item" category="Living">
                            <img src="<?php echo RUTA_URL;?>IMG/mesacentro.jpeg" alt="">
                            <a href="#">Mesa de centro</a>
                        </div>
                        <!-- COCINA -->
                        <div class="product_item" category="Cocina">
                            <img src="<?php echo RUTA_URL;?>IMG/cocina.jpg" alt="">
                            <a href="#">Cocina</a>
                        </div>
                        <div class="product_item" category="Cocina">
                                <img src="<?php echo RUTA_URL;?>IMG/refrigerador.jpg" alt="">
                                <a href="#">Regrigerador</a>
                        </div>
                    </section>
                </div><!-- .store-wrapper -->
            </div> <!-- .wrap -->
<?php require RUTA_APP . '/vistas/includes/footer.php';?>
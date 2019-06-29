$(document).ready(function(){
    //Agregar clase active al primer enlace
    $('.category_list .category_item[category="all"]').addClass('ct_item_active');
 
    //Filtrar productos
    $('.category_item').click(function(){
        var catProduct = $(this).attr('category');
        console.log(catProduct);

        //Agregar clase active al enlace seleccionado
        $('.category_item').removeClass('ct_item_active');
        $(this).addClass('ct_item_active');

        //Ocultar productos
        $('.product_item').css('transform', 'scale(0)');
        function hideProduct(){
            $('.product_item').hide();
        }setTimeout(hideProduct, 400);

        //Mostrando productos
        function showProduct(){
            $('.product_item[category="'+catProduct+'"]').show();
            $('.product_item[category="'+catProduct+'"]').css('transform', 'scale(1)');
        }setTimeout(showProduct, 400);
    });

    //Mostrando todos los productos
    $('.category_item[category="all"]').click(function(){
        function showAll(){
            $('.product_item').show();
            $('.product_item').css('transform', 'scale(1)');
        }setTimeout(showAll, 400);
    });
});
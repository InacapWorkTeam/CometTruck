$(document).ready(function(){
    // Al hacer click la sección en que esta el selector 'menu' mostrar el selector 'activate' de la etiqueta 'nav'
    $('.menu').click(function(){
        $('nav').toggleClass('activate');
    })
    $('ul li').click(function(){
    // Al hacer click remueve relacionados con el selector 'activate'
        $(this).siblings().removeClass('activate');
        $(this).toggleClass('activate');
    })
});

// alert('hola');
(function(d){

    let tabs = Array.prototype.slice.apply(d.querySelectorAll('.tabs_item')); 
    let panels = Array.prototype.slice.apply(d.querySelectorAll('.panels_item'));
    // console.log(tabs);
    // console.log(panels);

    // Escucha el evento click y ejecuta la función más abajo iniciada
    d.getElementById('tabs').addEventListener('click', e =>{ //function(e)
        
        // Apuntar al selector de clase
        if(e.target.classList.contains('tabs_item')){
           let i = tabs.indexOf(e.target);
           //MAP: permite recorrer el Array sin hacer un ciclo y modificar a cada elemento
           // Remueve el selector de clase 'active' para mostrar el tab seleccionado
           tabs.map(tab => tab.classList.remove('active'))
           tabs[i].classList.add('active');
           panels.map(panel => panel.classList.remove('active'))
           panels[i].classList.add('active');
        }
    }
    );
})(document);


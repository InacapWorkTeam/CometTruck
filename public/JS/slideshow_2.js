var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slide_IMG");
  // Calculo de la cantidad de elementos de la clase y que no se desplieguen
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  slideIndex++;
  // Comparación de la cantidad de elementos con 'slideIndex' y despliegue del block según su cantidad
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 5000);
}
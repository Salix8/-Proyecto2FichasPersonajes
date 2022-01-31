$(document).ready(function(){

  $.fn.generaNuevosCampos = function(etiqueta, nombreCampo, indice) {

    return $(this).each(function(){
      elem = $(this);
      elem.data(`etiqueta`, etiqueta);
      elem.data(`nombreCampo`, nombreCampo);
      elem.data(`indice`, indice);
      
      elem.click(function(e){
        e.preventDefault();
        elem = $(this);
        etiqueta = elem.data(`etiqueta`);
        nombreCampo = elem.data(`nombreCampo`);
        indice = elem.data(`indice`);
        textoInsertar = `<p> ${etiqueta} ${indice}: <br>
        <input type="text" name="${nombreCampo} ${indice}"/></p>`;
        indice ++;
        elem.data(`indice`, indice);
        nuevoCampo = $(textoInsertar);
        elem.before(nuevoCampo);
      });
    });

  };

  $("#mascampos").generaNuevosCampos("Habilidad", "habilidad", 1);
});



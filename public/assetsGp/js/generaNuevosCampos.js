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
        textoInsertar = `
        <div class="box">
          <h2 class="subtitle"> ${etiqueta} ${indice} </h2> 
          <div class="container-traits">
            <div class="options-traits-item">
              <div class="field has-addons-centered">
                <label class="label">Tipo de acción</label>
                <div class="control">
                  <span class="select is-small">
                    <select name="tipo de habilidad">
                      <option value="accion">Acción</option>
                      <option value="accionAdicional">Acción adicional</option>
                      <option value="reacción">Redacción</option>
                      <option value="otro">Otro</option>
                    </select>
                  </span>
                </div>
              </div>
            </div>
              
            <div class="field">
              <label class="label">Nombre del Rasgo</label>
              <div class="control has-icons-left is-clearfix">
                <input type="text" autocomplete="on" placeholder="Nombre del rasgo 1" name ="${nombreCampo} ${indice} Title" class="input">
                <span class="icon is-left"><i class="mdi mdi-format-title mdi-24px"></i></span>
              </div>
            </div>
            <div class="foptions-traitsield">
              <label class="label">Descripcion<span data-label="" class="is-dark is-top is-medium b-tooltip is-multiline" style="transition-delay: 0ms;">
                <span class="icon is-small">
                  <i class="mdi mdi-help-circle-outline"></i>
                </span>
              </span>
            </label>
            <div class="control has-icons-right">
              <textarea maxlength="9999" name ="${nombreCampo} ${indice} Desc" placeholder="Descripcion del Rasgo 1" class="textarea" ></textarea>
              <span class="icon is-right has-text-danger">
                <i class="mdi mdi-alert-circle mdi-24px"></i>
              </span>
              <small class="help counter is-invisible">0 / 9999</small>
            </div>
            <p class="help is-danger">Se requiere la descripcion de la habilidad</p>
          </div>
        </div>
        `;

        indice ++;
        elem.data(`indice`, indice);
        nuevoCampo = $(textoInsertar);
        elem.before(nuevoCampo);
      });
    });

  };

  $("#mascampos").generaNuevosCampos("Rasgo", "rasgo", 1);
});



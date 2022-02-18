$(document).ready(function(){

    $(`#personaje_save`).on(`click`, (event)=>{
        event.preventDefault();
        $(`#personaje_rasgo`).val(createJSON());
        $(`form`).submit();

    })

    function createJSON() {

        let contenedor = $(`#contenedor-rasgo`);
        let rasgos = contenedor.find(`.box-rasgo`);

        let dataToUpload = [];

        rasgos.each(function( index ) {
            let dataToUploadRasgo = {
                tipoAccion: $( this ).find(`.select-tipoAccion`).val(),
                titulo:  $( this ).find(`.input`).val(),
                descripcion:  $( this ).find(`.textarea`).val()
            }
            console.log(dataToUploadRasgo);
            dataToUpload.push(dataToUploadRasgo);
        });

       localStorage.setItem(`datos`, JSON.stringify(dataToUpload));
        return JSON.stringify(dataToUpload);
        
        /* $.ajax({
            type: `GET`,
            url: `/personaje/nuevo/rasgo/`  + JSON.stringify(dataToUpload)
        })
        .done((data)=>{
            alert(`Los datos se han enviado correctamente`);
            return
        }); */
        
    }
});
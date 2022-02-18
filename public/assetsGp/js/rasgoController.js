$(document).ready(function(){

    $(`#personaje_save`).on(`click`, (event)=>{
        event.preventDefault();
        $(`#personaje_rasgo`).val(createJSON());
        $(`form`).submit();
    })

    function createJSON() {

        let dataToUpload = {
            tipoAccion: $(`.select-tipoAccion`).val(),
            titulo: $(`.input`).val(),
            descripcion: $(`.textarea`).val()
        }

        localStorage.setItem(`datos`, JSON.stringify(dataToUpload));
        return JSON.stringify(dataToUpload);
        
        $.ajax({
            type: `GET`,
            url: `/personaje/nuevo/rasgo/`  + JSON.stringify(dataToUpload)
        })
        .done((data)=>{
            alert(`Los datos se han enviado correctamente`);
            return
        });
        
    }
});
$(document).ready(function(){

    $(`#personaje_save`).on(`click`, (event)=>{
        event.preventDefault();
        createJSON();
        $(`form`).submit();
    })

    function createJSON() {

        let dataToUpload = {
            tipoAccion: $(`.select-tipoAccion`).val(),
            titulo: $(`.input`).val(),
            descripcion: $(`.textarea`).val()
        }

        localStorage.setItem(`datos`, JSON.stringify(dataToUpload));

        $.ajax({
            type: `POST`,
            url: ``,
            data: JSON.stringify(dataToUpload)
        })
        .done(()=>{
            alert(`Los datos se han enviado correctamente`);
        });
        
    }
});
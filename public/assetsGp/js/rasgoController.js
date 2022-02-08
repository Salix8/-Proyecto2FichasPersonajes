$(document).ready(function(){

    function crearJSON() {
        alert($(`.select-tipoAccion`).val());
        alert($(`.input`).val());
        alert($(`.textarea`).val());
    }

    

    $(`#form_save`).on(`click`, (event)=>{
        event.preventDefault();
        /* createJSON(); */
        crearJSON();
        $(`form`).submit();
    })

    function createJSON() {
        jsonObj = [];
        console.log($(`.select-tipoAccion`).val());

        console.log($(`.input`).val());
        console.log($(`.textarea`).val())

        $(`.select-tipoAccion`).each(function() {
            alert("select");
            var id = $(this).prop("title");
            var text = $(this).val();
    
            item = {}
            item ["title"] = id;
            item ["text"] = text;
    
            jsonObj.push(item);
        });
        console.log($(`.input`));
        $("input[type='text']").each(function() {
            alert("input");
            var id = $(this).prop("title");
            var text = $(this).val();
    
            item = {}
            item ["title"] = id;
            item ["text"] = text;
    
            jsonObj.push(item);
        });

        $(`.textarea`).each(function() {
            alert("textarea");

            var id = $(this).prop("title");
            var text = $(this).val();
    
            item = {}
            item ["title"] = id;
            item ["text"] = text;
    
            jsonObj.push(item);
        });
    
        console.log(jsonObj);
        alert(JSON.stringify(jsonObj));
    }
});
/*$(document).ready(()=>{

    let classd20 = $(`.d20`);
    let i;
    
    $(`.d20`).on(`click`, function(){
        let tirada = d20();
        let mod = $(`.d20`).val();
        console.log(`${tirada} + ${mod} = ` + (tirada + parseInt(mod)));
    });
});*/

window.addEventListener(`load`, ()=>{
    let classd20 = document.getElementsByClassName(`d20`);
    let i;

    for (i = 0; i < classd20.length; i++) { 
        classd20[i].addEventListener(`click`, function() {
            let tirada = d20();
            console.log(`${tirada} + ${this.textContent()} = ` + (tirada + parseInt(classd20[i])));
        });
    }
});


function random(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
}

function d20() {
    return Math.floor((Math.random() * (20 - 1 + 1)) + 1);
}
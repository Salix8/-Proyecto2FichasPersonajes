

//Cuando el usuario haga scroll, se ejecutara la función

window.addEventListener(`load`, ()=>{
    window.addEventListener(`scroll`, ()=>{
        scrollProgressBar();
    })
});

function scrollProgressBar() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById(`progress_bar`).style.width = scrolled + `%`;
}
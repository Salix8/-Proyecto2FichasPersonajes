
window.addEventListener(`load`, ()=>{
    setTimeout(typeWriter, 2000);
});
  
  var i = 0;
  var txt = `Compendio Gremial de Adarak`;
  var speed = 70;
  
    function typeWriter() {
        if (i < txt.length) {
            document.getElementById(`hero_Id`).innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
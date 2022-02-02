
window.addEventListener(`load`, ()=>{

    document.getElementById(`selectCustomer`).addEventListener(`change`, ()=>{
      enviar();
    })
  });
  
  function creaObjetoAjax () { //Mayoría de navegadores
    var obj;
    if (window.XMLHttpRequest) {
      obj=new XMLHttpRequest();
    }
    else { //para IE 5 y IE 6
      obj=new ActiveXObject(Microsoft.XMLHTTP);
    }
    return obj;
  }
  
  function enviar() {
    //Recoger datos del formulario:
    reemail=document.datos.miemail.value; //Email escrito por el usuario
    recontra1=document.datos.micontra1.value; //Contraseña primera
    recontra2=document.datos.micontra2.value; //Contraseña segunda
    //datos para el envio por POST:
    misdatos="envioEmail="+reemail+"&envioContra1="+recontra1+"&envioContra2="+recontra2;
    //Objeto XMLHttpRequest creado por la función.
    objetoAjax=creaObjetoAjax();
    //Preparar el envio  con Open
    objetoAjax.open("POST","script.php",true);
    //Enviar cabeceras para que acepte POST:
    objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    objetoAjax.setRequestHeader("Content-length", misdatos.length);
    objetoAjax.setRequestHeader("Connection", "close");
    objetoAjax.onreadystatechange=recogeDatos;
    objetoAjax.send(misdatos);
  } 
  
  function recogeDatos() {
    if (objetoAjax.readyState==4 && objetoAjax.status==200) {
      miTexto=objetoAjax.responseText;
      document.getElementById("comp").innerHTML=miTexto;
    }
  }
  
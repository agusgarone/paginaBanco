/* pagina formulario */
var btnEnviar = document.querySelector("#boton");

var inputNom = document.querySelector("#nombre");
var inputApe = document.querySelector("#apellido");
var inputEdad = document.querySelector("#edad");
var inputDni = document.querySelector("#dni");
var inputEmail = document.querySelector("#email");
var inputSueldo = document.querySelector("#sueldo");
var inputEmp = document.querySelector("#empresa");
var inputMonto = document.querySelector("#monto");


btnEnviar.addEventListener('click', () =>{
  var campovacio = "";
  var msjError = "";
  console.log("hola");

  if(inputNom.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputApe.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputEdad.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputDni.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputEmail.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputSueldo.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputEmp.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(inputMonto.value == ""){
    msjError += "Es obligatorio este campo! <br>";
  }
  if(msjError == ""){
    campovacio = "Se ha enviado con exito!";
  }else{
    campovacio = msjError + campovacio; 
    var msj_box =document.querySelector(".msjerror");
    var msj = document.createElement("p");
    msj.append(campovacio);
    msj_box.append(msj);

  }

});

<?php

    $error = ""; 
    $mensajeExito = "";

    if ($_POST) {
        
        if ($_POST['nombre'] == "") {
            
            $error .= "Ingrese su nombre.<br>";
            
        }

        if ($_POST['apellido'] == "") {
            
            $error .= "Ingrese su apellido.<br>";
            
        }
        
        if ($_POST['edad'] == "") {
            
            $error .= "Ingrese su edad.<br>";
            
        }
        
        if ($_POST['dni'] == "") {
            
            $error .= "Ingrese su Dni .<br>";
            
        }
        if ($_POST['email'] == "") {
            
            $error .= "Es obligatorio el campo de email.<br>";
            
        }
        if ($_POST['sueldo'] == "") {
            
            $error .= "Ingrese su sueldo.<br>";
            
        }
        if ($_POST['empresa'] == "") {
            
            $error .= "Ingrese el nombre de la empresa donde trabaja.<br>";
            
        }
        if ($_POST['monto'] == "") {
            
            $error .= "Ingrese el monto a pedir, por favor!.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "Correo electrónico no válido.<br>";
            
        }
        
        if ($error != "") {
            
            $error = "<p>Hubo algún error en el formulario:</p>". $error."";
            
        } else {

            switch ($_POST['edad']) {
                case ($_POST['edad'] > 60):
                    $mensajeExito = "Sos jubilado";

                    if($_POST['sueldo'] > 75000 && $_POST['monto'] < 150000){

                        $porcentaje1 = $_POST['monto']*0.25;
                        $porcentaje2 = $_POST['monto']*0.5;

                        $emailA = $_POST['email'];

                        $valor = $_POST['monto'];
            
                        $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
                        
                        $Mensaje = "Hola, su prestamo ha sido aceptado y le enviaremos las condiciones del mismo! \nSi es en 1 año la cuota es de: ".(($porcentaje1+$_POST['monto'])/12)."\nSi es en 2 años la cuota es de: ".(($porcentaje2+$_POST['monto'])/24).".";
                        
                        $cabeceras = "From: ".$_POST['email'];

                        if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                            
                            $mensajeExito = "<p>Prestamo solicitado con éxito, lo evaluaremos y te avisaremos!</p>";
                            
                        } else {
                            
                            $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
                        }

                    }else{

                        $emailA = $_POST['email'];
            
                        $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
                        
                        $Mensaje = "Hola, no ha sido aceptado, lo lamentamos!";
                        
                        $cabeceras = "From: ".$_POST['email'];

                        if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                            
                            $mensajeExito = "<p>Prestamo solicitado con éxito, lo evaluaremos y te avisaremos!</p>";
                            
                        } else {
                            
                            $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
                        }


                    }
                    break;

                case ($_POST['edad'] > 25 && $_POST['edad'] < 60):
                    if($_POST['sueldo'] > 75000 && $_POST['monto'] < 350000 || $_POST['sueldo'] > 130000){
                        switch ($_POST['monto']) {
                            case ($_POST['monto'] < 150000):
                                $porcentaje1 = ($_POST['monto']*0.25);
                                $porcentaje2 = ($_POST['monto']*0.5);
                                $division1 = 12;
                                $division2 = 24;

                                break;

                            case ($_POST['monto'] > 150000 && $_POST['monto'] < 350000):
                                $porcentaje1 = ($_POST['monto']*0.4);
                                $porcentaje2 = ($_POST['monto']*0.5);
                                $division1 = 24;
                                $division2 = 36;
                                break;

                            case ($_POST['monto'] > 500000):
                                $porcentaje1 = ($_POST['monto']*0.6);
                                $porcentaje2 = ($_POST['monto']*0.75);
                                $division1 = 48;
                                $division2 = 60;
                                break;
                            default:
                                $mensajeExito = "algun error hubo";
                                break;
                        }

                        $emailA = $_POST['email'];
            
                        $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
                        
                        $Mensaje = "Hola, su prestamo ha sido aceptado y le enviaremos las condiciones del mismo! \nEn la primera opcion la cuota es de: ".(($porcentaje1+$_POST['monto'])/$division1)."\nY en la segunda la cuota es de: ".(($porcentaje2+$_POST['monto'])/$division2).".";
                        
                        $cabeceras = "From: ".$_POST['email'];

                        if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                            
                            $mensajeExito = "<p>Prestamo solicitado con éxito, lo evaluaremos y te avisaremos!</p>";
                            
                        } else {
                            
                            $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
                        }
    

                    }else {

                        $emailA = $_POST['email'];
            
                        $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
                        
                        $Mensaje = "Hola, no ha sido aceptado, lo lamentamos!";
                        
                        $cabeceras = "From: ".$_POST['email'];

                        if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                            
                            $mensajeExito = "<p>Prestamo solicitado con éxito, lo evaluaremos y te avisaremos!</p>";
                            
                        } else {
                            
                            $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
                        }


                    }
                    break;

                case ($_POST['edad'] > 18 && $_POST['edad'] < 25):
                    if($_POST['sueldo'] > 75000 && $_POST['monto'] < 150000 || $_POST['sueldo'] > 130000){
                        switch ($_POST['monto']) {
                            case ($_POST['monto'] < 150000):
                                $porcentaje1 = ($_POST['monto']*0.25);
                                $porcentaje2 = ($_POST['monto']*0.5);
                                $division1 = 12;
                                $division2 = 24;
                                break;

                            case ($_POST['monto'] > 150000 && $_POST['monto'] < 350000):
                                $porcentaje1 = ($_POST['monto']*0.4);
                                $porcentaje2 = ($_POST['monto']*0.5);
                                $division1 = 24;
                                $division2 = 36;
                                break;

                            case ($_POST['monto'] > 500000):
                                $porcentaje1 = ($_POST['monto']*0.6);
                                $porcentaje2 = ($_POST['monto']*0.75);
                                $division1 = 48;
                                $division2 = 60;
                                break;
                            default:
                                $mensajeExito = "algun error hubo";
                                break;
                        }

                        $emailA = $_POST['email'];
            
                        $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
                        
                        $Mensaje = "Hola, su prestamo ha sido aceptado y le enviaremos las condiciones del mismo! \nEn la primera opcion la cuota es de: ".(($porcentaje1+$_POST['monto'])/$division1)."\nY en la segunda la cuota es de: ".(($porcentaje2+$_POST['monto'])/$division2).".";
                        
                        $cabeceras = "From: ".$_POST['email'];

                        if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                            
                            $mensajeExito = "<p>Prestamo solicitado con éxito, lo evaluaremos y te avisaremos!</p>";
                            
                        } else {
                            
                            $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
                        }


  

                    }else {

                        $emailA = $_POST['email'];
            
                        $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
                        
                        $Mensaje = "Hola, no ha sido aceptado, lo lamentamos!";
                        
                        $cabeceras = "From: ".$_POST['email'];

                        if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                            
                            $mensajeExito = "<p>Prestamo solicitado con éxito, lo evaluaremos y te avisaremos!</p>";
                            
                        } else {
                            
                            $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
                        }


                    }
                    break;

                default:
                    $mensajeExito = "chau";
                    break;
            }

            /*$emailA = $_POST['email'];
            
            $asunto = "Prestamo por: ".$_POST['nombre']." ".$_POST['apellido'];
            
            $Mensaje = ($_POST['monto']* 0.5) + $_POST['monto'];
            
            $cabeceras = "From: ".$_POST['email'];

            if (mail($emailA, $asunto, $Mensaje, $cabeceras)) {
                
                $mensajeExito = "<p>Mensaje enviado con éxito, nos pondremos en contacto pronto!</p>";
                
            } else {
                
                $error = "<p>El mensaje no pudo ser enviado, por favor inténtalo más tarde</p>";
            }*/
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,100;1,200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <nav>
            <div class="nav-logo">
                Banco-AG
            </div>
            <div class="nav-items">
                <div class="nav-link">
                    <a href="index.html">Inicio</a>
                </div>
                <div class="nav-link">
                    <a href="#">Nosotros</a>
                </div>
                <div class="nav-link">
                    <a href="#">Trabaja con Nosotros</a>
                </div>
            </div>
        </nav>

        <section id ="form-prestamo">
            <form action="" method="POST" >
                <div class="cont-for">
                    <div class="persona">
                        <label for="nombre">Nombre :</label>
                        <input type="text" name="nombre" id="nombre">
                        <label for="apellido">Apellido :</label>
                        <input type="text" name="apellido" id="apellido">
                        <label for="edad">Edad :</label>
                        <input type="text" name="edad" id="edad">
                        <label for="dni">Dni :</label>
                        <input type="number" name="dni" id="dni">
                    </div>

                    <label for="email">Email :</label> <br>
                    <input type="email" name="email" id="email">
                    
                    <div class="datos-trabajo">
                        <label for="sueldo">Sueldo Neto :</label>
                        <input type="number" name="sueldo" id="sueldo">
                        <label for="empresa">Empresa :</label>
                        <input type="text" name="empresa" id="empresa">
                    </div>

                    <label for="monto">Monto :</label> <br>
                    <input type="number" name="monto" id="monto"> <br>
                    <div class="boton">

                        <button type="submit" id="boton">Enviar</button>
                    
                    </div>
                </div>
            </form>
        </section>
        <div class="msjerror">
            <?php echo $error.$mensajeExito; ?>
        </div>

        <section id="footer">
            <h2>&copy All rights reserved by Banco-AG</h2>
        </section>
    </div>
    <script src="app.js"></script>
</body>
</html>
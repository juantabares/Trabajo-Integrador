<?php

require_once("clases/auth.php");
require_once ("soporte.php");

?>

 <!DOCTYPE html>
 <html>
     <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width">
       <title>Trip Community</title>
       <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
       <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
       <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="css/styles.css">
     </head>
     <body>
     <header class="main-header">
 <!--  LOGO -->
            <article class="logo">
              <a href="index.php"><h1>Trip Community</h1></a>
            </article>
 <!--  REGISTRO & LOG IN  -->

          <nav class="reg-log">
            <ul>
            <li><a href="login.php"><input type="submit" name="logueo" value="Ingresá"></a></li>
            <li><a href="registro.php"><input type="submit" name="registro" value="Unite!"></a></li>
          </ul>
          </nav>

                

<!-- TOGGLE   -->
                    <a href="#" class="toggle-nav">
                      <span class="ion-navicon-round"></span>
                    </a>
 <!-- LINKS HEADER   -->
                   <nav class="main-nav">
                     <ul>
                     <li><a href="#">Destinos destacados</a></li>
                     <li><a href="#">Recomendados</a></li>
                     <li><a href="#">Imagenes de viajeros</a></li>
                     <li><a href="#">Datos utiles</a></li>
                     <li><a href="faq.php">Preguntas Frecuentes</a></li>
                    </ul>
                  </nav>
        </header>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <script>
         $('.toggle-nav').click(function(){
             $('.main-nav ul').slideToggle('medium')
         })
     </script>

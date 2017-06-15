<?php

require_once("header.php");
require_once("soporte.php");

  if($auth->estaLogueado()) {
    header("location:index.php");exit;
  }

$email = "";
$password = "";

if (!empty($_POST)){
  $email = $_POST["email"];
  $password = $_POST["password"];
 }

 $errores = [];

 if ($_POST) {
   $errores = $validador->validarLogin($_POST, $db->getRepositorioUsuarios());

     if(empty($errores)) {
       $usuario = $db->getRepositorioUsuarios()->buscarPorEmail($_POST["email"]);
       $auth->loguear($usuario->getId());

       if (isset($_POST["recordarme"])) {
         setcookie("idUsuario", $usuario->getId(), time() + 60 * 60 * 24 * 30);
       }
       header("location:index.php" . $usuario->getId());exit;
     }
   }

 ?>

 <!DOCTYPE html>
 <html>
  <body>
       <?php if(count($errores) > 0) { ?>
           <ul class="errores">
               <?php foreach($errores as $error) { ?>
                 <li>
                   <?=$error?>
                 </li>
               <?php } ?>
           </ul>
         <?php } ?>
<!--Formulario  -->
    <section class="login-form">
     <form class="" action="login.php" method="post">
<h2>Iniciar Sesión</h2>
  <!--Mail  -->
       <div class="campo">
       <input type="text" name="email" value="" required placeholder= "E-mail" >
       </div>
       <br>
  <!--Contraseña  -->
       <div class="campo">
       <input type="password" name="password" value="" required placeholder= "Contraseña">
       </div>
       <br>
<!--Recordar Usuario  -->
       <div class="recordarme">
         <input type="checkbox" name="recordarme"><label>Recordarme</label>
       </div>
       <br>
<!--Olvido de Contraseña  -->
       <div class="olvido">
         <a href="#">Olvido su contraseña?</a>
       </div>
       <br>
<!--Botón Iniciar Sesión   -->
           <button type="submit" name="Iniciar">Ingresá</button>
           <br><br><br><br><br><br><br><br><br>
         </form>
    </section>
<!--FOOTER  -->
        <footer class="main-footer">
                 <section class= "footer-container">
<!---About Us--->
     <div class="about-us">
       <h2>About Us</h2>
       <p>Somos un grupo de amantes de los viajes y las nuevas aventuras, que tiene como premisa la idea de que las experiencias son mejores cuando son compartidas. Te invitamos a que te unas y recomiendes lo imperdible de cada lugar que hayas visitado, como así también te nutras de las experiencias de otros aventureros.
       <br>
       <p>¡Bienvenidx!</p>
      <ul>
      <li><img src="images/gonzalo.jpg" alt="gonzalo"><p>Gonzalo</p></li>
      <li><img src="images/silvina1.jpg" alt="silvina"><p>Silvina</p></li>
      <li><img src="images/juan.jpg" alt="juan"><p>Juan</p></li>
      </ul>
      </div>
<!---Faq--->
           <div class="faq">
           <a href="faq.php">FAQ</a>
           </div>
            <!---Redes Sociales--->
                       <div class="redes-footer">
                         <ul>
                           <li><a href="https://www.facebook.com/"target="new"><img src="images/facebook.png" alt="facebook" width= "10"></a></li>
                           <li><a href="https://www.twitter.com/"target="new"><img src="images/twitter.png" alt="twitter" width= "10"></a></li>
                           <li><a href="http://www.instagram.com/"target="new"><img src="images/instagram.png" alt="instagram" width= "10"></a></li>
                           <li><a href="http://www.youtube.com/"target="new"><img src="images/youtube.png" alt="youtube" width= "10"></a></li>
                         </ul>
                       </div>

                       <div class="derechos">
                         <h3>© Trip Community 2017 - Todos los derechos reservados</h3>
                       </div>
                  </section>
          </footer>
      </body>
 </html>

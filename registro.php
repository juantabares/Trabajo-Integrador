<?php

require_once("header.php");
// require_once("paises.php");
require_once("soporte.php");
require_once("clases/usuario.php");



if($auth->estaLogueado()) {
  header("location:index.php");exit;
}

$nombre = "";
$apellido = "";
$usuario = "";
$email = "";
$password = "";
$password_conf = "";


if (!empty($_POST)){
  $nombre = $_POST["nombre"];
  $apellido = $_POST ["apellido"];
  $usuario = $_POST["usuario"];
  $email = $_POST["email"];
  $password= $_POST["password"];
  $password_conf= $_POST["password_conf"];
 }

 $errores = [];

 if ($_POST) {
   $validar = new Validador();
   $errores = $validar->validarRegistro($_POST, $db->getRepositorioUsuarios());

   if (!isset($errores["nombre"])) {
       $nombre = $_POST["nombre"];
   }
   if (!isset($errores["apellido"])) {
       $apellido = $_POST["apellido"];
   }

   if (!isset($errores["usuario"])) {
       $usuario = $_POST["usuario"];
   }
   if (!isset($errores["email"])) {
       $email = $_POST["email"];
   }


if (count($errores) == 0) {
  $usuario = $_POST;
  $usuario["password"] = Usuario::hashPassword($usuario["password"]);
  $usuario["fecha_nacim"] = $_POST["anio"] . "-" . $_POST["mes"] . "-" . $_POST["dia"];
  $usuario = Usuario::crearDesdeArray($usuario);
  $errores = $usuario->guardarImagen("imagen", $errores);
  if (count($errores) == 0) {
    $usuario->guardar($db->getRepositorioUsuarios());
    header("Location:index.php");exit;
  }
}
var_dump($_POST);
}

?>

<!DOCTYPE html>
<html>
  <body>
    <!--Formulario  -->
  <section class="regis-form">
      <?php if(count($errores) > 0) { ?>
          <ul class="errores">
              <?php foreach($errores as $error) { ?>
                <li>
                  <?=$error?>
                </li>
              <?php } ?>
          </ul>
        <?php } ?>
      <form action="registro.php" method="post" enctype="multipart/form-data">
        <h2>Registración</h2>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class='short_explanation'></div>
        <br>
      <!--Nombre  -->
          <div class="campo">
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required placeholder= "Nombre">
          </div>
          <br>
      <!--Apellido  -->
          <div class="campo">
          <input type="text" name="apellido" value="<?php echo $apellido; ?>" required placeholder= "Apellido">
          </div>
          <br>
      <!--Usuario  -->
          <div class="campo">
          <input type="text" name="usuario" value="<?php echo $usuario; ?>" required placeholder= "Usuario">
          </div>
          <br>
      <!--Mail  -->
          <div class="campo">
          <input type="text" name="email" value="<?php echo $email; ?>" required placeholder= "Dirección de Correo Electrónico" >
          </div>
          <br>
      <!--Contraseña  -->
          <div class="campo">
          <input type="password" name="password" value="<?php echo $password; ?>" required placeholder= "Establecé una Contraseña">
          </div>
          <br>
      <!--Confirma Contraseña  -->
          <div class="campo">
          <input type="password" name="password_conf" value="<?php echo $password_conf; ?>" required placeholder= "Confirmá la Contraseña">
          </div>
          <br>
      <!--Fecha de Nacimiento  -->
          <div class= "fecha_nacim" required>
          <label>Fecha de Nacimiento</label>
          <br>
          <select name="dia">
            <option value="día">Día</option>
            <?php
            for ($i=1; $i <=31; $i++):
            echo"<option> $i</option>";?>
          <?php endfor;?>
          </select>
          <select name="mes">
            <option value="mes">Mes</option>
            <?php
            for ($i=1; $i <=12; $i++):
            echo"<option> $i</option>";?>
            <?php endfor;?>
          </select>
          <select name="anio">
            <option value="año">Año</option>
            <?php
            for ($i=2017; $i >=1905; $i--):
            echo"<option> $i</option>";?>
            <?php endfor;?>
          </select>
        </div>
        <br>
<!--  Lugar de Nacimiento  -->
          <div class="lug-nac"required>
          <label>Lugar de Nacimiento</label>
          <br>
          <select name="lugar_nacim" required>
            <option value="Se">Seleccioná</option>
            <option value="Ar">Argentina</option>
            <option value="Bo">Bolivia</option>
            <option value="Br">Brasil</option>
            <option value="Chi">Chile</option>
            <option value="Ur">Uruguay</option>
          </select>
        </div>
        <br>
<!--Género -->
          <div class="genero"required>
          <input type="radio" name="genero" value="hombre" required><label>Hombre</label>
          <input type="radio" name="genero" value="mujer"required><label>Mujer</label>
          </div>
          <br>
    <!--Imágen de Perfil  -->
          <div class="img-perfil">
          <label>Imágen de Perfil</label>
          <br>
          <input type="file" name="imagen" value="imagen">
          <br><br>
  <!--Tipo de Viajero  -->
          <div class="viajero">
          <label>¿Qué tipo de viajero sos?</label>
          <br><br>
          <input type="checkbox" name="viajero[]" value="Mochilero"><label> Mochilero</label><br>
          <input type="checkbox" name="viajero[]" value="Lujoso"><label> Lujoso</label><br>
          <input type="checkbox" name="viajero[]" value="Laboral"><label> Viajero Laboral</label><br>
          </div>
          <br>
      <!--Lugares de Interés  -->
          <div class="donde">
            <label>¿A dónde te gustaría viajar?</label>
            <br><br>
            <input type="checkbox" name="donde[]" value="Africa"><label> Africa</label><br>
            <input type="checkbox" name="donde[]" value="A-Norte"><label> América del Norte</label><br>
            <input type="checkbox" name="donde[]"  value="A-Sur"><label> América del Sur</label><br>
            <input type="checkbox" name="donde[]" value="Asia"><label> Asia</label><br>
            <input type="checkbox" name="donde[]" value="Europa"><label> Europa</label><br>
            <input type="checkbox" name="donde[]" value="Oceania"><label> Oceania</label><br>
          </div>
          <br><br>

      <!--Botón Enviar   -->
          <button type="submit" name="Enviar">ENVIAR</button>
      </form>
    </section>
    <br><br><br><br><br><br><br><br>
<!--Footer  -->
    <footer class="main-footer">
                <section class= "footer-container">
<!---About Us--->
      <div class="about-us">
          <h2>About Us</h2>
              <p>Somos un grupo de amantes de los viajes y las nuevas aventuras, que tiene como premisa la idea de que las experiencias son mejores cuando son compartidas. Te invitamos a que te unas y recomiendes lo imperdible de cada lugar que hayas visitado, como así también te nutras de las experiencias de otros aventureros.
              <br>
          ¡Bienvenidx!</p>
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

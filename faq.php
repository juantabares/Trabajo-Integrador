<?php

require_once("header.php");

 ?>

<!DOCTYPE html>
<html>
  <body>
  <section class="faq-container">
<!--Preguntas Frecuentes Responsive  -->
      <h2>Preguntas Frecuentes</h2>

          <nav class="faq-nav">
            <ul>
              <li><a href="#configuración"><h4>¿Dónde está mi configuración?</h4></a></li>
              <li><a href="#contraseña"><h4>¿Cómo puedo cambiar o restablecer mi contraseña?</h4></a></li>
              <li><a href="#notificaciones"><h4>¿Cómo puedo elegir sobre qué recibo notificaciones?</h4></a></li>
              <li><a href="#experiencias"><h4>¿Cómo obtengo más vistos y más me gusta en mis experiencias?</h4></a></li>
              <li><a href="#fotos"><h4>¿Cuáles son las fotos más vistas y que reciben más me gusta?</h4></a></li>
              <li><a href="#seguidores"><h4>¿Cómo puedo hacer para tener más seguidores?</h4></a></li>
            </ul>
          </nav>
<!---Las Preguntas Frecuentes--->

<ul class="faqs">

  <li class="q">
    <span class="ion-ios-arrow-down"></span>
    ¿Dónde está mi configuración?
  </li>
  <li class="a">Gummies sweet roll marshmallow topping chupa chups dessert lemon drops. Marzipan wafer dessert gingerbread powder toffee danish tiramisu. Cookie candy fruitcake fruitcake dragée brownie chocolate cake. Jujubes tiramisu chocolate cake croissant sugar plum. Biscuit chocolate macaroon halvah carrot cake chupa chups marzipan. Cake gingerbread apple pie. Chocolate bar lemon drops sweet roll sugar plum. Dessert cookie gummi bears dessert biscuit soufflé tootsie roll lollipop powder. Sweet roll marshmallow apple pie wafer croissant.</li>

  <li class="q">
    <span class="ion-ios-arrow-down"></span>
    ¿Cómo puedo cambiar o restablecer mi contraseña?
  </li>
  <li class="a">Pastry chocolate bar sweet. Pastry muffin chocolate bar bonbon. Macaroon cake marshmallow soufflé cupcake tootsie roll lollipop. Lemon drops jujubes gummi bears toffee. Jelly-o fruitcake cheesecake cake. Caramels muffin oat cake gummies gingerbread candy canes. Icing cake tootsie roll halvah. Dessert lemon drops pastry chupa chups cake powder chocolate. Biscuit marzipan jujubes cotton candy cupcake.</li>

  <li class="q">
    <span class="ion-ios-arrow-down"></span>
    ¿Cómo puedo elegir sobre qué recibo notificaciones?
  </li>
  <li class="a">Gummies marzipan chocolate bar jelly-o. Cotton candy sweet roll danish liquorice macaroon ice cream. Biscuit muffin chocolate bar toffee. Brownie lemon drops wafer croissant sugar plum. Powder powder soufflé lemon drops tiramisu. Dessert liquorice muffin. Apple pie lollipop caramels topping. Sweet topping cookie brownie gummi bears bear claw. Tootsie roll candy canes halvah chocolate bar donut sweet roll lemon drops tootsie roll.</li>

  <li class="q">
    <span class="ion-ios-arrow-down"></span>
    ¿Cómo obtengo más vistos y más me gusta en mis experiencias?
  </li>
  <li class="a">Powder lemon drops dessert pie fruitcake carrot cake halvah. Jelly gingerbread candy liquorice jelly-o. Dessert brownie soufflé danish liquorice bear claw brownie gummies. Pastry cake jujubes pudding tootsie roll. Gingerbread chupa chups macaroon chocolate pastry donut. Cupcake sweet roll toffee dragée donut bonbon. Macaroon macaroon icing cheesecake.</li>

  <li class="q">
  <span class="ion-ios-arrow-down"></span>
    ¿Cuáles son las fotos más vistas y que reciben más me gusta?
  </li>
  <li class="a">Jelly jelly danish cupcake croissant jelly dragée apple pie. Candy canes powder tiramisu. Chocolate cake cookie oat cake cupcake croissant carrot cake pastry toffee donut. Icing apple pie jelly-o. Cake sweet pie oat cake. Icing lollipop chocolate ice cream. Topping macaroon topping cotton candy toffee chocolate bar. Caramels donut pudding.</li>

  <li class="q">
      <span class="ion-ios-arrow-down"></span>
    ¿Cómo puedo hacer para tener más seguidores?
  </li>
  <li class="a">Chocolate tootsie roll ice cream topping cheesecake cake pie apple pie oat cake. Cheesecake jelly pie macaroon tart powder fruitcake oat cake. Jelly beans donut croissant fruitcake pastry tart carrot cake jelly-o donut. Chupa chups sugar plum chupa chups cake carrot cake jelly beans dessert gummi bears pudding. Candy canes cake chocolate cake jelly jelly. Marshmallow jelly beans pie candy canes cookie ice cream chocolate sugar plum. Jelly-o liquorice chupa chups carrot cake candy. Marshmallow cotton candy pudding tart donut gummies ice cream gingerbread marshmallow. Caramels fruitcake caramels. Macaroon donut lemon drops icing cotton candy apple pie bonbon.</li>

</ul>
        <article class="subir">
          <a href="#"><p>SUBIR</p></a>
        </article>
      </section>

	<script src="/jquery-1.11.3.min.js"></script>

<script>

  // Accordian Action
  var action = 'click';
  var speed = "500";


  $(document).ready(function(){

  // Question handler
    $('li.q').on(action, function(){

      // gets next element
      // opens .a of selected question
      $(this).next().slideToggle(speed)

      // selects all other answers and slides up any open answer
      .siblings('li.a').slideUp();

      // Grab img from clicked question
      var span = $(this).children('span');

      // remove Rotate class from all images except the active
      $('span').not(span).removeClass('rotate');

      // toggle rotate class
      span.toggleClass('rotate');

    });

  });
  </script>

<!--FOOTER  -->
      <footer class="main-footer">
        <section class="footer-container">
<!---Faq--->
                  <div class="faq">
                    <a href="index.php">ABOUT</a>
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
<!--Derechos Reservados  -->
                  <div class="derechos">
                    <h3>© Trip Community 2017 - Todos los derechos reservados</h3>
                  </div>
            </section>
        </footer>
  </body>
</html>

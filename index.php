<?php

require_once("header.php")

 ?>

    <div class="principal-container">
      <section class="banner-buscador">
<!-- BANNER   -->
        <article class="banner">
          <ul class="rslides">
            <li><img src="images/tailandia.jpg" width="400" height="65"></li>
            <li><img src="images/alaska.jpg" width="400" height= "65" ></li>
            <li><img src="images/desierto.jpg" width="400" height="65"></li>
          </ul>
        </article>
<!-- BUSCADOR   -->
        <article class="buscador">
          <input type="search" class="buscador" placeholder="¿A dónde querés ir hoy?">
          <button type="button" name="buscar" class="ion-ios-search"></button>
        </article>
      </section>
<!-- SECCIONES  -->
        <section class="sections-container">
          <article class="destacados">
            <img src="images/new-york.jpg" alt="new-york">
            <div class="texto">
              <h2>NO TE PODÉS PERDER</h2>
              <p> Hay lugares que son parte del patrimonio de un país, de una ciudad que uno no debe dejar de conocer</p>
            </div>
          </article>
          <article class="recomendados">
            <img src="images/bosque.jpg" alt="bosque">
            <div class="texto">
              <h2>ANIMATE A EXPLORAR</h2>
              <p>Hay lugares que solo conocés entrando por los caminos menos transitados</p>
            </div>
          </article>
          <article class="fotos">
            <img src="images/amigos.jpg" alt="amigos">
            <div class="texto">
            <h2>GALERIA DE FOTOS</h2>
            <p>Mirá y compartí las fotos de tus viajes con otros viajeros</p>
            </div>
          </article>
          <article class="datos">
            <img src="images/valijas.jpg" alt="valijas">
            <div class="texto">
            <h2> DATOS ÚTILES</h2>
            <p>Encontrá toda la información que necesitas para empezar a organizar tu viaje!</p>
            </div>
          </article>
        </section>
          <img src="images/mapamundi-circulos.png" alt="mundo">
<!--/// FOOTER   /// -->
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
<!--DERECHOS RESERVADOS  -->
            <div class="derechos">
                  <h3>© Trip Community 2017 - Todos los derechos reservados</h3>
            </div>
          </section>
        </footer>
      </div>
<!--  EFECTO TOGGLE   -->
          <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script>
            $('.toggle-nav').click(function(){
                $('.main-nav ul').slideToggle('slow')
            })
        </script>
<!--BANNER SLIDES  -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
        <script src="./javascript/responsiveslides.min.js"></script>
        <script type="text/javascript">
        $(function() {
          $(".rslides").responsiveSlides();
        });
        </script>
  </body>
</html>

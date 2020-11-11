<?php
session_start();
include('conexion.php');
if (isset($_SESSION['id_user'])) {

  $idblog = $_SESSION['id_user'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Psicokrecer</title>

  <!-- Icono de la pestaña -->
  <link rel="icon" href="dist/img/Psico-logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Google Fonts Nunitp -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap">
  <!--Google Fonts Allura-->
  <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
  <!--Google Fonts Jullius-->
  <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
  <!--Google fonts Kaushan-->
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <!--Google fonts Sacramento-->
  <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="dist/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="dist/css/styles.css">
</head>

<body>
  <header>
    <nav class="px-2 px-md-5">

      <a href="index.html" class="brand-logo">
        <span>
          <img src="dist/img/psicokrecer-logo-blanco-sin-fondo.png" alt="">
        </span>
      </a>

      <div id="mySidenav" class="sidenav">
        <div class="enlaces hide">

          <a href="index.php">
            <i class="fas fa-home"></i>
            Inicio
          </a>

          <a href="nosotros.html">
            <i class="fas fa-users"></i>
            Quienes Somos
          </a>

          <a href="index.php#servicios">
            <i class="far fa-handshake"></i>
            Servicios
          </a>

          <a href="blog.php">
            <i class="fas fa-blog"></i>
            Blog
          </a>

          <a href="contacto.html">
            <i class="fas fa-mail-bulk"></i>
            Contacto
          </a>
          <!--Este es para cuando esté en modo telefono-->
          <?php
          if(isset($_SESSION['id_user'])){
          ?>
          <!--cuando esté logueado-->
          <a href="#" id="user-respon" class="my-boton">
            <i class="fas fa-sign-in-alt"></i>
            Usuario
          </a>
          <?php }else{  ?>
          <!--cuando no esté logueado-->
          <a href="#" id="login-respon" class="my-boton ">
            <i class="fas fa-sign-in-alt"></i>
            Inicia Sesión
          </a>

          <?php } ?>  
        </div>

        <!--Este es para cuando esté en modo pantalla grande-->
        <?php
          if(isset($_SESSION['id_user'])){
          ?>
        <!--cuando esté logueado-->
        <a href="#" id="user-btn" class="my-boton btn-user">
          <img id="img-user" style="width:60px; height: 60px; border-radius: 100%;" src="./dist/img/adriana.png" alt="">
        </a>
        <?php }else{  ?>
        <!--cuando no esté logueado-->
        <a href="#" id="login-btn" class="my-boton">
          <i class="fas fa-sign-in-alt"></i>
          <br>Inicia Sesión
        </a>
        <?php } ?>
      </div>

      <div class="menu-overlay hide">
      </div>

      <div id="hamburger" class="hamburger-btn d-md-none waves-effect waves-light d-flex">
        <i id="ham-icon" class="fas fa-bars fa-1-3x"></i>
      </div>

    </nav>

    <section id="carouselExampleFade" class="carousel slide index-carousel carousel-fade" data-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="dist/img/cover/apoyo.png" class="d-block w-100" alt="...">
          <div class="overlay-img px-1 px-sm-5">
            <p class="animated fadeInLeft slower"><span>APOYARTE</span> <br>para CRECER...</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover/eli-grupal2.png" class="d-block w-100" alt="...">
          <div class="overlay-img px-1 px-sm-5">
            <p class="pr-sm-5 animated fadeInLeft slower"><span>COMPARTIR</span> <br>para APRENDER...</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover/2471342.jpg" class="d-block w-100" alt="...">
          <div class="overlay-img px-1 px-sm-5">
            <p class="animated fadeInRight slower"><span>CONFÍA</span><br> en lo que HACES...</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover/escaleras.png" class="d-block w-100" alt="...">
          <div class="overlay-img px-1 px-sm-5">
            <p class="animated fadeInLeft slower"><span>EMPODÉRATE</span> <br> de tu emprendimiento personal...</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="dist/img/cover/OCD8FR0.jpg" class="d-block w-100" alt="...">
          <div class="overlay-img px-1 px-sm-5">
            <p class="animated fadeInLeft slower">Para entender<br><span>que el AMOR es más Fuerte que el miedo</span></p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </section>
  </header>

  <main>
    <!--Este es el modal de usuario-->
    <section id="modal-user" class="posicion-escondido">
      <div class="contenedor-user">
        <p>Nombre</p>
        <a href="">Configuración</a>
        <a href="close.php">Cerrar Sesión</a>
      </div>

    </section>

    <section id="modal-login" class="modal hide">
      <div class="login">
        <div class="title-container p-3">
          <h5>Ingresar</h5>
          <i id="close-login" class="closeModal fa fa-times"></i>
        </div>
        <form class="main-container p-3" action="login.php" method="POST">

          <div class="input-container">
            <label for="email">Correo</label>
            <input name="username" type="email" value="">
          </div>

          <div class="input-container">
            <label for="password">Contraseña</label>
            <input name="password" type="password" value="">
          </div>




          <button name="Enviar" class="btn">Iniciar Sesión</button>
          <a class="enlace-accion" href="registro.php">¿No te has registrado todavía?</a>

      </div>
      </form>
      </div>
    </section>

    <section id="frase">

      <div class="general-container">

        <div class="inicial-img">
          <img src="./dist/img/Psico-logo.png" alt="">
        </div>

        <div class="contenedor-frase typed">
        </div>

      </div>

    </section>

    <section id="servicios" class="px-3">

      <div class="general-container">

        <div class="inicial-img">
          <img src="./dist/img/Psico-logo.png" alt="">
          <h3>Servicios</h3>
        </div>

        <div class="especific-container">

          <div class="servicios-item p-2 p-md-3">

            <div class="imagen">
              <img src="./dist/img/img-serv2.jpeg" alt="">
            </div>

            <h4>ATENCIÓN</h4>

            <ul>
              <li>
                <p>Mujeres emprendedoras.</p>
              </li>
              <li>
                <p>Atencion Familiar.</p>
              </li>
              <li>
                <p>Orientacion de Parejas.</p>
              </li>
              <li>
                <p>Infanto-Juvenil.</p>
              </li>
              <li>
                <p>Talleres / Cursos.</p>
              </li>
            </ul>

          </div>

          <div class="servicios-item p-2 p-md-3">

            <div class="imagen">
              <img src="./dist/img/empresas.png" alt="">
            </div>

            <h4>EMPRESAS</h4>

            <ul>
              <li>
                <p>Orientación en prevención de riesgo Psicosociales.</p>
              </li>
              <li>
                <p>Aplicación de test psicométricos.</p>
              </li>
              <li>
                <p>Selección de personal RRHH.</p>
              </li>
              <li>
                <p>Talleres / Cursos.</p>
              </li>
            </ul>

          </div>

        </div>

      </div>

    </section>

    <section id="equipo">

      <div class="general-container">

        <div class="inicial-img">
          <img src="./dist/img/Psico-logo.png" alt="">
          <h3>EQUIPO</h3>
        </div>

        <div class="especific-container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div id="item-equipo">
                  <div class="img-container">
                    <img src="./dist/img/eli-foto.jpeg" alt="">
                  </div>

                  <div class="info">
                    <p>"El amor es un catalizador de heridas, permitiendonos sellar con nuestro espacio de trabajo
                      personal cada una de estas, y esto lo logramos mediante la acción."
                    </p>
                    <p>Elizabeth Brito</p>
                  </div>

                  <div class="mensaje-info">
                    <h4>Elizabeth Brito</h4>
                    <p>Psicóloga Clínica</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div id="item-equipo">
                  <div class="img-container">
                    <img src="./dist/img/adriana.png" alt="">
                  </div>

                  <div class="info">
                    <p>"La actitud y la pasión, con la que enfrentamos los miedos y las adversidades, son los recursos que
                      apuntan a despedir nuestra zona de confort, logrando así superar los obtáculos."</p>
                    <p>Adriana Gálea</p>
                  </div>

                  <div class="mensaje-info">
                    <h4>Adriana Gálea</h4>
                    <p>Psicóloga Clínica</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div id="item-equipo">
                  <div class="img-container">
                    <img src="./dist/img/marihan.png" alt="">
                  </div>

                  <div class="info">
                    <p>"No tengas miedo de los cambios lentos, solo ten miedo de permanecer inmovil."</p>
                    <p>Proverbio Chino</p>
                  </div>

                  <div class="mensaje-info">
                    <h4>Marihan Quintero</h4>
                    <p>Psicóloga Clínica</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div id="item-equipo">
                  <div class="img-container">
                    <img src="./dist/img/carmen-elena.png" alt="">
                  </div>

                  <div class="info">
                    <p>"Lo que te hace único te hace exitoso."</p>
                    <p>William Arruda</p>
                  </div>

                  <div class="mensaje-info">
                    <h4>Carmen García</h4>
                    <p>Psicóloga Clínica</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div id="item-equipo">
                  <div class="img-container">
                    <img src="./dist/img/gaby.jpeg" alt="">
                  </div>

                  <div class="info">
                    <p>"Lo que no se define, no se puede medir. Lo que no se mide, no se puede mejorar. Lo que no se mejora, se degrada siempre."</p>
                    <p>William Thomson Kelvin</p>

                  </div>

                  <div class="mensaje-info">
                    <h4>Gabriela Brito</h4>
                    <p>Técnica Superior en Aduanas</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div id="item-equipo">
                  <div class="img-container">
                    <img src="./dist/img/genesis.png" alt="">
                  </div>

                  <div class="info">
                    <p> "¡Es posible si lo intentas!" es mi frase inspiradora, y deseo que lo sea para quien acude a mí.</p>

                  </div>

                  <div class="mensaje-info">
                    <h4>Genesis Bastardo</h4>
                    <p>Psicóloga Clínica</p>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>

      </div>

    </section>



  </main>
  <footer>
    <div class="contenedor-general">
      <div class="contenedor-especifico">
        <div class="contenedor-imagen">
          <img src="./dist/img/psicokrecer-logo-oscuro-sin-fondo respaldo.png" alt="">
        </div>
        <div class="contenedor-info">
          <div class="links">
            <a href="#">Inicio</a>
            <a href="nosotros.html">Quienes Somos</a>
            <a href="#servicios">Servicios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.html">Contacto</a>
            <a href="terminos.html">Términos y Privacidad</a>
          </div>
          <div class="separador">

          </div>
          <div class="redes">
            <p>Visita nuestro <a href="blog.php">Blog</a> y síguenos en nuestras redes sociales.</p>
            <div class="redes-icons">
              <a href="https://instagram.com/psicokrecer?igshid=eog2rfo8jsak"><img src="./dist/img/instagram-logo.png" alt=""></a>
              <a href="https://wa.me/56948972401"><img src="./dist/img/whatsapp.png" alt=""></a>
            </div>
          </div>
        </div>

      </div>
      <div class="pie-footer">
        <p>© 2020 Copyright: <a>psicokrecer.com</a></p>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script type="text/javascript" src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="dist/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="dist/js/mdb.min.js"></script>
  <!--Typing Script-->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
  <!-- Particles - js -->
  <!-- <script type="text/javascript" src="src/particles/js/particles.js"></script>
  <script type="text/javascript" src="src/particles/js/lib/stats.js"></script>
  <script type="text/javascript" src="src/particles/js/app.js"></script> -->
  <!-- Your custom scripts (optional) -->
  <!-- <script type="text/javascript" src="src/js/navBar.js"></script> -->
  <script type="text/javascript" src="src/js/tipeo.js"></script>
  <script type="text/javascript" src="src/js/hamburger.js"></script>
  <script type="text/javascript" src="src/js/hideShowModals.js"></script>
  <script type="text/javascript" src="src/js/mostrar-login.js"></script>
  <script type="text/javascript" src="src/js/mostrarModalUsuario.js"></script>
</body>

</html>
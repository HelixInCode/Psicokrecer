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
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="dist/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="dist/css/styles.css">
  <link rel="stylesheet" href="dist/css/nosotros.css">
  <link rel="stylesheet" href="src/css/arreglos.css">
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

          <a href="#">
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
            $dd=$_SESSION['id_user'];
            $dato=mysqli_query($conexion, "SELECT * FROM userblog WHERE id_user = '$dd'");
            $D=mysqli_fetch_array($dato);
          ?>
        <!--cuando esté logueado-->
        <a href="#" id="user-btn" class="my-boton btn-user">
          <img id="img-user" style="width:60px; height: 60px; border-radius: 100%;" src="data:image/jpg;base64,<?php echo base64_encode($D['imagen']);?>" alt="">
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
  </header>
  
  <main>
    <!--Este es el modal de usuario-->
    <section id="modal-user" class="posicion-escondido">
      <div class="contenedor-user">
        <p>Nombre</p>
        <a href="">Configuración</a>
        <a href="">Cerrar Sesión</a>
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
      <section id="modal-message-sent" class="modal hide">
        <div class="login">
          <div class="title-container p-3">
            <!-- <h5>Mensaje Enviado</h5> -->
            <i id="close-sent" class="fa fa-times"></i>
          </div>
          <form id="enviamelo" class="main-container message p-3 pb-4" action="send.php">
            <p class="text-center">Para enviarte el regalo digital, necesitamos que llenes el siguiente dato: </p>
            <input type="text" name="email" placeholder="Dirección de email"/>
            <button id="bt-enviar-regalo" class="btn" type="submit">Envíamelo</button>
            <p class="text-center">Gracias por Apoyarnos</p>
            <i id="carita" class="far fa-smile-beam"></i>
          </form>
        </div>
      </section>
      <section id="nosotros">
          <div class="general-container">
              <div class="inicial-img">
                  <img src="./dist/img/Psico-logo.png" alt="">
                  <h3>QUIENES SOMOS</h3>
              </div>
              <div id="specific-container">
                  <div class="frase">
                      <h3>El tiempo de Dios es perfecto.</h3>
                  </div>
                  <div class="enfoque">
                      <h4>Nuestro Enfoque</h4>
                      <p>Aportar herramientas bajo un enfoque autónomo creativo e integral, enfocado al crecimiento y empoderamiento personal de las mujeres emprendedoras, apoyandolas en la gestión de su camino al éxito mediante el acompañamiento de cambios graduales y contínuos para el bienestar de sí mismas.</p>
                  </div>
              </div>
              <div id="descripcion">
                  <div class="frase">
                      <h3>"Si no lo vives, no lo crees."</h3>
                      <p>Paul Harvey</p>
                  </div>
                  <h4>Sobre Psicokrecer</h4>
                  <div class="informacion">
                      <div class="botones btn">
                          <a class="item" data-toggle="collapse">
                              <i class="fas fa-align-justify"></i>
                              <p>Nosotros</p>
                          </a>
                          <a class="item">
                              <i class="fas fa-hands"></i>
                              <p>¿Cómo trabajamos?</p>
                          </a>
                          <a class="item">
                              <i class="fas fa-users-cog"></i>
                              <p>Equipo</p>
                          </a>
                      </div>
                      <div class="contenedor-informacion non-active">
                          <div class="contenedor-general">
                            <div class="imagenes">
                              <img src="./dist/img/equipo.png" alt="Manos psicokrecer">
                            </div>
                            
                            <div class="descripcion">
                              <p>
                                Somos un equipo autónomo de psicólogas emprendedoras dedicadas al crecimiento personal, a
                                cultivar lo psicosocial de las mujeres emprendedoras, desde nuestro valor en común amor y
                                pasión por nuestra labor. Enfocadas en transmitir juntas los valores que nos han aportado y una
                                transformación en el camino del crecimiento personal y laboral. Hemos compartido un maravilloso
                                camino. Acompañadas ya por más de 1 década por profesores terapeutas psicólogos, coaching
                                psiquiatras y retos de la vida.<br> Permitiéndonos conectar con la plena certeza de que todo es
                                posible. Es un enfoque de amor creativo integrador. Dedicado a ayudar a las mujeres
                                emprendedoras, (jefas de hogar, estudiantes, costureras, vendedoras, peluqueras, publicistas,
                                profesionales, trabajadoras independientes otras.) Estaremos aportando con nuestro enfoque de
                                crecimiento personal en todas sus esferas y área de plenitud.
                              </p>

                            </div>
                          </div>
                          <div class="contenedor-general2">
                            <div class="imagenes">
                              <img src="./dist/img/manos-sembrar.png" alt="">
                            </div>
              
                            <div class="descripcion">
                              <p>
                                Es por eso que hemos decidido cultivar vidas con nuestro enfoque en estos momentos de
                                cambios inevitables.<br>
                                Presentándonos una extraordinaria meta, acompañarte, en esta etapa de emprendimiento y
                                hacer de ello una extraordinaria experiencia para todas. Mediante nuestro hilo de enlace
                                PsicoKrecer. Enfocando a la tomas de decisiones, mirando hacia dentro de cada una de nosotras y
                                ser luz a nuestras clientas mediante nuestros acompañamiento.
                              </p>

                            </div>

                          </div>

                      </div>
                      <div class="contenedor-informacion non-active">
                        <div class="contenedor-general">
                          <div class="imagenes">
                            <img style="height: 200px;" id="img-sec2" src="./dist/img/equipo.png" alt="Manos psicokrecer">
                          </div>
                          
                          <div class="descripcion">
                            <p>
                              Trabajamos en detectar las competencias personales y grupales, de habilidades psicológicas. Con
                              el objetivo de gestionar mejor nuestras relaciones, nuestras expectativas, nuestras emociones,
                              para el empoderamiento continúo de tu personalidad emprendedora. Desde una mirada de
                              transformación de la vulnerabilidad a las fortalezas.
                              
                            </p>

                          </div>
                        </div>
                        <div class="contenedor-general2">
                          <div class="imagenes">
                            <img src="./dist/img/trabajamos-2.png" alt="">
                          </div>
            
                          <div class="descripcion">
                            <p>
                              Seremos tus muletas emocionales y te guiaremos a caminar en tus retos personales, desde
                              nuestro integrador enfoque. Brindándote una gama de aportes en herramientas psicoeducativas
                              orientadas a lograr un mejor conocimiento de tu proceso personal y proceso grupal.
                              Cultivándote en tu caminar de resiliencia y compromiso.
                            </p>

                          </div>

                        </div>
                        <div class="areas">
                          <h4>Áreas de Empoderamiento</h4>
                          <ul>
                            <li>Enfoque emprendedor.</li>
                            <li>Enfoque familiar.</li>
                            <li>Enfoque de parejas.</li>
                            <li>Enfoque psicoeducativo para padres.</li>
                            <li>Enfoque infanto-juvenil.</li>
                            <li>Enfoque psicotécnicas de selección de personal.</li>
                            <li>Apoyo de recursos humanos.</li>
                          </ul>

                        </div>


                      </div>
                      <div class="contenedor-informacion non-active">
                        <div id="equipo">
                          <div class="contenedor-general">
                            <div class="jugador">
                              <img src="./dist/img/eli-foto.jpeg" alt="">
                              <div class="datos">
                                <h5>Elizabeth Brito Mora</h5>
                                <p>Psicóloga Clínica</p>
                              </div>
                              <p class="formacion">Formada en materia de prevención de los riesgos psicosociales. Facilitadora de
                                herramientas de Coaching, con magister en orientación</p>
                              <a href="elizabethbr@psicokrecer.com?Subject=Quiero%20contactarme%20contigo" class="correo">elizabethbr@psicokrecer.com</a>
                              <p class="myDescription">Saludos. Agradecida en  que me conozcas.  Me llaman Elizabeth Brito. Y lo certifico soy yo.!. Me dedico a compartir el camino con las personas que desean ser vulnerablemente fuertes, y  transitar un camino lleno de aprendizajes de vida continuos. Me desempeño como psicóloga, orientadora y creativa en el mundo del despertar del  crecimiento personal, hacer  consciente lo inconsciente. Con el objetivo de apoyarte en ser una persona plena en todas tus esferas de vida. Descubrir lo bueno lo malo de nuestras creencias y  trabajar con diferentes herramientas en el equilibrio genuino de las decisiones.</p>
                            </div>
                            
                            <div class="jugador">
                              <img src="./dist/img/adriana.png" alt="">
                              <div class="datos">
                                <h5>Adriana Virginia Gálea Urdaneta</h5>
                                <p>Psicóloga Clínica</p>
                              </div>
                              <p class="formacion">TSU en dificultades del aprendizaje, con un magister en sexología.</p>
                              <a class="correo" href="adrianaga@psicokrecer.com?Subject=Quiero%20contactarme%20contigo">adrianaga@psicokrecer.com</a>
                              <p class="myDescription">Mi enfoque  de vida y profesional  irradia  una atmosfera familiar llena de ilusiones y sueños, ideas y consejos para educarnos en lo positivo de una familia genuina. Desempeñaremos  juntos propuestas educativas organizadas. Mejoramiento  secuencial de todo tipo de  familia y un compromiso por sembrar nuestro granito de arena en el bienestar de todos los involucrados en el núcleo conocido. Lo aprendido siempre puede ser mejor. Te acompañare  con las estrategias para el apoyo de personas que lo necesitan para mejorar sus interacciones familiares. </p>
                            </div>
                            <div class="jugador">
                              <img src="./dist/img/marihan.png" alt="">
                              <div class="datos">
                                <h5>Marihan Quintero Pinto</h5>
                                <p>Psicóloga Clínica</p>
                              </div>
                              <p class="formacion">Experta en lo organizacional, RRHH, selección de personal.</p>
                              <a  class="correo" href="psicomaq@psicokrecer.com?Subject=Quiero%20contactarme%20contigo">psicomaq@psicokrecer.com</a>
                              <p class="myDescription">El compromiso y la disciplina son fundamentales para nuestro desempeño diario; valores que me conectaron en seguida con la psicología y el deseo de ayudar a otros. Hoy soy una psicóloga sumergida en el mundo de recursos humanos con deseos de guiar a todas esas personas que buscan conocer estrategias que le permitan tener un equilibrio entre su vida personal y laboral.</p>
                            </div>
                            <div class="jugador">
                              <img src="./dist/img/carmen-elena.png" alt="">
                              <div class="datos">
                                <h5>Carmen Elena García</h5>
                                <p>Psicóloga Clínica</p>
                              </div>
                              <p class="formacion">Profesora de la Universidad Arturo Michelena. Vnzla. Gerente de contenidos.</p>
                              <a class="correo" href="carmenga@psicokrecer.com?Subject=Quiero%20contactarme%20contigo">carmenga@psicokrecer.com</a>
                              <p class="myDescription">Una Relación de Pareja es un lienzo en blanco con dos artistas dispuestos a trabajar en una obra de Arte. Ese arte dependerá no sólo del toque personal, el gusto, la experiencia y la pasión que abonará cada participante sino también del gran Amor, disposición, comunicación y respeto que exista del uno por el otro a la hora de llevar a cabo su obra compartida. Disfrutemos al máximo el Arte de amarn.os Sanamente. Mi gran deseo es ayudar cada vez más en orientaciones en caso de que lo ameriten, mediante la psico-educación sobre los conceptos y creencias.</p>
                            </div>
                            <div class="jugador">
                              <img src="./dist/img/gaby.jpeg" alt="">
                              <div class="datos">
                                <h5>Gabriela Brito Mora</h5>
                                <p>Técnica Superior en Aduanas</p>
                              </div>
                              <p class="formacion"></p>
                              <a class="correo" href="gabrielabr@psicokrecer.com?Subject=Quiero%20contactarme%20contigo">gabrielabr@psicokrecer.com</a>
                              <p class="myDescription">Las pruebas psicométricas, o  test se presentan como un mundo de investigaciones y estudios,  validados y confiables por importante instrumentos experimentales. Con estas pruebas se puede mejorar los aspectos débiles de cada persona. Ya sea para fortalecernos y hacer mucho mejor nuestro trabajo, especificar sus rasgos  personalidad, inteligencia y estabilidad emocional. Los test podemos usarlos como vehículo de transición y avanzar más rápido en nuestros intereses, aptitudes  y motivaciones. Una vez sea necesario comprender si esos resultados están alineados con nosotros., para enfocarnos en ser  mejores personas y profesionales. </p>
                            </div> 
                            <div class="jugador">
                              <img src="./dist/img/genesis.png" alt="">
                              <div class="datos">
                                <h5>Genesis Bastardo</h5>
                                <p>Psicóloga Clínica</p>
                              </div>
                              <p class="formacion"></p>
                              <a class="correo" href="genesisba@psicokrecer.com?Subject=Quiero%20contactarme%20contigo">genesisba@psicokrecer.com</a>
                              <p class="myDescription">Uno de mis valores característicos es la  valentía. Formarme como psicóloga y desenvolverme en el área infantil, se ha convertido en el  enfoque que más me apasiona, y, hoy en día, es de la  experiencias más gratificantes para mí. Soy una persona altamente sensible, aficionada del arte en todas sus dimensiones y creo en el cambio."¡Es posible si lo intentas!" es mi frase inspiradora, y deseo que lo sea para quien acude a mí. Madre, padre, cuidador, te invito a descubrir conmigo la magia de  aportar a tu hijo herramientas para su vida y  lo que él tiene para aportarnos. Ver sus sonrisas de bienestar y de gratitud es mi mayor anhelo. </p>
                            </div>           
                
                          </div>
                        </div>
                          
                      </div>
                      <div class="contenedor-regalo non-active">
                        <div id="regalo">
                          <img src="./dist/img/manos-sembrar.png" alt="">
                          <div class="info-regalo">
                            <p>¡Felicidades! <br> Por interesarte en nosotras, y como motivo de agradecimiento <br> ¡Te has ganado un premio digital!</p>
                            <button id="boton-regalo" class="btn">Reclamar Premio</button>
                          </div>
  
                        </div>
                      </div>
                      

                  </div>
                </div>
                <div class="contenedor-clientes">
                  <h4>Nuestros Clientes</h4>
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="iconos1">
                          <img src="./dist/img/Escudo.jpg.jpg" alt="">
                          <img src="./dist/img/cliente-2.jpeg" alt="">
                          <img src="./dist/img/cliente-3.jpeg" alt="">
                          <img src="./dist/img/cliente-4.png" alt="">
                          <img src="./dist/img/cliente-5.png" alt="">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="iconos2">
                          <img src="./dist/img/cliente-6.jpeg" alt="">
                          <img src="./dist/img/cliente-7.png" alt="">
                          <img src="./dist/img/cliente-8.jpeg" alt="">
                          <img src="./dist/img/cliente-9.jpeg" alt="">
                          <img src="./dist/img/cliente-77.jpeg" alt="">
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
              <a href="index.php">Inicio</a>
              <a href="#">Quienes Somos</a>
              <a href="index.php#servicios">Servicios</a>
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
  <script type="text/javascript" src="src/js/panel-nosotros.js"></script>
  <script type="text/javascript" src="src/js/hamburger.js"></script>
  <script type="text/javascript" src="src/js/hideShowModals.js"></script>
  <script type="text/javascript" src="src/js/mostrar-login.js"></script>
  <script type="text/javascript" src="src/js/mostrarModalUsuario.js"></script>
  <script type="text/javascript" src="src/js/voltearCarta.js"></script>
</body>
</html>
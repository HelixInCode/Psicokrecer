<?php
include ('conexion.php');
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
  <link rel="stylesheet" href="dist/css/blog.css">
</head>
<body>

<?php
$ul=mysqli_query($conexion, "SELECT MAX(id) AS id FROM publicaciones");
$ult=mysqli_fetch_array($ul);
$ulti=$ult['id'];

$last=mysqli_query($conexion, "SELECT * FROM publicaciones WHERE id='$ulti'");
$lastP=mysqli_fetch_array($last);

if(isset($_POST['Buscar'])){
  $categoria= $_POST['categoria'];
  $buscar=mysqli_query($conexion, "SELECT * FROM publicaciones WHERE categoria LIKE '$categoria' ORDER BY id DESC");
  $busqueda1= mysqli_fetch_array($buscar);

  $ultimoidbusqueda=$busqueda1['id'];

  $prev=mysqli_query($conexion, "SELECT * FROM publicaciones WHERE categoria LIKE '$categoria' AND id< '$ultimoidbusqueda' ORDER BY id DESC");
  
}



?>

    <header>
      <nav class="px-2 px-md-5">
        <a href="index.php" class="brand-logo">
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
  
            <a href="nosotros.php">
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
            <a href="#" id="login-respon" class="my-boton">
              <i class="fas fa-sign-in-alt"></i>
              Inicia Sesión
            </a>
  
          </div> 
          <a href="#" id="login-btn" class="my-boton">
            <i class="fas fa-sign-in-alt"></i>
            <br>Inicia Sesión
          </a>          
        </div>
  
        <div class="menu-overlay hide">
        </div>
  
        <div id="hamburger" class="hamburger-btn d-md-none waves-effect waves-light d-flex">
          <i id="ham-icon" class="fas fa-bars fa-1-3x"></i>
        </div>
      </nav>
      
    </header>
    
    <main>
      <section id="modal-login" class="modal hide">
        <div class="login">
          <div class="title-container p-3">
            <h5>Ingresar</h5>
            <i id="close-login" class="closeModal fa fa-times"></i>
          </div>
          <form class="main-container p-3" action="" method="POST">
  
            <div class="input-container">
              <label for="email">Correo</label>
              <input name="email" type="email" value="">
            </div>
  
            <div class="input-container">
              <label for="password">Contraseña</label>
              <input name="password" type="password" value="">
            </div>
  
            <div class="input-container">
              <input type="checkbox" name="remember" id="remember"/>
              <label for="remenber">Recuerdame</label>
            </div>
  
            <a class="enlace-accion" href="">No recuerdo mi contraseña</a>
            <div class="login-container">
  
              <button name="Enviar" class="btn">Iniciar Sesión</button>
              <a class="enlace-accion" href="">¿No te has registrado todavía?</a>
  
            </div>
          </form>
        </div>
      </section>
        <section id="blog">
            <div class="general-container">
                <div class="inicial-img">
                    <img src="./dist/img/Psico-logo.png" alt="">
                    <h3>BLOG</h3>
                </div>
                <!--Carousel Wrapper-->
                <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="view">
                        <img class="d-block w-100" src="dist/images/<?php echo $lastP['imagen1']; ?>"
                            alt="First slide">
                        <div class="mask rgba-black-light"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive"><?php echo $lastP['titulo']?></h3>
                        <?php $type=$lastP['diseño'];
                           if($type == 1){  ?>
                        
                        <a href="articulo-3im-3p.php?public=<?php echo $ulti;?>">Leer más</a>
                        <?php }  
                        elseif($type == 2 ) {   
                          ?>
                        <a href="articulo-slide.php?public=<?php echo $ulti;?>">Leer más</a>  
                        <?php } else {  ?> 
                          <a href="articulo-grid.php?public=<?php echo $ulti;?>">Leer más</a>  
                        <?php } ?> 
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                        <img class="d-block w-100" src="dist/images/<?php echo $lastP['imagen2']; ?>"
                            alt="Second slide">
                        <div class="mask rgba-black-strong"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive"><?php echo $lastP['titulo']?></h3>
                        <a href="#">Leer más</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                        <img class="d-block w-100" src="dist/images/<?php echo $lastP['imagen3']; ?>"
                            alt="Third slide">
                        <div class="mask rgba-black-slight"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive"><?php echo $lastP['titulo']?></h3>
                        <a href="#">Leer más</a>
                        </div>
                    </div>
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
                <!--/.Carousel Wrapper-->
                <!-- Search form -->
                
                <h3>Entradas sobre <?php echo $categoria;?></h3>
                <div class="ultima-entrada">
                    <div class="estructura">
                        <img src="./dist/images/<?php echo $busqueda1['imagen1']?>" alt="">
                        <div class="titulo">
                            <h4><a href="articulo-3im-3p.html"><?php echo $busqueda1['titulo']?></a></h4>
                            <p class="fecha">01/09/3030</p>
                            <p><?php echo $busqueda1['subtitulo']?></p>
                            <a href="articulo-3im-3p.html">Leer artículo completo</a>
                        </div>
                        
                    </div>
                </div>
                <div class="antiguas">
                    <div class="por-entradas">
                        <h5>Entradas anteriores</h5>
                        <div class="entradas-anteriores">
                        <?php while ($previa=mysqli_fetch_array($prev)) {
                          
                         ?>    
                        <a class="item">
                                <div class="estructura">
                                    <img src="./dist/images/<?php echo $previa['imagen1']?>" alt="">
                                    <div>
                                        <p><?php echo $previa['titulo']?></p>
                                        <p><?php echo $previa['fecha']?></p>
                                    </div>
                                    
                                </div>
                            </a>
                        <?php } ?>   
                            
                            
                            
                        </div>
                    </div>
                  <form class="form" action="" method="POST">
                    <div class="por-categorias">
                        <h5>Categorías</h5>
                        <div class="entradas-categorias">
                            
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios1" value="Familia">
                            <label class="categorias" for="exampleRadios1">
                              Familia
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios2" value="Mujeres">
                            <label class="form-check-label" for="exampleRadios2">
                              Mujeres
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios3" value="Parejas">
                            <label class="form-check-label" for="exampleRadios3">
                              Parejas
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios4" value="Infanto-Juvenil">
                            <label class="form-check-label" for="exampleRadios4">
                            Infanto-Juvenil
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios5" value="Empresas" >
                            <label class="form-check-label" for="exampleRadios5">
                            Empresas
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios6" value="Cursos" >
                            <label class="form-check-label" for="exampleRadios6">
                            Cursos
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios7" value="Talleres" >
                            <label class="form-check-label" for="exampleRadios7">
                            Talleres
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios8" value="Emprendimiento">
                            <label class="form-check-label" for="exampleRadios8">
                            Emprendimiento
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios8" value="Sexo" >
                            <label class="form-check-label" for="exampleRadios8">
                            Sexo
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios9" value="Test" >
                            <label class="form-check-label" for="exampleRadios9">
                            Test
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios10" value="Felicidad" >
                            <label class="form-check-label" for="exampleRadios10">
                            Felicidad
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios11" value="Salud Mental" >
                            <label class="form-check-label" for="exampleRadios11">
                            Salud Mental
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios12" value="Orientacion" >
                            <label class="form-check-label" for="exampleRadios12">
                            Orientacion
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios13" value="Consultas" >
                            <label class="form-check-label" for="exampleRadios13">
                            Consultas
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios14" value="Ayuda" >
                            <label class="form-check-label" for="exampleRadios14">
                            Ayuda
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios15" value="Apoyo" >
                            <label class="form-check-label" for="exampleRadios15">
                            Apoyo
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios16" value="Exito" >
                            <label class="form-check-label" for="exampleRadios16">
                            Exito
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria" id="exampleRadios17" value="Acompañamiento" >
                            <label class="form-check-label" for="exampleRadios17">
                            Acompañamiento
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Dinero" name="categoria" id="exampleRadios18"  >
                            <label class="form-check-label" for="exampleRadios18">
                            Dinero
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Economia" name="categoria" id="exampleRadios19"  >
                            <label class="form-check-label" for="exampleRadios19">
                            Economia
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Aprendizaje" name="categoria" id="exampleRadios20"  >
                            <label class="form-check-label" for="exampleRadios20">
                            Aprendizaje
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Coaching" name="categoria" id="exampleRadios21"  >
                            <label class="form-check-label" for="exampleRadios21">
                            Coaching
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Riesgos Psicosociales" name="categoria" id="exampleRadios22"  >
                            <label class="form-check-label" for="exampleRadios22">
                            Riesgos Psicosociales
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Herramientas" name="categoria" id="exampleRadios23"  >
                            <label class="form-check-label" for="exampleRadios23">
                            Herramientas
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Educacion" name="categoria" id="exampleRadios24"  >
                            <label class="form-check-label" for="exampleRadios24">
                            Educacion
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Espiritualidad" name="categoria" id="exampleRadios25"  >
                            <label class="form-check-label" for="exampleRadios25">
                            Espiritualidad
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Comunicacion" name="categoria" id="exampleRadios26"  >
                            <label class="form-check-label" for="exampleRadios26">
                            Comunicacion
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Padres" name="categoria" id="exampleRadios27"  >
                            <label class="form-check-label" for="exampleRadios27">
                            Padres
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Adultos Mayores" name="categoria" id="exampleRadios28"  >
                            <label class="form-check-label" for="exampleRadios28">
                            Adultos Mayores
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Hombres" name="categoria" id="exampleRadios29"  >
                            <label class="form-check-label" for="exampleRadios29">
                            Hombres
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Amor" name="categoria" id="exampleRadios30"  >
                            <label class="form-check-label" for="exampleRadios30">
                            Amor
                            </label>
                          </div>
                          <input type="submit" style="background-color: #68217e; font-family: 'Julius Sans One', sans-serif;color: white;font-size: 20px; font-weight: 600; border-radius: 10px;" name="Buscar" value="Buscar">

                        </div>
                    </div>
                  </form>
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
              <a href="nosotros.html">Quienes Somos</a>
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
    <script type="text/javascript" src="src/js/hamburger.js"></script>
    <script type="text/javascript" src="src/js/mostrar-login.js"></script>
</body>
</html>
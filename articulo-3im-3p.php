<?php
session_start();
include('conexion.php');
if (isset($_SESSION['id_user'])) {

  $id = $_SESSION['id_user'];
  $usuario = $_SESSION['user'];
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
  <link rel="stylesheet" href="dist/css/blog.css">
</head>

<body>

  <?php
  $selector = $_GET['public'];


  $articulo = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE id='$selector'");
  $posteo = mysqli_fetch_array($articulo);
  
  $sel = mysqli_query($conexion, "SELECT * FROM comentarios");
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
        <a href="panel-user.php">Configuración</a>
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
            <input name="email" type="email" value="">
          </div>

          <div class="input-container">
            <label for="password">Contraseña</label>
            <input name="password" type="password" value="">
          </div>



          <button name="Enviar" class="btn">Iniciar Sesión</button>
          <a class="enlace-accion" href="">¿No te has registrado todavía?</a>

      </div>
      </form>
      </div>
    </section>
    <section id="articulo">
      <div class="contenedor-principal">
        <div class="inicial-img">
          <img src="./dist/img/Psico-logo.png" alt="">
          <h3>Artículo</h3>
        </div>

        <h3><?php echo $posteo['titulo']; ?></h3>
        <p>
          <?php echo $posteo['subtitulo']; ?>
        </p>

        <div class="img-container">
          <img src="dist/images/<?php echo $posteo['imagen1']; ?>" alt="">
        </div>
        <p>
          <?php echo $posteo['parrafo1']; ?>
        </p>

        <div class="img-container">
          <img src="dist/images/<?php echo $posteo['imagen2']; ?>" alt="">
        </div>
        <p>
          <?php echo $posteo['parrafo2']; ?>
        </p>

        <div class="img-container">
          <img src="dist/images/<?php echo $posteo['imagen3']; ?>" alt="">
        </div>
        <p>
          <?php echo $posteo['parrafo3']; ?>
        </p>


        <div class="datos-clave">
          <p><?php echo $posteo['fecha']; ?></p>
          <p><?php echo $posteo['categoria']; ?></p>
        </div>
        <div class="regreso">
          <a href="blog.php">Volver a lista de artículos</a>
        </div>

        <div id="comentarios">
          <div class="contenedor-general">
          <?php
          if(isset($_SESSION['id_user'])){
            $consul=mysqli_query($conexion, "SELECT * FROM userblog WHERE id_user = '$id'");
            $cons=mysqli_fetch_array($consul);
            $nombre=$usuario;
            $img=$cons['imagen'];
           
          ?>
            <div class="enlace" id="nuevo-comment">
              <a href="#">¿Quieres agregar un comentario <?php echo $usuario ?>?</a>
              <i class="fas fa-angle-down" style="transition: 1s;"></i>
            </div>
            <?php
          } elseif(isset($_SESSION['id'])){
            $consul=mysqli_query($conexion, "SELECT * FROM administrador WHERE id = '$adId'");
            $cons=mysqli_fetch_array($consul);
            $nombre=$ad;
            $img=$cons['foto'];
            
          ?>
            <div class="enlace" id="nuevo-comment">
              <a href="#">¿Quieres agregar un comentario <?php echo $ad ?>?</a>
              <i class="fas fa-angle-down" style="transition: 1s;"></i>
            </div>
          <?php } else { ?>
            <div class="enlace">
              <a href="" >Para agregar un comentario debes estar registrado</a>
              
            </div>
          <?php } ?>
            <div class="contenedor-nuevo-comentario oculto animated fadeInDown faster">
              <form class="nuevo-comentario" action="savecoment.php" method="POST">
                <div class="dato">
                  <img src="data:image/jpg;base64,<?php echo base64_encode($img);?>" alt="">
                  <label> <?php echo $nombre ?></label>
                </div>
                <input type="hidden" name="publicacion" value="<?php echo $selector; ?>" >
                <textarea type="text" Name="comentario" placeholder="¿Que opinas...?" rows="2" required></textarea>
                <button type="submit" class="btn" name="Crear">Publicar</button>
              </form>
            </div>


          </div>
          <h4>Comentarios</h4>
          <div class="lista-comentarios">
            <?php if(empty($sel)){  

              ?>
              <div class="enlace">
                <a href="">No hay comentarios</a>
              </div>
              <?php } else{ 
                  while($comentario=mysqli_fetch_array($sel)){  
                    $idCom=$comentario['id_user'];
                    $idPub=$comentario['idComentario'];
                    $inf=mysqli_query($conexion, "SELECT imagen FROM userblog WHERE id_user ='$idCom' ");
                    $info=mysqli_fetch_array($inf);
                ?>
            <div class="item">
              <div class="dato">
                <img src="data:image/jpg;base64,<?php echo base64_encode($info['imagen']);?>" alt="">
                <p><?php echo $comentario['user']; ?></p>
              </div>
              <div class="escrito">
                <p><?php echo $comentario['comentario']; ?></p>
            
                <?php if($id==$idCom){?>
                <a href="deletecoment.php?com=<?php echo $idPub; ?>"><i class="fas fa-trash"></i></a>
                <?php } ?>
              </div>
            </div>
            
             <?php
               }  
                  } ?>  <!-- <div class="item">
              <div class="dato">
                <img src="./dist/img/gaby.jpeg" alt="">
                <p>Martina Martinez</p>
              </div>
              <div class="escrito">
                <p>Excelente articulo, me siento relacionada.</p>
              </div>
               -->
            


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
  <script type="text/javascript" src="src/js/showHideNewComment.js"></script>
  <script type="text/javascript" src="src/js/mostrarModalUsuario.js"></script>
</body>

</html>
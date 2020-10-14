<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['id'])){
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
  <link rel="stylesheet" href="dist/css/panel.css">
</head>
<body>
<?php 
$publi=mysqli_query($conexion, "SELECT * FROM publicaciones");



?>

    <header>
        <nav class="navbar navbar-dark">
            <a class="navbar-brand" href="#" style="font-family:'Kaushan Script', cursive; color: #f1f1f1;">
            <img src="./dist/img/psicokrecer-logo-oscuro-sin-fondo.png" height="30" class="d-inline-block align-top"
                alt="mdb logo"> Administrador
            </a>
            <div>
                <ul id="menu" class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Hola! Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="close.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
    <main>
        <section id="panel">
            <div class="contenedor-principal">
                <div class="inicial-img">
                    <img src="./dist/img/Psico-logo.png" alt="">
                    <h3>Panel</h3>
                </div>
                <div class="contenedor-secundario">
                    <div class="botones">
                        <ul>
                            <li class="panel-item">
                                Modificar Artículos
                            </li>
                            <li class="panel-item">
                                Usuarios y Comentarios
                            </li>
                            <li class="panel-item">
                                Nuevo Artículo
                            </li>
                        </ul>

                    </div>
                    <div class="contenedor-seccion">
                        <div class="seccion-item non-active">
                            <h4>Lista de Artículos Publicados</h4>
                            <div class="contenedor-general-items">
                            <?php 
                            
                            while($pub=mysqli_fetch_array($publi)){  
                            ?>
                                <div class="item">
                                    <img src="dist/images/<?php echo $pub['imagen1']; ?>" alt="">
                                    <div class="titulo">
                                    <?php $Public=$pub['id']; ?>
                                        <p><?php echo $pub['titulo']; ?></p>
                                        <p>fecha de publicacion</p>
                                    </div>
                                    <div class="acciones">
                                    <?php 
                                    $type=$pub['diseño'];
                                    if($type == 1){  ?>
                                        <a class="btn" href='<?php echo "articulo-modificar-3im-3p.php?public=$Public"; ?>'>Modificar</a>
                                    <?php }
                                    elseif($type == 2 ) {   
                                          ?>
                                        <a class="btn" href='<?php echo "articulo-modificar-slide.php?public=$Public"; ?>'>Modificar</a>
                                    <?php } else {  ?> 
                                        <a class="btn" href='<?php echo "articulo-modificar-grid.php?public=$Public"; ?>'>Modificar</a>
                                    <?php } ?>   
                                        <a class="btn" href='<?php echo "eliminar.php?public=$Public"; ?>'>Eliminar</a>
                                    </div>

                                </div>
                            <?php } ?>
                                <div class="item">
                                    <img src="./dist/img/equipo.png" alt="">
                                    <div class="titulo">
                                        <p>Titulo</p>
                                        <p>fecha de publicacion</p>
                                    </div>
                                    <div class="acciones">
                                        <button class="btn">Modificar</button>
                                        <button class="btn">Eliminar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="seccion-item non-active">
                            Holaaa

                        </div>
                        <div class="seccion-item non-active">
                            <h4>Nuevo Artículo</h4>
                            <div class="seccion-nuevo-articulo">
                                <div class="diseño">
                                    <div class="imagenes">
                                        <label for="">Selecciona el diseño que tendrá el artículo</label>
                                        <select name="diseno" id="diseno" onchange="showSelect()">
                                            <option value="">Diseño...</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="formularios-item d-none">
                                    <form id="formulario-3im-3p" class="md-form" action="savearticulo.php" method="POST" enctype="multipart/form-data">
                                        <div class="identificacion">
                                            <input type="hidden" name="diseño" value="1">
                                            <input type="text" name="titulo" placeholder="Título del artículo">
                                            <select name="categoria" id="categoria">
                                                <option value="">Categoría del Artículo</option>
                                                <option value="familia">Familia</option>
                                                <option value="mujeres">Mujeres</option>
                                                <option value="parejas">Parejas</option>
                                                <option value="infanto-juvenil">Infanto-Juvenil</option>
                                                <option value="empresas">Empresas</option>
                                                <option value="cursos">Cursos</option>
                                                <option value="talleres">Talleres</option>
                                                <option value="emprendimiento">Emprendimiento</option>
                                                <option value="sexo">Sexo</option>
                                                <option value="test">Test</option>
                                                <option value="comportamiento">Comportamiento</option>
                                                <option value="felicidad">Felicidad</option>
                                                <option value="salud mental">Salud Mental</option>
                                                <option value="orientacion">Orientacion</option>
                                                <option value="consultas">Consultas</option>
                                                <option value="ayuda">Ayuda</option>
                                                <option value="apoyo">Apoyo</option>
                                                <option value="exito">Exito</option>
                                                <option value="acompañamiento">Acompañamiento</option>
                                                <option value="dinero">Dinero</option>
                                                <option value="economia">Economia</option>
                                                <option value="aprendizaje">Aprendizaje</option>
                                                <option value="coaching">Coaching</option>
                                                <option value="Riesgos Psicosociales">Riesgos Psicosociales</option>
                                                <option value="herramientas">Herramientas</option>
                                                <option value="educacion">Educacion</option>
                                                <option value="espiritualidad">Espiritualidad</option>
                                                <option value="comunicacion">Comunicacion</option>
                                                <option value="padres">Padres</option>
                                                <option value="adultos mayores">Adultos Mayores</option>
                                                <option value="hombres">Hombres</option>
                                                <option value="amor">Amor</option>
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="imagenes file-field">
                                            <div class="imagen-muestra">
                                                <img src="./dist/img/disenos/3im-3p.png" alt="">
    
                                            </div>
                                            <h5>Imágenes</h5>
                                            <div class="btn">
    
                                                <span>Imagen Destacada</span>
                                                <input name="imagen1" type="file" accept="image/*" required>
                                            </div>
                                            <div class="btn">
                                                <span>Imagen 2</span>
                                                <input name="imagen2" type="file" accept="image/*" required>
                                            </div>
                                            <div class="btn">
                                                <span>Imagen 3</span>
                                                <input name="imagen3" type="file" accept="image/*" required>
                                            </div>
    
                                        </div>
                                        <div class="escritos">
                                            <h5>Párrafo Introductorio</h5>
                                            <div class="md-form">
                                                <textarea name="subtitulo" id="form6" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                                <label for="form7">Introducción</label>
                                            </div>
                                            <h5>Párrafos</h5>
                                            <div class="md-form">
                                                <textarea name="texto" id="form7" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                                <label for="form7">Primer Escrito</label>
                                            </div>
                                            <div class="md-form">
                                                <textarea name="texto2" id="form8" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                                <label for="form8">Segundo Escrito</label>
                                            </div>
                                            <div class="md-form">
                                                <textarea name="texto3" id="form9" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                                <label for="form9">Tercer Escrito</label>
                                            </div>

                                        </div>
                                        <div class="acciones text-center">
                                            <button type="submit" name="Crear" class="btn">Crear</button>

                                        </div>
                                    </form>
                                </div>                                
                                
                            </div>
                            <div class="formularios-item d-none">
                                <form id="formulario-slide" class="md-form" action="savearticulo.php" method="POST" enctype="multipart/form-data">
                                    <div class="identificacion">
                                        <input type="hidden" name="diseño" value="2">
                                        <input type="text" name="titulo" placeholder="Título del artículo">
                                        <select name="categoria" id="categoria">
                                            <option value="">Categoría del Artículo</option>
                                            <option value="">Categoría del Artículo</option>
                                                <option value="familia">Familia</option>
                                                <option value="mujeres">Mujeres</option>
                                                <option value="parejas">Parejas</option>
                                                <option value="infanto-juvenil">Infanto-Juvenil</option>
                                                <option value="empresas">Empresas</option>
                                                <option value="cursos">Cursos</option>
                                                <option value="talleres">Talleres</option>
                                                <option value="emprendimiento">Emprendimiento</option>
                                                <option value="sexo">Sexo</option>
                                                <option value="test">Test</option>
                                                <option value="comportamiento">Comportamiento</option>
                                                <option value="felicidad">Felicidad</option>
                                                <option value="salud mental">Salud Mental</option>
                                                <option value="orientacion">Orientacion</option>
                                                <option value="consultas">Consultas</option>
                                                <option value="ayuda">Ayuda</option>
                                                <option value="apoyo">Apoyo</option>
                                                <option value="exito">Exito</option>
                                                <option value="acompañamiento">Acompañamiento</option>
                                                <option value="dinero">Dinero</option>
                                                <option value="economia">Economia</option>
                                                <option value="aprendizaje">Aprendizaje</option>
                                                <option value="coaching">Coaching</option>
                                                <option value="Riesgos Psicosociales">Riesgos Psicosociales</option>
                                                <option value="herramientas">Herramientas</option>
                                                <option value="educacion">Educacion</option>
                                                <option value="espiritualidad">Espiritualidad</option>
                                                <option value="comunicacion">Comunicacion</option>
                                                <option value="padres">Padres</option>
                                                <option value="adultos mayores">Adultos Mayores</option>
                                                <option value="hombres">Hombres</option>
                                                <option value="amor">Amor</option>
                                                
                                        </select>
                                    </div>
                                    
                                    <div class="imagenes file-field">
                                        <div class="imagen-muestra">
                                            <img src="./dist/img/disenos/diseno-slide.png" alt="">

                                        </div>
                                        <h5>Imágenes</h5>
                                        <div class="btn">

                                            <span>Imagen Destacada</span>
                                            <input name="imagen1" type="file" accept="image/*" required>
                                        </div>
                                        <div class="btn">
                                            <span>Imagen 2</span>
                                            <input name="imagen2" type="file" accept="image/*" required>
                                        </div>
                                        <div class="btn">
                                            <span>Imagen 3</span>
                                            <input name="imagen3" type="file" accept="image/*" required>
                                        </div>

                                    </div>
                                    <div class="escritos">
                                        <h5>Párrafo Introductorio</h5>
                                        <div class="md-form">
                                            <textarea name="subtitulo" id="form6" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form7">Introducción</label>
                                        </div>
                                        <h5>Párrafos</h5>
                                        <div class="md-form">
                                            <textarea name="texto" id="form7" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form7">Primer Escrito</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea name="texto2" id="form8" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form8">Segundo Escrito</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea name="texto3" id="form9" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form9">Tercer Escrito</label>
                                        </div>
                                    </div>
                                    <div class="acciones text-center">
                                        
                                        <button type="submit" name="Crear" class="btn">Crear</button>

                                    </div>
                                </form>
                            </div>
                            <div class="formularios-item d-none">
                                <form id="formulario-grid" class="md-form" action="savearticulo.php" method="POST" enctype="multipart/form-data">
                                    <div class="identificacion">
                                        <input type="hidden" name="diseño" value="3">
                                        <input type="text" name="titulo" placeholder="Título del artículo">
                                        <select name="categoria" id="categoria">
                                            <option value="">Categoría del Artículo</option>
                                            <option value="">Categoría del Artículo</option>
                                                <option value="familia">Familia</option>
                                                <option value="mujeres">Mujeres</option>
                                                <option value="parejas">Parejas</option>
                                                <option value="infanto-juvenil">Infanto-Juvenil</option>
                                                <option value="empresas">Empresas</option>
                                                <option value="cursos">Cursos</option>
                                                <option value="talleres">Talleres</option>
                                                <option value="emprendimiento">Emprendimiento</option>
                                                <option value="sexo">Sexo</option>
                                                <option value="test">Test</option>
                                                <option value="comportamiento">Comportamiento</option>
                                                <option value="felicidad">Felicidad</option>
                                                <option value="salud mental">Salud Mental</option>
                                                <option value="orientacion">Orientacion</option>
                                                <option value="consultas">Consultas</option>
                                                <option value="ayuda">Ayuda</option>
                                                <option value="apoyo">Apoyo</option>
                                                <option value="exito">Exito</option>
                                                <option value="acompañamiento">Acompañamiento</option>
                                                <option value="dinero">Dinero</option>
                                                <option value="economia">Economia</option>
                                                <option value="aprendizaje">Aprendizaje</option>
                                                <option value="coaching">Coaching</option>
                                                <option value="Riesgos Psicosociales">Riesgos Psicosociales</option>
                                                <option value="herramientas">Herramientas</option>
                                                <option value="educacion">Educacion</option>
                                                <option value="espiritualidad">Espiritualidad</option>
                                                <option value="comunicacion">Comunicacion</option>
                                                <option value="padres">Padres</option>
                                                <option value="adultos mayores">Adultos Mayores</option>
                                                <option value="hombres">Hombres</option>
                                                <option value="amor">Amor</option>
                                                
                                        </select>
                                    </div>
                                    
                                    <div class="imagenes file-field">
                                        <div class="imagen-muestra">
                                            <img src="./dist/img/disenos/diseno-grilla.png" alt="">

                                        </div>
                                        <h5>Imágenes</h5>
                                        <div class="btn">

                                            <span>Imagen Destacada</span>
                                            <input name="imagen1" type="file" accept="image/*" required>
                                        </div>
                                        <div class="btn">
                                            <span>Imagen 2</span>
                                            <input name="imagen2" type="file" accept="image/*" required>
                                        </div>
                                        <div class="btn">
                                            <span>Imagen 3</span>
                                            <input name="imagen3" type="file" accept="image/*" required>
                                        </div>

                                    </div>
                                    <div class="escritos">
                                        <h5>Párrafo Introductorio</h5>
                                        <div class="md-form">
                                            <textarea name="subtitulo" id="form6" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form7">Introducción</label>
                                        </div>
                                        <h5>Párrafos</h5>
                                        <div class="md-form">
                                            <textarea name="texto" id="form7" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form7">Primer Escrito</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea name="texto2" id="form8" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form8">Segundo Escrito</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea name="texto3" id="form9" class="md-textarea form-control" rows="7" style=" padding: 6px; background-color: white;"></textarea>
                                            <label for="form9">Tercer Escrito</label>
                                        </div>
                                    </div>
                                    <div class="acciones text-center">
                                        
                                        <button type="submit" name="Crear" class="btn">Crear</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                        
                    </div>

                </div>
            </div>

        </section>

    </main>
    <footer>
        <div class="contenedor-general">  
          <div class="pie-footer">
            <p>© 2020 Copyright: <a href="#"  style="color: #f1f1f1; font-weight: 700;">psicokrecer.com</a></p>
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
      <script type="text/javascript" src="src/js/panel-panel.js"></script>
      <script type="text/javascript" src="src/js/mostrar-diseno.js"></script>
    </body>
</html>
<?php
    }  else {
        header ("Location: lgn.php");
    }
?>
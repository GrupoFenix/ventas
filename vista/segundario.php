<!--VIDEO BANNER DE INICIO-->
<main id="banner">
    <div class="texto-banner">
      <p class="titulo text-center text-bold text-warning">Los Escritos del Fénix</p>
      <img src="dist/img/linea.png" class="lineiris"><br>
        <p class=" text-white text-center text-bold cuerpo">Bienvenido a nuestra tienda, tenemos una amplia gama de libros</p>
        <?php
        $Sesion=isset($_SESSION['perfil'])?$_SESSION['perfil']:0;
        if ($Sesion!=2) { ?>
          <button type="button" class="btn btn-outline-warning fs-5" data-toggle="modal" data-target="#modal-register" href="vista/plantilla/register.php">Registrarme</button>
        <?php } ?>
    </div>
    
    <!--<iframe muted autoplay loop class="videobanner" src="https://drive.google.com/file/d/1koabqqnj2E0BRRATFsyfi60C60uyH21U/preview"  allow="autoplay" allowfullscreen></iframe>-->
    
    <video muted autoplay loop class="videobanner">
        <source src="dist/media/videobanner.mp4" type="video/mp4">
    </video>
    <div class="capa"></div>
</main>
<section style=
    "background-image: url(dist/img/fondo.jpg);
    background-repeat: no-repeat;
    background-size: cover;">
<br>
<?php 
$ip= $_SERVER['REMOTE_ADDR'];
        ?>

<!--FRASE DEL ESCRITOR-->
<div class="d-flex flex-wrap justify-content-center content col-lg-12">
<img src="dist/img/linea4.png" class="justify-content-center" width="90%" height="140px">
  <div class="p-2 d-flex" style="width:50%;" id="cuerpo">
    <h4 class="text-center p-3 fs-2 mt-4 fraseautor">Frase de la semana:<span class="text-primary fs-1 text-bold"> Annelies Marie Frank</span>
      <p class="p-2 text-center text-secondary fs-1" style="font-family:cursiva;">"La gente quiere que mantengamos la boca cerrada, pero eso no te impide tener tu propia opinión. Todo el mundo debe poder decir lo que piensa"</p></h4>
  </div>
  <div class="p-2 d-flex">
    <img src="dist/img/autora1.png" style="height: 35rem; width:29rem;">
  </div>
</div>
<br>
<!--FLEX DE HABITOS DE LECTURA--> 

<section class="w-50 mx-auto text-center" id="cuerpo">
  <img src="dist/img/linea2.png" class="lineiris justify-content-center" width="90%">
  <h1 class="p-3 fs-2 border-top border-3">¿Sabías estos <span class="text-primary text-bold"> beneficios de la lectura?</span></h1>
</section>
<br>
<section style=
    "background-image: url(dist/img/photo1.png);
    background-repeat: no-repeat;
    background-size: cover;">
<div class="d-flex flex-wrap justify-content-center col-lg-12 col-md-12 col-sm-12 carta2" style="height:18rem;">

  <div class="card text-bg-light mt-5 cartita" style="max-width: 16rem; height: 17rem ">
      <div class="card-body">
        <p class="card-text text-justify"> Ayuda a la compresión de textos, mejora la gramática y la escritura de las personas.</p>
        <p class="card-text text-justify"> Ayuda a aumentar la curiosidad y el conocimiento sobre determinados temas.</p>
      </div>
  </div>

  <div class="card text-bg-primary" style="max-width: 16rem; height: 18rem">
    <img src="dist/img/card1.png" class="card-img" style="max-width: 16rem; height: 18rem">
  </div>

  <div class="card text-bg-light mt-5 cartita" style="max-width: 16rem; height: 17rem">
    <div class="card-body">
      <p class="card-text text-justify"> Estimula el razonamiento y la capacidad memorística de las personas.</p>
      <p class="card-text text-justify"> Aporta la capacidad del pensamiento crítico y la confianza a la hora de hablar.</p>
    </div>
  </div>

</div>

<div class="d-flex flex-wrap justify-content-center col-lg-12 col-md-12 col-sm-12 carta2"  style="height:18rem">

  <div class="card text-bg-primary cartita" style="max-width: 18rem; height: 18rem">
    <img src="dist/img/card2.jpg" class="card-img" style="max-width: 18rem; height: 18rem">
  </div>

  <div class="card text-bg-light cartita" style="max-width: 16rem; height: 18rem">
    <div class="card-body">
      <p class="card-text text-justify">La lectura es pasatiempo y muy buena vía contra el aburrimiento.</p>
      <p class="card-text text-justify">La lectura ayuda a explorar nuevos mundos y mejora la imaginación de las personas</p>
    </div>
  </div>

  <div class="card text-bg-primary cartita" style="max-width: 18rem; height: 18rem">
  <img src="dist/img/card3.jpg" class="card-img" style="max-width: 18rem; height: 18rem">
  </div>

</div>

<div class="d-flex flex-wrap justify-content-center col-lg-12 col-md-12 col-sm-12 carta3" style="height:18rem">

  <div class="card text-bg-light cartita" style="max-width: 16rem; height: 16rem">
    <div class="card-body">
      <p class="card-text text-justify"> La lectura favorece la concentración y previene el estrés.</p>
      <p class="card-text text-justify"> La lectura crea vínculos y ayuda a conectar (conversación) con otras personas por afinidad de lecturas, emociones y conocimientos.</p>
    </div>
  </div>

  <div class="card text-bg-primary cartita" style="max-width: 16rem; height: 18rem">
  <img src="dist/img/card4.jpg" class="card-img" style="max-width: 16rem; height: 18rem">
  </div>

  <div class="card text-bg-light cartita" style="max-width: 16rem; height: 16rem">
    <div class="card-body">
      <p class="card-text text-justify">La lectura siempre te acompaña y hace que no te sientas solo, independientemente del lugar donde te encuentres.</p>
      <p class="card-text text-justify">Libera nuestras emociones: alegría, tristeza, cólera, miedo, sorpresa, amor…</p>
  </div>
  </div>

</div> 
</section><br>
      
<!--INTRODUCCIÓN-->
<section class="w-50 mx-auto text-center" id="cuerpo">
  <img src="dist/img/linea3.png" class="lineiris justify-content-center" width="90%">
  <h1 class="p-3 fs-2 border-top border-3">Una tienda especial para tí, <span class="text-primary text-bold"> Libros para todos los gustos</span></h1>
    <p class="p-3 fs-4"><span class="text-primary text-bold">Los escritos del Fénix</span> es la tienda de libros que tanto esperabas, compra con nosotros y vive una esperiencia única</p>
</section>
      <!--OBJETIVOS DE LA TIENDA-->
<section class="container-fluid p-4">
  <div class="row w-75 mx-auto fila">
    <div class="col-lg-6 col-md-12 col-sm-12 d-flex my-5 icono-wrap">
      <img src="./vista/tienda/img/int1.png" alt="" width="180" height="160">
        <div>
          <h3 class="fs-5 mt-4 px-4 pb-1 text-primary text-bold">Confiabilidad</h3>
            <p class="px-4">Tus libros favoritos cuentan con el respaldo de la editoriales más conocidas, tenemos una amplia gama de contenido de primera calidad.</p>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 d-flex my-5 icono-wrap">
      <img src="./vista/tienda/img/int2.png" alt="" width="180" height="160">
        <div>
          <h3 class="fs-5 mt-4 px-4 pb-1 text-primary text-bold">Seguridad</h3>
            <p class="px-4">Tus compras siempre protegidas y respaldadas por nuestro equipo que espera puedas disfrutar de una lectura acogedora.</p>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 d-flex my-5 icono-wrap">
      <img src="./vista/tienda/img/int3.png" alt="" width="180" height="160">
        <div>
          <h3 class="fs-5 mt-4 px-4 pb-1 text-primary text-bold">Facilidad</h3>
            <p class="px-4">Comprar un Libro es sencillo, sin tantos rodeos y directo al grano, puedes optar por diferentes métodos de pago.</p>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 d-flex my-5 icono-wrap">
      <img src="./vista/tienda/img/int4.png" alt="" width="180" height="160">
        <div>
          <h3 class="fs-5 mt-4 px-4 pb-1 text-primary text-bold">Eficacia</h3>
            <p class="px-4">El envío de tus productos en el tiempo acordado, y con las mejores condiciones que te ofrece nuestra tienda</p>
        </div>
    </div>
  </div>
</section>
<hr><hr>
</section>          
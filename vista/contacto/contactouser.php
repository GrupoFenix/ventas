<?php
    date_default_timezone_set('America/Lima');
    $fecha=date("Y-m-d H:i:s");
?>
<!--FORMULARIO DE CONTACTO-->
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div><br><br><br>
    <section class="d-flex justify-content-center align-items-center mt-5 mb-5" >
        <div class="card col-sm-12 col-md-6 col-lg-4 p-4" style="border-radius:20px"> 
            <div class="mb-2 d-flex justify-content-start align-items-center">        
                <h2 class="text-bold text-info">  <i class="bi bi-chat-left-quote"></i> &nbsp; Bienvenido:&nbsp;<?=$_SESSION['login']?></h2>
            </div><br>
            <h4 class="text-bold text-info"><i class="bi bi-person-fill text-primary"></i> Cliente: <h5 class="text-teal"><?=$_SESSION['nombre']."&nbsp;". $_SESSION['apellido']?></h5></h4><br>
            <h4 class="text-bold text-info"><i class="bi bi-envelope-fill text-warning"></i> Correo :<h5 class="text-teal"><?=$_SESSION['email']?></h5></h4>
            <div>
                <form id = "contacto" action="?ctrl=CtrlContacto&accion=guardarNuevo" method="post">
                    <div class="col-md-6">
                        <label hidden for="id" class="form-label">Id:</label>
                        <input hidden type="text" class="form-control"name="id" value="" id="id">
                    </div>  
                    <div>
                        <label hidden for="nombre"> <i class="bi bi-person-fill text-primary"></i> Nombres</label>
                        <input hidden type="text" class="form-control" name="nombre" id="nombre"  value="<?=$_SESSION['nombre']?>">
                        <div class="nombre text-danger "></div>
                    </div>

                        <label hidden for="apellido"> <i class="bi bi-person-bounding-box text-primary"></i> Apellidos</label>
                        <input hidden type="text" class="form-control" name="apellido" id="apellido" value="<?=$_SESSION['apellido']?>">
                        <div class="apellido text-danger"></div>
            
                    <div class="mb-4">
                        <label hidden for="correo"><i class="bi bi-envelope-fill text-warning"></i> Correo</label>
                        <input hidden type="email" class="form-control" name="correo" id="correo" placeholder= "Correo Electrónico" value="<?= $_SESSION['email']?>" >
                        <div class="correo text-danger"></div>
                    </div>  
                    <div class="mb-4">
                        <label hidden for="sexo" class="mr-4"><i class="bi bi-gender-ambiguous text-danger"></i> Sexo: </label>
                        <input hidden type="text" class="form-check-input "  name="sexo"  value="" >
                    </div> 
                    <div class="mb-4">
                        <label for="mensaje" class="text-info fs-4"> <i class="bi bi-chat-right-dots-fill text-success" required></i> ¿Qué nos deseas contar?</label>
                        <textarea name="mensaje" id="mensaje" class="form-control" placeholder="¿Qué nos quieres contar?"></textarea>
                        <div class="mensaje text-danger"></div>
                    </div> 
                    <div class="col-md-6">
                        <label hidden for="fecha" class="form-label">fecha:</label>
                        <input hidden type="datetime" class="form-control"name="fecha" value="<?=$fecha?>" id="fecha">
                    </div>
                    <div class="mb-2">
                        <button  type="submit" name="Enviar" id ="botton" value="Enviar" class="col-12 btn btn-primary d-flex justify-content-between ">
                            <span>Enviar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div> 
                              
                </form>
            </div>
        </div>
    </section><br><br><br>
    <script src="dist/js/contacto.js"></script>
    
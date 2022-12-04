<?php

    if (isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
    }else {
        header('Location: ./vista/plantilla/register.php');
    };

?>

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div><br><br><br><br><br><br><br><br>
    <section class="d-flex justify-content-center align-items-center mt-5 mb-5">
        <div class="card col-sm-12 col-md-6 col-lg-4 p-4" style="border-radius:20px"> 
            <div class="d-flex justify-content-start align-items-center">        
                <h2 class="text-bold text-dark">Verificar Cuenta</h2>
            </div><br>
            <div>
                <form id = "contacto" action="?ctrl=CtrlCliente&accion=GuardarCodigo" method="post">
                    <div>
                        <label for="codigo"> <i class="bi bi-person-fill text-primary"></i> Código de Verificación:</label>
                        <input type="text" class="form-control" name="codigo" id="codigo"  value="">
                        <input hidden type="text" class="form-control" name="email" id="email"  value="<?php echo $email; ?>">
                        <div class="nombre text-danger "></div>
                    </div><br>
                    <div class="mb-2">
                        <button  type="submit" name="Enviar" id ="botton" value="Enviar" class="col-12 btn btn-primary d-flex justify-content-between ">
                            <span>Enviar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div> <br>  
                </form>
            </div>
        </div>
    </section><br><br><br><br><br><br><br><br>

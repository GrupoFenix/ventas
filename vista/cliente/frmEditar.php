<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlCliente&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" class="form-control"
                name="idclientes" value="<?=$clientes->getId()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Nombre de Cliente:</span>
            <input type="text" class="form-control"
                name="nombres" value="<?=$clientes->getNombre()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Apellido:</span>
            <input type="text" class="form-control"
                name="apellidos" value="<?=$clientes->getApellido()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Dirección:</span>
            <input type="text" class="form-control"
                name="direcciones" value="<?=$clientes->getDireccion()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Teléfono:</span>
            <input type="text" class="form-control"
                name="telefonos" value="<?=$clientes->getTelefono()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">DNI:</span>
            <input type="text" class="form-control"
                name="dni" value="<?=$clientes->getDNI()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">RUC:</span>
            <input type="text" class="form-control"
                name="ruc" value="<?=$clientes->getRUC()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Correo Electrónico:</span>
            <input type="text" class="form-control"
                name="correoelectronico" value="<?=$clientes->getCorreoElectronico()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Contraseña:</span>
            <input type="password" class="form-control"
                name="contraseñas" value="<?=$clientes->getContraseña()?>">
        </div>
        
        <div class="col-md-6">
            <label for="inputtipocliente" class="form-label">Tipo de Cliente:</label>
            <select name="tipocliente" class="form-control" id="tipocliente">
                <?php
                    $tipoclientes = $clientes->getTipoCliente()->leer()['data'];
                    $tipocliente = $clientes->getTipoCliente()->getId();
                    foreach ($tipoclientes as $tp) { 
                        if ($tp["idtipos_clientes"]==$tipocliente)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
            value="<?=$tp["idtipos_clientes"]?>"><?=$tp["tipocliente"]?></option>
            <?php } ?>
            </select>
            </div><br>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlCliente" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    </div>
</section>   

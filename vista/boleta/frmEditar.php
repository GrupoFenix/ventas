<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlBoleta&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" class="form-control"
                name="idboletas" value="<?=$boleta->getId()?>" id="inputID">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Número de Boleta:</span>
            <input type="text" class="form-control"
                name="numero" value="<?=$boleta->getNumero()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Fecha:</span>
            <input type="date" class="form-control"
                name="fecha" value="<?=$boleta->getFecha()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Total:</span>
            <input type="text" class="form-control"
                name="total" value="<?=$boleta->getTotal()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">IGV:</span>
            <input type="text" class="form-control"
                name="igv" value="<?=$boleta->getIGV()?>">
        </div>
        
        <div class="col-md-6">
            <label for="inputidclientes" class="form-label">Nombre de Cliente:</label>
            <select name="nombres" class="form-control" id="nombres">
                <?php
                    $clientess = $boleta->getCliente()->leer()['data'];/*posible fallo */
                    $clientes = $boleta->getCliente()->getId();
                    foreach ($clientess as $c) { 
                        if ($c["idclientes"]==$clientes)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
                value="<?=$c["idclientes"]?>"><?=$c["nombres"]?></option>
            <?php } ?>
            </select>
            </div>    
        </div>
    <br>
    <div class="col-md-3">
    <button type="submit" class="form-control btn btn-primary">
        <i class="bi bi-save2"></i> Guardar</button>
    </div>
    </form>
    <br><a href="?ctrl=CtrlBoleta" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    </div>
</section>   

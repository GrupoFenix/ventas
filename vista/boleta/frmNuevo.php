<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlBoleta&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idboletas" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputNumero" class="form-label">Número:</label>
            <input type="text" class="form-control"
                name="numero" value="" id="inputNumero">
        </div>
        <div class="col-md-6">
            <label for="inputFecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control"
                name="fecha" value="" id="inputFecha">
        </div>
        <div class="col-md-6">
            <label for="inputTotal" class="form-label">Total:</label>
            <input type="text" class="form-control"
                name="total" value="" id="inputTotal">
        </div>
        <div class="col-md-6">
            <label for="inputIGV" class="form-label">IGV:</label>
            <input type="text" class="form-control"
                name="igv" value="" id="inputIGV">
        </div>
        <div class="col-md-6">
            <label for="inputnombres" class="form-label">Nombre de Cliente:</label>
            <select name="nombres" class="form-control" id="nombres">
                <?php
                    $clientes = $boleta->getCliente()->leer()['data'];
                    foreach ($clientes as $c) { ?>
                    <option value="<?=$c["idclientes"]?>"><?=$c["nombres"]?></option>
                    <?php } ?>
            </select>
        </div>
        </div>
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

    <section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlEstadoPedido&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idestadopedido" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="InputEstadoPed" class="form-label">Estado del Pedido:</label>
            <input type="text" class="form-control"
                name="estadoped" value="" id="InputEstadoPed">
        </div>
        <div class="col-md-6">
            <label for="InputFechaActualizacion" class="form-label">Fecha de Actualización:</label>
            <input type="date" class="form-control"
                name="fechaactualizacion" value="" id="InputFechaActualizacion">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlEstadoPedido" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>
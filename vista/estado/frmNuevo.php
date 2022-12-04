<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlEstado&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idestado" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputEstado" class="form-label">Estado de Cuenta:</label>
            <input type="text" class="form-control"
                name="estado" value="" id="inputEstado">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlEstado" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>

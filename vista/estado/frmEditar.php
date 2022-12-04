<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlEstado&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="idestado" value="<?=$estado->getId()?>"
            class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Estado de Cuenta:</span>
            <input type="text" name="estado" value="<?=$estado->getEstado()?>"
            class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlEstado" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
            Retornar</a>
</div>
</section>
    <section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlEstadoPedido&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="idestadopedido" value="<?=$estadopedido->getId()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Estado del Pedido:</span>
            <input type="text" name="estadoped" value="<?=$estadopedido->getEstadoPed()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">fecha de Actualización:</span>
            <input type="date" name="fechaactualizacion" value="<?=$estadopedido->getFechaActualizacion()?>" 
                class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlEstadoPedido" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>

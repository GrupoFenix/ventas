<section class="content">
    <div class="container-fluid">
        <form action="?ctrl=CtrlGenero&accion=guardarEditar" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text">Id:</span>
                <input type="text" name="id" value="<?=$generos->getId()?>" 
                    class="form-control">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Generos Literario:</span>
                <input type="text" name="generos" value="<?=$generos->getGenero()?>" 
                    class="form-control">
            </div>
            <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Guardar
                    </button>
            </div>
            
        </form>
    </div>
</section>
    <section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlEditorial&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="ideditoriales" value="<?=$editoriales->getId()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Casa Editorial:</span>
            <input type="text" name="editoriales" value="<?=$editoriales->getEditorial()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlEditorial" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>

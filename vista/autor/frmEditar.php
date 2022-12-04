    <section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlAutor&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="idautores" value="<?=$autores->getId()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Nombres:</span>
            <input type="text" name="fullnombres" value="<?=$autores->getFullNombres()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Fecha de Nacimiento:</span>
            <input type="date" name="fechanac" value="<?=$autores->getFechaNac()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Fecha de Defunción:</span>
            <input type="date" name="fechadef" value="<?=$autores->getFechaDef()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlAutor" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>

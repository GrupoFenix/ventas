<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlAutorLibro&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputAutor" class="form-label">Autor de Libro:</label>
            <select name="fullnombres" class="form-control" id="fullnombres">
                <?php
                    $autores = $autorlibro->getAutor()->leer()['data'];
                    foreach ($autores as $a) { ?>
                    <option value="<?=$a["idautores"]?>"><?=$a["fullnombres"]?></option>
                    <?php } ?>
            </select>

        </div>
        <div class="col-md-6">
            <label for="inputLibro" class="form-label">Tìtulo del Libro:</label>
            <select name="titulo" class="form-control" id="titulo">
                <?php
                    $titulo = $autorlibro->getLibro()->leer()['data'];
                    foreach ($titulo as $l) { ?>
                    <option value="<?=$l["idlibros"]?>"><?=$l["titulo"]?></option>
                    <?php } ?>
            </select>
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlAutorLibro" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>

<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlAutorLibro&accion=guardarEditar" method="post">
        
        <div class="col-md-6">
            <label for="inputAutor" class="form-label">Autor:</label>
            <select name="fullnombres" class="form-control" id="fullnombres">
                <?php
                    $autoress = $autorlibro->getAutor()->leer()['data'];
                    $autores = $autorlibro->getAutor()->getId();
                    foreach ($autoress as $a) { 
                        if ($a["idautores"]==$autores)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
            value="<?=$a["idautores"]?>"><?=$a["fullnombres"]?></option>
            <?php } ?>
            </select>
            </div>
        <div class="col-md-6">
            <label for="inputLibro" class="form-label">Tìtulo del Libro:</label>
            <select name="titulo" class="form-control" id="titulo">
                <?php
                    $libross = $autorlibro->getLibro()->leer()['data'];
                    $libros = $autorlibro->getLibro()->getId();
                    foreach ($libross as $l) { 
                        if ($l["idlibros"]==$libros)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
            value="<?=$l["idlibros"]?>"><?=$l["titulo"]?></option>
            <?php } ?>
            </select>
            </div>
        </div><br>
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

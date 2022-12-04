<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlLibro&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" class="form-control"
                name="idlibros" value="<?=$libros->getId()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Título de Libro:</span>
            <input type="text" class="form-control"
                name="titulo" value="<?=$libros->getTitulo()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Descripción:</span>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5">
                <?=$libros->getDescripcion()?>
                </textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Precio Unitario:</span>
            <input type="text" class="form-control"
                name="precio_unitario" value="<?=$libros->getPrecioUnitario()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Año de Publicación:</span>
            <input type="text" class="form-control"
                name="añopublicacion" value="<?=$libros->getAñoPublicacion()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Stock:</span>
            <input type="text" class="form-control"
                name="stock" value="<?=$libros->getStock()?>">
        </div>
        
        <div class="col-md-6">
            <label for="inputGenero" class="form-label">Genero Literario:</label>
            <select name="generos" class="form-control" id="generos">
                <?php
                    $geneross = $libros->getGenero()->leer()['data'];
                    $generos = $libros->getGenero()->getId();
                    foreach ($geneross as $g) { 
                        if ($g["idgeneros"]==$generos)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
            value="<?=$g["idgeneros"]?>"><?=$g["generos"]?></option>
            <?php } ?>
            </select>
        
        </div><br>
        <div class="input-group mb-3">
            <span class="input-group-text">Imagen principal</span>
            <input type="file" class="form-control"
                name="url" value="">
        </div><br>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
        
    </form>
    <br><a href="?ctrl=CtrlLibro" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    </div>
</section>   

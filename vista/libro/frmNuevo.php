<section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlLibro&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idlibros" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputTitulo" class="form-label">Título del Libro:</label>
            <input type="text" class="form-control"
                name="titulo" value="" id="inputTitulo">
        </div>
        <div class="col-md-6">
            <label for="InputDescripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control"
                name="descripcion" value="" id="InputDescripcion">
        </div>
        <div class="col-md-6">
            <label for="InputPrecioUnitario" class="form-label">Precio Unitario:</label>
            <input type="text" class="form-control"
                name="precio_unitario" value="" id="InputPrecioUnitario">
        </div>
        <div class="col-md-6">
            <label for="InputAñoPublicación" class="form-label">Año de Publicación:</label>
            <input type="text" class="form-control"
                name="añopublicacion" value="" id="InputAñoPublicación">
        </div>
        <div class="col-md-6">
            <label for="InputStock" class="form-label">Stock:</label>
            <input type="text" class="form-control"
                name="stock" value="" id="InputStock">
        </div>
       
        <div class="col-md-6">
            <label for="inputGenero" class="form-label">Género Literario:</label>
            <select name="generos" class="form-control" id="generos">
                <?php
                    $generos = $libros->getGenero()->leer()['data'];
                    foreach ($generos as $g) { ?>
                    <option value="<?=$g["idgeneros"]?>"><?=$g["generos"]?></option>
                    <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <label for="url" class="form-label">Imagen Producto:</label>
            <input type="file" class="form-control"
                name="url" value="" id="url">
        </div>

        </div>
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

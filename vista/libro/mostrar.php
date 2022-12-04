<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlLibro&accion=nuevo" class="btn btn-info ml-2">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Libro</a>
        
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <div class="table-responsive">
    <table class="table table-striped text-center text-wrap align-middle" style="zoom:80%;">
        <thead class="bg-info">
            <tr>
            <th class="align-middle">Id</th>
            <th class="align-middle">Imagen de Producto</th>
            <th class="align-middle">Título del Libro</th>
            <th class="align-middle">Descripción</th>
            <th class="align-middle">Precio Unitario</th>
            <th class="align-middle">Año de Publicación</th>
            <th class="align-middle">Stock</th>
            <th class="align-middle">Genero Literario</th>
            <th class="align-middle">Editorial</th>
            <th class="align-middle">Autor(es)</th>
            <th class="align-middle">Operaciones</th>
        </tr>
        </thead>
        <tbody >
            <?php 
    if (is_array($data))
    foreach ($data as $l) { ?>
        <tr>
            <td class="align-middle"><?=$l["idlibros"]?></td>
            <td class="align-middle"><img src="recursos/images/catalogo/<?=$l['url']?>" width="100px"></td>
            <td class="align-middle"><?=$l["titulo"]?></td>
            <td class="text-justify align-middle">
              <a class="btn btn-info" href="#" data-id='<?=$l["idlibros"]?>' data-toggle="modal" data-target="#modal-info" >
              <i class="bi bi-journal-bookmark"></i> Descripción</a>
              
            </td>
            <td class="align-middle">S/ <?=$l["precio_unitario"]?></td>
            <td class="align-middle"><?=$l["añopublicacion"]?></td>
            <td class="align-middle"><?=$l["stock"]?></td>
             <td class="align-middle"><?=$l["generos"]?></td>
             <td class="align-middle"><!--?=$l["editoriales"]?--></td>
             <td class="align-middle"><!--?=$l["fullnombres"]?--></td>
            <td class="align-middle">
                <a class="btn btn-success" title="Agregar imagenes" href="?ctrl=CtrlLibro&accion=editar&idlibros=<?=$l["idlibros"]?>">
                    <i class="bi bi-card-image"></i></a>
                <a class="btn btn-info" title="Agregar Autor" href="?ctrl=CtrlLibro&accion=eliminar&idlibros=<?=$l["idlibros"]?>">
                <i class="ion ion-person-add"></i></a>
                <a class="btn btn-primary" title="Editar libro" href="?ctrl=CtrlLibro&accion=editar&idlibros=<?=$l["idlibros"]?>">
                    <i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger" title="Eliminar libro" href="?ctrl=CtrlLibro&accion=eliminar&idlibros=<?=$l["idlibros"]?>">
                    <i class="bi bi-trash"></i></a>
            </td>
        </tr>
    <?php }    ?>
        </tbody>
    </table>
    </div>
    <br>
    </div>

    <nav aria-label="..." class="d-flex justify-content-center">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link">Anterior</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Siguiente</a>
        </li>
      </ul>
    </nav>
</section>

<div class="modal fade" id="modal-info">

</div>

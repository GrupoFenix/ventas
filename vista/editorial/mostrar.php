<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlEditorial&accion=nuevo" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nueva Editorial</a>
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <table class="table table-striped  text-wrap align-middle">
        <thead class="bg-info text-center">
          <tr>
            <th>Id</th>
            <th>Casa Editorial</th>
            <th>Operaciones</th>
          </tr>  
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
        foreach ($data as $ed) { ?>
            <tr>
                <td class="text-center"><?=$ed["ideditoriales"]?></td>
                <td><?=$ed["editoriales"]?></td>
                <td class="text-center">
                <a class="btn btn-primary" href="?ctrl=CtrlEditorial&accion=editar&ideditoriales=<?=$ed["ideditoriales"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a class="btn btn-danger" href="?ctrl=CtrlEditorial&accion=eliminar&ideditoriales=<?=$ed["ideditoriales"]?>">
                    <i class=" bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
        </tbody>
    </table>
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
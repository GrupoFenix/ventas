<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlAutor&accion=nuevo" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Autor</a>
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <table class="table table-striped text-nowrap">
        <thead class="bg-info text-center">
          <tr>
            <th>Id</th>
            <th class="text-wrap">Autores</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Defunción</th>
            <th>Operaciones</th>
          </tr>  
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
        foreach ($data as $a) { ?>
            <tr>
                <td class="text-center"><?=$a["idautores"]?></td>
                <td><?=$a["fullnombres"]?></td>
                <td class="text-center"><?=$a["fechanac"]?></td>
                <td class="text-center"><?=$a["fechadef"]?></td>
                <td class="text-center">
                <a class="btn btn-primary" href="?ctrl=CtrlAutor&accion=editar&idautores=<?=$a["idautores"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
        
                <a class="btn btn-danger" href="?ctrl=CtrlAutor&accion=eliminar&idautores=<?=$a["idautores"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
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
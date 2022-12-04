<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlAutorLibro&accion=nuevo" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> 
        Asignar Autor(es) a Libro</a>
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <div class="table-responsive">
    <table class="table table-striped text-nowrap">
        <thead class="text-center bg-info">
            <tr>
            <th>Autor de Libro</th>
            <th>Tìtulo de Libro</th>
            <th>Operaciones</th>
        </tr>
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
    foreach ($data as $al) { ?>
        <tr class="text-center">
             <td><?=$al["fullnombres"]?></td>
             <td><?=$al["titulo"]?></td>
            <td>
                <a class="btn btn-primary" href="?ctrl=CtrlAutorLibro&accion=editar&idautores=<?=$al["idautores"]?>&idlibros=<?=$al["idlibros"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a class="btn btn-danger" href="?ctrl=CtrlAutorLibro&accion=eliminar&idautores=<?=$al["idautores"]?>&idlibros=<?=$al["idlibros"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
            </td>
        </tr>
    <?php }    ?>
        </tbody>
    </table>
    </div>
    <br>
    </div>
</section>
<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlEstado&accion=nuevo" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Estado de Cuenta</a>
    <br><br>
    <table class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Estados de Cuentas</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
    foreach ($data as $e) { ?>
        <tr>
            <td><?=$e["idestado"]?></td>
            <td><?=$e["estado"]?></td>
            <td>
                <a href="?ctrl=CtrlEstado&accion=editar&idestado=<?=$e["idestado"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                / 
                <a href="?ctrl=CtrlEstado&accion=eliminar&idestado=<?=$e["idestado"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
            </td>
        </tr>
    <?php }    ?>
        </tbody>
    </table>

    <br><a href="?" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    </div>
</section>
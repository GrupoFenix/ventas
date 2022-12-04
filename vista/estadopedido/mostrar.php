<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlEstadoPedido&accion=nuevo" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Estado pedido de ventas</a>
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <div class="table-responsive">
    <table class="table table-striped text-nowrap">
        <thead class="bg-info text-center">
          <tr>
            <th>Id</th>
            <th>Estado de Pedido</th>
            <th>Fecha de Actualización</th>
            <th>Operaciones</th>
          </tr>  
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
        foreach ($data as $ep) { ?>
            <tr class="text-center">
                <td><?=$ep["idestadopedido"]?></td>
                <td><?=$ep["estadoped"]?></td>
                <td><?=$ep["fechaactualizacion"]?></td>
                <td>
                <a class="btn btn-primary" href="?ctrl=CtrlEstadoPedido&accion=editar&idestadopedido=<?=$ep["idestadopedido"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a class="btn btn-danger" href="?ctrl=CtrlEstadoPedido&accion=eliminar&idestadopedido=<?=$ep["idestadopedido"]?>">
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
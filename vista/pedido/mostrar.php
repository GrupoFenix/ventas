<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlPedido&accion=nuevo" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Pedido</a>
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <div class="table-responsive">
    <table class="table table-striped text-nowrap">
        <thead class="bg-info text-center">
            <tr>
            <th>Id</th>
            <th>Fecha de Pedido</th>
            <th>Fecha de Envío</th>
            <th>Nombre de Cliente</th>
            <th>Estado de Pedido</th>
            <th>Operaciones</th>
        </tr>
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
    foreach ($data as $p) { ?>
        <tr>
            <td><?=$p["idpedidos"]?></td>
            <td><?=$p["fechapedido"]?></td>
            <td><?=$p["fechaenvio"]?></td>
             <td><?=$p["nombres"]?></td>
             <td><?=$p["estadoped"]?></td>
            <td>
                <a class="btn btn-primary" href="?ctrl=CtrlPedido&accion=editar&idpedidos=<?=$p["idpedidos"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a class="btn btn-danger" href="?ctrl=CtrlPedido&accion=eliminar&idpedidos=<?=$p["idpedidos"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
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
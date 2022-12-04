<!-- Main content -->
<section class="content"
style=
    "background-image: url(dist/img/fondo.jpg);
    background-repeat: no-repeat;
    background-size: cover;">
   <h1 class="text-dark text-bold text-center p-3">Mis Boletas de Compra</h1>
    <div class="container-fluid d-flex justify-content-center">
    <br>
    <div class="">
    <table class="table table-striped table-responsive text-nowrap">
        <thead class="bg-dark text-center">
            <tr>
                <th>Numero de Boleta</th>
                <th>Fecha de Compra</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Subtotal</th>
                <th>Nombre de Cliente</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php 
    if (is_array($data))
    foreach ($data as $b) { ?>
        <tr>
            <td><?=$b["numero"]?></td>
            <td><?=$b["fecha"]?></td>
            <td>S/ <?=number_format($b['precio_unitario'], 2, ',', ' ')?></td>
            <td>S/ <?=number_format($b['total'], 3, ',', ' ')?></td>
            <td>S/ <?=number_format($b["subtotal"],3, ',', ' ')?></td>
             <td><?=$b["nombrecli"]?></td>
            <td>
                <a target="_blank" rel="noopener" href="?ctrl=CtrlBoleta&accion=imprimirBoleta&id=<?=$b['idboletas']?>" class="btn btn-info">
                <i class="fas fa-print"></i> Imprimir Boleta</a>
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
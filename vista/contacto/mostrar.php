<<section class="content main-header">
    <div class="container-fluid">
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <table class="table table-striped text-nowrap">
        <thead class="bg-info text-center">
          <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Sexo</th>
            <th>Mensaje</th>
            <th>Fecha de Recibido</th>
            <th>Operaciones</th>
          </tr>  
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
        foreach ($data as $ct) { ?>
            <tr>
                <td><?=$ct["id"]?></td>
                <td><?=$ct["nombre"]?></td>
                <td><?=$ct["apellido"]?></td>
                <td><?=$ct["correo"]?></td>
                <td><?=$ct["sexo"]?></td>
                <td><?=$ct["mensaje"]?></td>
                <td><?=$ct["fecha"]?></td>
                <td>
                <a class="btn btn-danger" href="?ctrl=CtrlContacto&accion=eliminar&id=<?=$ct["id"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
        </tbody>
    </table>
    <br>
    </div>
</section>
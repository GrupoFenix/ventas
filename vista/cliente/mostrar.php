<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">

    <a href="?ctrl=CtrlCliente&accion=nuevo" class="btn btn-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Cliente</a>
    <a href="?" class="btn btn-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
    <br><br>
    <table class="table table-striped text-wrap align-middle" style="zoom: 70%;">
        <thead class="bg-info text-center">
            <tr>
            <th class="align-middle">Id</th>
            <th class="align-middle">Nombres</th>
            <th class="align-middle">Apellidos</th>
            <th class="align-middle">Direcciones</th>
            <th class="align-middle">DNI</th>
            <th class="align-middle">Email</th>
            <th class="align-middle">Telefonos</th>
            <th class="align-middle">Nombre de usuario</th>
            <th class="align-middle">Contraseñas</th>
            <th class="align-middle">Perfil</th>
            <th class="align-middle">Operaciones</th>
        </tr>
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
    foreach ($data as $c) { ?>
        <tr>
            <td><?=$c["idclientes"]?></td>
            <td><?=$c["nombre"]?></td>
            <td><?=$c["apellido"]?></td>
            <td><?=$c["direccion"]?></td>
            <td><?=$c["dni"]?></td>
            <td><?=$c["email"]?></td>
            <td><?=$c["telefono"]?></td>
            <td><?=$c["login"]?></td>
            <td><?=$c["pasword"]?></td>
             <td><?=$c["perfil"]?></td>
            <td class="text-center">
                <a class="btn btn-primary" href="?ctrl=CtrlCliente&accion=editar&idclientes=<?=$c["idclientes"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a class="btn btn-danger" href="?ctrl=CtrlCliente&accion=eliminar&idclientes=<?=$c["idclientes"]?>">
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
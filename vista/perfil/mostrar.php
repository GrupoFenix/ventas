<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="btn btn-info nuevo">
                <i class="fa fa-plus-circle"></i> 
                Insertar Nuevo tipo de Perfil
            </a>
            <a href="?" class="btn btn-info">
                <i class="bi bi-arrow-90deg-left"></i>
                Retornar</a>
            <div class="mt-3 text-right">
                <button id="imprimirPDF" class="btn btn-secondary">
                    <i class="fa fa-file-pdf"></i> 
                    Descargar PDF
                </button>
                <button id="imprimirExcel" class="btn btn-secondary">
                    <i class="fa fa-file-excel"></i> 
                    Descargar XLSX
                </button>
            </div>
        </div>
    </div>
    
    <br><br>
    <table id="tablaDatos" class="table table-striped text-nowrap">
        <thead class="bg-info text-center">
          <tr>
            <th>Id</th>
            <th>Perfil</th>
            <th>Operaciones</th>
          </tr>  
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
        foreach ($data as $pf) { ?>
            <tr class="text-center">
                <td><?=$pf["idperfil"]?></td>
                <td><?=$pf["perfil"]?></td>
                <td>
                <a class="btn btn-primary" data-id="<?=$pf["idperfil"]?>" class="editar" href="#">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a class="btn btn-danger" data-id="<?=$pf["idperfil"]?>" data-reg="<?=$pf["perfil"]?>" class="eliminar" href="#">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
        </tbody>
    </table>
    
    <br>
    </div>
</section>
<!-- Modal Formulario - Nuevo / Editar -->
<div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog">
 
     <!-- Modal content-->
     <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="body-form">
    
        </div>
        
     </div>
    </div>
</div>
<!-- Modal Eliminar -->
<div class="modal fade" id="modal-eliminar" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="frm-eliminar"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body-eliminar">
                <div class="text-center">
                    <h5>¿Estas seguro que deseas seguir con la eliminación?</h5>
                    <h5 class="reg-eliminacion">Registro: </h5>
                </div>
            </div>
            <div class="modal-footer justify-content-between">            
                <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger" id="btn-confirmar" href="" data-id="">Eliminar</a>
            </div>
        </div>
    </div>
</div>

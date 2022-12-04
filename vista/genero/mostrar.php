<!-- Main content -->
<section class="content main-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-info nuevo">
                <i class="fa fa-plus-circle"></i> 
                Insertar Nuevo Genero
            </a>
            <a href="?" class="btn btn-info">
                <i class="bi bi-arrow-90deg-left"></i>
                Retornar</a>
        </div>
        <div class="col-md-6">
        <div class="text-right">
                <button id="imprimirPDF" class="btn btn-secondary">
                    <i class="fa fa-file-pdf"></i> 
                    Descargar PDF
                </button>
                <a href="?ctrl=CtrlGenero&accion=reporte&app=excel" class="btn btn-secondary">
                    <i class="fa fa-file-excel"></i> 
                    Descargar XLS
                </a>
                <a href="?ctrl=CtrlGenero&accion=reporte&app=word" class="btn btn-secondary">
                    <i class="fa fa-file-word"></i> 
                    Descargar DOC
                </a>
            </div>
        </div>
    </div>
    
    <br><br>
    <table id="tablaDatos" class="table table-striped text-wrap">
        <thead class="bg-info text-center">
          <tr>
            <th>Id</th>
            <th>Géneros Literarios</th>
            <th>Operaciones</th>
          </tr>  
        </thead>
        <tbody>
            <?php 
    if (is_array($data))
        foreach ($data as $g) { ?>
            <tr>
                <td class="text-center"><?=$g["idgeneros"]?></td>
                <td class="text-center"><?=$g["generos"]?></td>
                <td class="text-center">
                <a data-id="<?=$g["idgeneros"]?>" class="editar btn btn-primary" href="#">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                <a data-id="<?=$g["idgeneros"]?>" data-reg="<?=$g["generos"]?>" class="eliminar btn btn-danger" href="#">
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

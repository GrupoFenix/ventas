<!--modal descripcion-->

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Descripción de : <?=$data[0]['titulo']?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex">
                <img class="me-3" src="recursos/images/catalogo/<?=$data[0]['url']?>" width="100%">
                <h6><?=$data[0]['descripcion']?></h6>
            </div>
        </div>
    </div>

              <!--/modal-->
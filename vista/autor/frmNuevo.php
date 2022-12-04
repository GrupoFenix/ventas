    <section class="content main-header">
    <div class="container-fluid">
    <form action="?ctrl=CtrlAutor&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idautores" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputFullNombres" class="form-label">Nombres:</label>
            <input type="text" class="form-control"
                name="fullnombres" value="" id="inputFullNombres">
        </div>
        <div class="col-md-6">
            <label for="inputFechaNac" class="form-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control"
                name="fechanac" value="" id="inputFechaNac">
        </div>
        <div class="col-md-6">
            <label for="inputFechaDef" class="form-label">Fecha de Defunción:</label>
            <input type="date" class="form-control"
                name="fechadef" value="" id="inputFechaDef">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlAutor" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>
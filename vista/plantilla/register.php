<?php
     date_default_timezone_set('America/Lima');
     $fechaalta=date("Y-m-d H:i:s"); 
     ?>

        <div class="modal fade" id="modal-register">
        
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Registro de Nuevo Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="?ctrl=CtrlCliente&accion=guardarNuevo" method="post">
                            <div class="input-group col-md-12 mb-3">
                            
                                <label hidden for="inputID" class="form-label">Id:</label>
                                <input hidden type="text" class="form-control" name="idclientes" value="" id="iNPUTid">
                            
                                <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label"><i class="bi bi-person-fill"></i> Nombres:</label>
                                <input type="text" class="form-control"
                                    name="nombre" value="" id="nombre" placeholder="Nombres completos" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label" ><i class="bi bi-person-bounding-box"></i> Apellidos:</label>
                                <input type="text" class="form-control"
                                    name="apellido" value="" id="apellido" placeholder="Apellidos completos" required>
                                </div>
                            </div>

                            <div  class="input-group col-md-12 mb-2">
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">DNI:</label>
                                    <input type="text" class="form-control" name="dni" value="" id="dni" placeholder="Su n??mero de DNI" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label"><i class="telf"></i>N?? Tel??fono:</label>
                                <input type="text" class="form-control" name="telefono" value="" id="telefono" placeholder="Su n??mero de tel??fono" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="direccion" class="form-label"><i class="bi bi-address"></i>Direcci??n:</label>
                                <input type="text" class="form-control" name="direccion" value="" id="direccion" placeholder="Direcci??n / Distrito / Provincia/ Regi??n" required>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label"><i class="bi bi-envelope-fill"></i> Correo Electr??nico:</label>
                                <input type="text" class="form-control" name="email" value="" id="email" placeholder="ej. fenix@gmail.com" required>
                            </div>
                            
                            <p class="login-box-msg text-bold"><i class="bi bi-person-fill"></i> Datos de Sesi??n</p>

                            <div class="input-group mb-3">
                                <label for="login" class="form-label"></label>
                                <input type="text" class="form-control" name="login" value="" id="login" placeholder="Nombre de Usuario" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="input-group mb-3">
                                <label for="pasword" class="form-label"></label>
                                <input type="password" class="form-control" name="pasword" value="" id="pasword" placeholder="Contrase??a" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label hidden for="fecha" class="form-label">fecha:</label>
                                <input hidden type="datetime" class="form-control"name="fechaalta" value="<?=$fechaalta?>" id="fecha">
                            </div>
                            <div class="col-md-6">
                                <label hidden for="perfil" class="form-label">perfil:</label>
                                <input hidden type="text" class="form-control"name="perfil" value="2" id="perfil">
                            </div>
                            <div class="col-md-6">
                                <label hidden for="estado" class="form-label">Estado:</label>
                                <input hidden type="text" class="form-control" name="estado" value="0" id="estado">
                            </div>
                            <div class="col-md-6">
                                <input hidden type="text" class="form-control" name="codigo" value="<?=$codigo = rand(1000,9999)?>" id="codigo">
                            </div>
                            <div class="col-4 mb-4 ml-auto p-2">
                                <button type="submit" class="btn btn-warning btn-block">Registrarme</button>
                            </div>
                        </form>
                    </div>
                    <!--/.modal-body-->
                </div>
                <!-- /.modal-content -->
            </div>
             <!-- /.modal-dialog -->
        </div>
        <!--/.modal fade-->
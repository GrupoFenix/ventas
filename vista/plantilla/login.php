    <div class="modal fade" id="modal-login">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inicio de Sesión</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="login-box-msg">Registre la siguiente información</p>

                <form action="?ctrl=CtrlCliente&accion=validar" method="post">
                    <div class="input-group mb-3">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" name="clave" class="form-control" placeholder="Clave">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div><br>
                    <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Recuérdame
                        </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                    </div><br>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Ingresa usando Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Ingresa usando Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Perdiste tu Contraseña?</a>
                </p>
                <p class="nav-item ">
                  <a data-toggle="modal" data-target="#modal-register" title="Registrarme" href="plantilla/register.php">
                  Registrarme como nuevo usuario</a>
                </p>  
              </div>
            </div>
            <!-- /.modal-body -->
          </div>
        <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!--modal fade-->
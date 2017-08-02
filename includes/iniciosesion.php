            <div class="container">
                <div class="row">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <h1 class="text-center login-title">Error al iniciar sesión</h1>
                        <h2 class="text-center login-title">Usuario o contraseña incorrectos</h2>
                        <div class="account-wall">
                            <form action="index.php" method="POST" class="login">
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                    <input class="form-control" type="text" placeholder="Nombre de Usuario" id="username" value="username" name="username" required autofocus>
                                </div>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input class="form-control" type="password" placeholder="Contraseña" id="pass" value="pass" name="pass" required>
                                </div>
                                <div class="input-group margin-bottom-sm">
                                    <select name="usuario" id="usuario">
                                        <option>Administrador</option>
                                        <option>Reportería</option>
                                    </select>
                                </div>
                                <input type="hidden" name="accion" id="accion" value="entrar"/>
                                <input type="hidden" name="controlador" id="controller" value="Index"/>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" action="vista/inicio2.php">Entrar</button>
                                </div>
                            </form>
                            <form action="index.php" method="POST" class="login">
                                <input type="hidden" name="accion" id="accion" value="index"/>
                                <input type="hidden" name="controlador" id="controller" value="Index"/>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" action="vista/inicio2.php">Volver a página de Inicio</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

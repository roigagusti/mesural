<div id="editProfile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Configuración personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="conexiones/userConfig.php?action=editProfile">
                <input type="hidden" name="userId" value="<?php echo $id;?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="userNom" value="<?php echo $userName;?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="userEmail" value="<?php echo $userEmail;?>" style="color:#999" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="userPass" placeholder="******">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirmar contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="userPass2" placeholder="******">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Idioma</label>
                                <select class="form-control" name="userIdioma" style="color:#999" disabled>
                                    <option value="español">Español</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="addExp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Modal base</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="conexiones/administracio.php?action=addExp" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Número expedient</label>
                                <div class="input-group">
                                    <input type="text" class="form-control disabled" value="222" name="numeroExp" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">Estado inicial</label>
                                <select class="form-control" name="estatExp">
                                    <option value="2">En proceso</option>
                                    <option value="1">Pausa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Oferta</label>
                                <select class="form-control" name="expId">
                                    <option>Seleccionar oferta aceptada</option>
                                    <option value="111">111</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p><a href="ofertes.php"><i class="mdi mdi-plus mr-1"></i> Nueva oferta</a></p>                    
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
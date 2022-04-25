<!-- AÑADIR CÁPSULA -->
<div id="addCapsule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Añadir cápsula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if(isset($_GET['deviceKey'])){
                $inputKey='value="'.$_GET['deviceKey'].'"';
            }else{
                $inputKey='placeholder="Ex. mesural_0000"';
            }
            ?>

            <form method="post" action="conexiones/capsule.php?action=addCapsule" >
                <input type="hidden" name="userID" value="<?php echo $id;?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Device Key</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" <?php echo $inputKey;?> name="deviceKey">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Personalizar nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ex. proyectoX-000" name="deviceName">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ex. Primera planta" name="devicePlace">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Funcionalidad</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ex. Deformaciones por viento" name="deviceUse">
                                </div>
                            </div>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>
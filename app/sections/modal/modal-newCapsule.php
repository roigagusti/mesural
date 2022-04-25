<?php
$deviceKeys = $database->select('capsuleInfo','deviceKey');

function randomKey(){
    $characters = 'bcdfghjklmnpqrstvwxyz';
    $voyels = 'aeiou';
    $a = '';
    $b = '';

    do{
        for ($i = 0; $i < 3; $i++){
            $a .= $characters[rand(0, 20)];
            $b .= $voyels[rand(0, 4)];
        }
        $randomKey = $a[0].$b[0].$a[1].$b[1].$a[2].$b[2];
    }while(in_array($randomKey,$deviceKeys,true));
    
    return $randomKey;
}
?>

<!-- NUEVA CÁPSULA -->
<div id="newCapsule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Crear cápsula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="conexiones/capsule.php?action=newCapsule" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Device Key</label>
                                <div class="input-group">
                                    <input type="text" class="form-control disabled" value="<?php echo randomKey();?>" name="deviceKey" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Tipo de cápsula</label>
                                <select class="form-control" name="deviceType" required>
                                    <option value="3">Lep. Humedad</option>
                                    <option value="1">Bos. Tensión</option>
                                    <option value="2">Quar. Deformación</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Frecuencia de envio</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Ex. 5 minutos" name="deviceFrequency" min="1" max="60" required>
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
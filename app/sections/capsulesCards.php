<?php 
$lep = $database->select('capsuleProperty', [
        '[<]capsuleInfo' => ['deviceID' => 'id']
    ],
    [
        'capsuleProperty.id',
        'capsuleProperty.userID',
        'capsuleProperty.deviceID',
        'capsuleProperty.deviceName',
        'capsuleProperty.devicePlace',
        'capsuleProperty.deviceUse',
        'capsuleProperty.createDate',
        'capsuleInfo.deviceType',
        'capsuleInfo.deviceKey'
    ],["AND"=>["capsuleProperty.userID"=>$id,'capsuleInfo.deviceType'=>3],"ORDER"=>["capsuleProperty.createDate"=>"ASC"]]
);

if(count($lep)>0){
    echo '<div class="row">';
    foreach($lep as $capsula) {
        if($capsula['deviceName']==""){
            $capsulaName = $database->get("capsuleInfo","deviceKey",["id"=>$capsula['deviceID']]);
        }else{
            $capsulaName = $capsula['deviceName'];
        }
        $frequency = $database->get("capsuleInfo","frequency",["id"=>$capsula['deviceID']]);
    ?>
        <div class="col-md-6 col-xl-3">
            <a href="capsule-detail.php?id=<?php echo $capsula['deviceID'];?>">
                <div class="card">
                    <div class="card-body">

                        <?php
                        $temp = $database->get('capsuleValues_lep','temperature',['deviceID'=>$capsula['deviceID'],"ORDER"=>["createDate"=>"DESC"]]);
                        $hum = $database->get('capsuleValues_lep','humidity',['deviceID'=>$capsula['deviceID'],"ORDER"=>["createDate"=>"DESC"]]);
                        $date = $database->get("capsuleValues_lep", "createDate", ["deviceID"=>$capsula['deviceID'],"ORDER"=>["createDate"=>"DESC"]]);
                        $capsulaFrequency = ($frequency+30)*60;
                        
                        if(strlen($temp)<1){$temp=0.0;}
                        if(strlen($hum)<1){$hum=0.0;}
                        if(strlen($date)<1){$date="no hay datos";}

                        $timeLastTemp = time()-strtotime($date);
                        if($timeLastTemp > $capsulaFrequency){
                            $battery = '<span style="color:#ddd;"><i class="fas fa-circle"></i></span>';
                        }else{
                            $battery = '<span style="color:rgb(192,227,181);"><i class="fas fa-circle"></i></span>';
                        }
                        ?>

                        <div class="text-center">
                            <div class="dropdown float-right">
                                <?php echo $battery;?>
                            </div>
                        </div>
                        <h4 class=""><span class="text-info"><?php echo $temp;?> º</span></h4>
                        <p class="text-muted mb-0"><?php echo $capsulaName;?></p>
                        <div class="row">
                            <div class="col-md-11">
                                <p class="text-muted mt-3 mb-0"><?php echo $hum."% de humedad";?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- EDITAR CÁPSULA -->
        <div id="editCapsule<?php echo $capsula['deviceID'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Editar cápsula</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                    $deviceKey = $database->get("capsuleInfo","deviceKey",["id"=>$capsula['deviceID']]);
                    $deviceName = $database->get("capsuleProperty","deviceName",["deviceID"=>$capsula['deviceID']]);
                    $devicePlace = $database->get("capsuleProperty","devicePlace",["deviceID"=>$capsula['deviceID']]);
                    $deviceUse = $database->get("capsuleProperty","deviceUse",["deviceID"=>$capsula['deviceID']]);
                    ?>

                    <form method="post" action="conexiones/capsule.php?action=editCapsule" >
                        <input type="hidden" name="deviceID" value="<?php echo $capsula['deviceID'];?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Device Key</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control disabled" value="<?php echo $deviceKey;?>" name="deviceKey" readonly style="color:#999">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Personalizar nombre</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $deviceName;?>" name="deviceName">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Ubicación</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $devicePlace;?>" name="devicePlace">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Funcionalidad</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $deviceUse;?>" name="deviceUse">
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ELIMINAR CÁPSULA -->
        <div id="removeCapsule<?php echo $capsula['deviceID'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Confirmar borrado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="post" action="conexiones/capsule.php?action=removeCapsule&id=<?php echo $capsula['deviceID'];?>" >
                        <div class="modal-body">
                            <p>Los datos no se borrarán y la cápsula podrá ser añadida de nuevo.<br>¿Estás seguro que quieres borrar esta cápsula?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Borrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>
    </div>

<?php }else{ ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="full-icon center">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="-5 0 24 24">
                            <path d="M4.35,23.93c-1.3,0-2.35-0.36-3.15-1.07C0.4,22.14,0,21.1,0,19.76c0-1.45,0.48-2.53,1.42-3.23s2.38-1.14,4.3-1.33
                        c0.26-0.03,0.55-0.07,0.85-0.1c0.31-0.03,0.65-0.07,1.03-0.1s0.68-0.06,0.9-0.09v-0.74c0-0.85-0.2-1.46-0.59-1.85
                        c-0.39-0.39-0.98-0.58-1.78-0.58c-1.14,0-2.54,0.32-4.21,0.95c-0.01-0.03-0.15-0.41-0.42-1.16c-0.27-0.75-0.41-1.13-0.42-1.14
                        c1.65-0.7,3.43-1.06,5.34-1.06c1.88,0,3.25,0.41,4.11,1.23c0.86,0.82,1.29,2.14,1.29,3.98v9.12H9.36c-0.01-0.03-0.1-0.32-0.28-0.85
                        c-0.18-0.53-0.27-0.82-0.27-0.85c-0.7,0.68-1.38,1.18-2.04,1.49C6.11,23.77,5.3,23.93,4.35,23.93z M5.25,21.56
                        c0.77,0,1.44-0.18,2.02-0.55c0.57-0.37,0.98-0.82,1.23-1.34v-2.7c-0.03,0-0.25,0.02-0.67,0.05c-0.42,0.03-0.65,0.05-0.68,0.05
                        c-1.35,0.12-2.34,0.37-2.96,0.76c-0.63,0.39-0.94,1.02-0.94,1.88c0,0.59,0.17,1.05,0.52,1.37C4.11,21.4,4.61,21.56,5.25,21.56z
                        M9.67,3.08C9.67,1.38,8.29,0,6.59,0S3.51,1.38,3.51,3.08c0,1.7,1.38,3.08,3.08,3.08S9.67,4.78,9.67,3.08z" />
                        </svg>
                        <h1>Bienvenido a tu panel de Mesural</h1>
                        <h2>Aquí enconrarás todos los paneles para controlar tus cápsulas</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
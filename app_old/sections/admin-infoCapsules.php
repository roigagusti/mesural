<?php $infoCapsula = $database->get("capsuleInfo",["id","number","create_date"],["id"=>$_GET['id']]);?>
<form class="form-account-settings" action="conexiones/update-capsule.php?action=edit" method="post">
<div class="item-setting">
    <label for="name">Código de cápsula</label>
    <input type="text" name="capsuleNumber" class="disabled" value="<?php echo $infoCapsula['number'];?>">
  </div>
  <div class="item-setting">
    <label for="corporation">Fecha de creación</label>
    <input type="text" name="customName" class="disabled" value="<?php echo date("d.m.Y H:m",strtotime($infoCapsula['create_date']));?>">
  </div>
</div>
</form>

<!-- Propietat de la càpsula per usuaris -->
<?php $propietatsCapsules = $database->select("capsuleProperty",["id","userid","capsuleNumber","nom","create_date"],["capsuleNumber"=>$infoCapsula['number']]);?>
  <div class="body-box">
    <h3>Usuaris propietaris</h3>
    <?php if(count($propietatsCapsules)>0){?>
    <table class="table-capsules">
      <tr>
        <th class="id">User ID</th>
        <th class="name">Email</th>
        <th class="name">Custom name</th>
        <th class="last-value">Create date</th>
      </tr>
      <?php foreach ($propietatsCapsules as $propietat){
        if($propietat['nom']==""){$customName = "-";}else{$customName=$propietat['nom'];}?>
        <tr class="hover">
          <td class="id"><?php echo $propietat['userid'];?></td>
          <td class="name"><?php echo $database->get("users","email",["id"=>$propietat['userid']]);?></td>
          <td class="name"><?php echo $customName;?></td>
          <td class="last-value"><?php echo $propietat['create_date'];?></td>
        </tr>
      <?php } ?>
    </table>
  <?php }else{
    echo "Cap usuari és propietari d'aquest càpsula";
  }?>
  </div>

<!-- Dades de la càpsula -->
<?php
if(isset($_GET['load-more'])){$limit=$_GET['load-more'];}else{$limit=10;}
$dataCapsules = $database->select("capsuleValues",["capsuleid","datetime","value","voltatge","capsule_date"],["capsuleid"=>$infoCapsula['number'],"LIMIT"=>$limit, "ORDER"=>["datetime"=>"DESC"]]);
if(count($dataCapsules)>0){?>
  <div class="body-box">
    <h3>Dades de les càpsules</h3>
    <table class="table-capsules">
      <tr>
        <th class="last-value">Sent time</th>
        <th class="last-value">Received time</th>
        <th class="name">Value</th>
        <th class="last-value">Voltage</th>
      </tr>
      <?php foreach ($dataCapsules as $data){?>
        <tr class="hover">
          <td class="last-value"><?php echo $data['capsule_date'];?></td>
          <td class="last-value"><?php echo $data['datetime'];?></td>
          <td class="name"><?php echo $data['value']." N/mm<sup>2</sup>";?></td>
          <td class="last-value"><?php echo $data['voltatge'];?></td>
        </tr>
      <?php } ?>
    </table>
    <form action="admin.php" method="get">
      <div class="item-setting">
        <input type="hidden" name="action" value="capsule-info">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <button class="btn-save btn-save-spec" type="submit">Cargar</button>
        <input type="text" name="load-more" class="input-settings" value="<?php echo $limit;?>" style="margin-left:0;width:100px">
      </div>
    </form>

    
  </div>
  <div class="footer-box save-section">
    <a href="/admin.php" class="btn-cancel"><div>Volver</div></a>
  </div>
<?php }?>
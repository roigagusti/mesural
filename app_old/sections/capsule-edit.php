<?php
$capsulaNumber = $database->get("capsuleInfo","number",["id"=>$_GET['id']]);
$capsula = $database->get("capsuleProperty",["id","userid","capsuleNumber","nom"],["AND" => ["capsuleNumber"=>$capsulaNumber,"userid"=>$id]]);
?>
<div class="db-box box-shadow capsule-list">
	<div class="simple-title border-bottom"><h2>Editar cápsula</h2></div>
	<div class="body-box grey">
	<form class="form-account-settings" action="conexiones/update-capsule.php?action=edit" method="post">
		<div class="item-setting">
	    	<label for="name">Código de cápsula</label>
	    	<input type="text" name="capsuleNumber" class="disabled" value="<?php echo $capsula['capsuleNumber'];?>">
	  	</div>
	  	<div class="item-setting">
	    	<label for="corporation">Personalizar nombre</label>
	    	<input type="text" name="customName" class="input-settings" value="<?php echo $capsula['nom'];?>">
	  	</div>
	  	<input type="hidden" name="propertyId" value="<?php echo $capsula['id'];?>">

	</div>
	<div class="footer-box save-section">
		<a href="/capsules.php" class="btn-cancel"><div>Cancelar</div></a>
		<button class="btn-save btn-save-spec disabled" type="submit">Guardar</button>
	</div>
	</form>
</div>
<div class="db-box box-shadow">
  <div class="simple-title border-bottom">
    <h2>Tu cápsula</h2>
    Si eliminas tu cápsula, perderás el acceso a tus datos. Para recuperarlos simplemente debes volver a añadir la cápsula con su código original.
  </div>
  <div class="footer-box save-section">
    <form action="conexiones/update-capsule.php?action=delete" method="post">
		<input type="hidden" name="propertyId" value="<?php echo $capsula['id'];?>">
      	<button class="btn-save btn-save-spec" type="submit">Eliminar cápsula</button>
    </form>
  </div>
</div>
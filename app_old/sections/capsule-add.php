<div class="db-box box-shadow capsule-list">
	<div class="simple-title border-bottom"><h2>Añadir cápsula</h2></div>
		<div class="body-box grey">
		<form class="form-account-settings" action="conexiones/update-capsule.php?action=add" method="post">
			<div class="item-setting">
		    	<label for="name">Código de cápsula</label>
		    	<input type="text" name="capsuleNumber" class="input-settings" placeholder="Ex. mesural_0000">
		  	</div>
		  	<div class="item-setting">
		    	<label for="corporation">Personalizar nombre</label>
		    	<input type="text" name="customName" placeholder="Cápsula en primera planta">
		  	</div>
		  	<input type="hidden" name="userId" value="<?php echo $id;?>">

		</div>
		<div class="footer-box save-section">
			<a href="/capsules.php" class="btn-cancel"><div>Cancelar</div></a>
			<button class="btn-save btn-save-spec disabled" type="submit">Guardar</button>
		</div>
		</form>
</div>
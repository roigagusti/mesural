<form class="form-account-settings" action="conexiones/update-capsule.php?action=admin-add" method="post">
	<div class="item-setting">
	    <label for="capsuleNumber">Código de cápsula</label>
	    <input type="text" name="capsuleNumber" class="input-settings" placeholder="Ex. mesural_0000">
	</div>
	<div class="item-setting">
	    <label for="dateCreation">Fecha de creación</label>
	    <input type="text" name="dateCreation" class="disabled" value="<?php echo date('d.m.Y H:m');?>">
	</div>
</div>
<div class="footer-box save-section">
	<a href="/admin.php" class="btn-cancel"><div>Volver</div></a>
	<button class="btn-save btn-save-spec disabled" type="submit">Create</button>
</div>
</form>
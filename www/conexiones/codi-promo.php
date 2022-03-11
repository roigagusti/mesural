<?php
require('conexion.php');

if(isset($_GET['code'])){
	$codiPromo = $_GET['code'];
}else{
	$codiPromo = $_POST['codi-promo'];
	$lang = $_GET['lang'];
}

if($database->has("codi-promo", ["codigo" => $codiPromo])){
	$fechaActual = date("Y-m-d H:m:s");
	$fechaLimite = $database->get("codi-promo","fecha_limite",["codigo" => $codiPromo]);
	$descuento = $database->get("codi-promo","descuento",["codigo" => $codiPromo]);
	$uso = $database->get("codi-promo","uso",["codigo" => $codiPromo]);
	$used = $database->get("codi-promo","utilizado",["codigo" => $codiPromo]);

	if($fechaActual<$fechaLimite){
		if($uso == "unico" and $used>0){
			header('Location:https://www.mesural.com/buy-capsule.php?lang='.$lang.'&event=used');
		}else{
			header('Location:https://www.mesural.com/buy-capsule.php?lang='.$lang.'&event=success&code='.$codiPromo);
		}

	}else{
		header('Location:https://www.mesural.com/buy-capsule.php?lang='.$lang.'&event=expired');
	}

}else{
	header('Location:https://www.mesural.com/buy-capsule.php?lang='.$lang.'&event=fail-code');
}
?>
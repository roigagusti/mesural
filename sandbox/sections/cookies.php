<link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>
	<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
	<?php if($lang!="es"){ ?>
	<script>window.addEventListener("load", function(){window.wpcc.init({"border":"thin","corners":"small","colors":{"popup":{"background":"#ffe4e1","text":"#000000","border":"#ffe4e1"},"button":{"background":"#a00000","text":"#ffffff"}},"position":"bottom-right","transparency":"20","fontsize":"small","content":{"href":"cookies-policy.php"}})});
	</script>
	<?php }else{ ?>
	<script>window.addEventListener("load", function(){window.wpcc.init({"border":"thin","corners":"small","colors":{"popup":{"background":"#ffe4e1","text":"#000000","border":"#ffe4e1"},"button":{"background":"#a00000","text":"#ffffff"}},"position":"bottom-right","transparency":"20","fontsize":"small","content":{"message":"Este sitio web usa Cookies para mejorar y optimizar la experiencia del usuario.","link":"Leer más","button":"Aceptar","href":"cookies-policy.php"}})});
	</script>
	<?php } ?>
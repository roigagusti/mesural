<?php session_start();
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
require('conexiones/conexion.php');
//Verificar si hi ha sessió iniciada i agafar les dades (id, nom i email) de l'usuari pertinent de la BBDD "users"
if(isset($_SESSION['user_name'])) {
  $id = $database->get("users","id",["email"=>$_SESSION['user_name']]);
  $userEmail = $_SESSION['user_name'];
  $userName = $database->get("users","nom",["id"=>$id]);
  $userCorporation = $database->get("users","corporation",["id"=>$id]);
  $accountType = $database->get("users","type",["id"=>$id]);
//Si no hi ha sessió redirigir a Login
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural. Ajustes</title>
  <link rel="shortcut icon" href="img/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
  <link rel="manifest" href="img/favicons/site.webmanifest">

  <!-- CSS basics -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
	<!-- CSS custom -->
  <?php if($_GET['test']=='on'){echo '<link rel="stylesheet" type="text/css" href="css/style_vermell.css" media="screen">';}else{echo '<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">';}?>
  <!--<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">-->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
</head>

<body>
  <div class="db-world">
    <div class="db-content">
      <div class="nav-lateral main-menu">
        <?php include("sections/nav-lateral.php"); ?>
      </div>
      <div class="main-content">
        <?php include("sections/content-header.php"); ?>

        <div class="db-box box-shadow">
          <div class="simple-title border-bottom"><h2>Configuración de la cuenta</h2></div>
          <div class="body-box grey">
            <form class="form-account-settings" action="conexiones/update-settings.php?action=personal" method="post">
              <div class="item-setting">
                <label for="name">Nombre completo</label>
                <input type="text" name="name" class="input-settings" value="<?php echo $userName;?>">
              </div>
              <div class="item-setting">
                <label for="corporation">Empresa</label>
                <input type="text" name="corporation" class="input-settings" value="<?php echo $userCorporation;?>">
              </div>
              <div class="item-setting">
                <label for="email">Email</label>
                <input type="email" name="email" class="disabled" value="<?php echo $userEmail;?>">
              </div>
              <div class="item-setting">
                <label for="language">Idioma</label>
                <select name="language" class="input-settings">
                  <option value="español" selected>Español</option>
                  <option value="english">English</option>
                </select>
              </div>
              <div class="item-setting">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="input-settings" placeholder="******">
              </div>
              <div class="item-setting">
                <label for="password">Confirmar contraseña</label>
                <input type="password" name="re-password" class="input-settings" placeholder="******">
              </div>

          </div>
          <div class="footer-box save-section">
            <a href="/settings.php" class="btn-cancel disabled"><div>Cancelar</div></a>
            <button class="btn-save btn-save-spec disabled" type="submit">Guardar</button>
          </div>
            </form>
        </div>
        <div class="db-box box-shadow">
          <div class="simple-title border-bottom">
            <h2>Tu cuenta</h2>
            Si cierras tu cuenta, perderás el acceso a tus datos, y caducarán tus claves. Esta operación es irreversible.
          </div>
          <div class="footer-box save-section">
            <form action="conexiones/update-settings.php?action=delete-account" method="post">
              <input type="hidden" name="user" value="<?php echo $id;?>">
              <button class="btn-save btn-save-spec" type="submit">Cerrar cuenta</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- JavaScripts basics -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->
</body>
</html>

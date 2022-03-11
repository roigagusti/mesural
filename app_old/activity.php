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
  <title>Mesural. Actividad</title>
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
  <!-- CSS datepicker -->
</head>

<body>
  <div class="db-world">
    <div class="db-content">
      <div class="nav-lateral main-menu">
        <?php include("sections/nav-lateral.php"); ?>
      </div>
      <div class="main-content">
        <?php include("sections/content-header.php"); ?>

        <?php
        //Si hi es demana carregar més es carrega el número de files que es demanen, per defecte 10.
        if(isset($_GET['load-more'])){
          $limit=$_GET['load-more'];
        }else{
          $limit=10;
        }
        //Si no hi ha id de capsula a carregar activitat es carrega la primera de l'usuari, sinó pantalla en blanc.
        if(isset($_GET['id'])){
          $capsuleId=$_GET['id'];
          $capsuleNumber = $database->get("capsuleInfo","number",["id"=>$capsuleId]);
          $capsuleName = $database->get("capsuleProperty","nom",["capsuleNumber"=>$capsuleNumber]);
          if($capsuleName==""){$capsuleName = str_replace("mesural_","Mesural ",$capsuleNumber);}
        }else{
          $capsuleProperty = $database->get("capsuleProperty",["capsuleNumber","nom"],["userid"=>$id,"ORDER"=>["create_date"=>"DESC"]]);
          
          $capsuleNumber = $capsuleProperty['capsuleNumber'];
          $capsuleId=$database->get("capsuleInfo","id",["number"=>$capsuleNumber]);
          $capsuleName = $capsuleProperty['nom'];
          if($capsuleName==""){$capsuleName = str_replace("mesural_","Mesural ",$capsuleNumber);}
        }
        
        $dataCapsules = $database->select("capsuleValues",["capsuleid","datetime","value","temperature","humidity","voltatge","capsule_date"],["capsuleid"=>$capsuleNumber,"LIMIT"=>$limit, "ORDER"=>["datetime"=>"DESC"]]);
        ?>
        <div class="db-box box-shadow capsule-list">
          <div class="title">
            <div class="title-value"><h1>Actividad<?php echo ". ".$capsuleName;?></h1></div>
            <div class="table-header-buttons">
              <a href="#" class="btn-filter">
                <div><svg class="filter-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/>
        </svg> Time filter</div></a>
            </div>
          </div>

          <div class="body-box">
            <?php if(count($dataCapsules)>0){ ?>
            <table class="table-capsules">
              <tr>
                <th class="last-value">Sent time</th>
                <th class="last-value">Received time</th>
                <th class="name">Value</th>
                <th class="last-value">Temperature</th>
                <th class="last-value">Humidity</th>
                <th class="last-value right">Voltage</th>
              </tr>

              <?php foreach ($dataCapsules as $data){?>
              <tr class="hover">
                <td class="last-value"><?php echo $data['capsule_date'];?></td>
                <td class="last-value"><?php echo $data['datetime'];?></td>
                <td class="name center"><?php echo number_format($data['value'], 2)." N/mm<sup>2</sup>";?></td>
                <td class="last center"><?php if($data['temperature']==""){echo "-";}else{echo number_format($data['temperature'], 2)." ºC";}?></td>
                <td class="last center"><?php if($data['humidity']==""){echo "-";}else{echo number_format($data['humidity'], 2)." %";}?></td>
                <td class="last-value right"><?php echo number_format($data['voltatge'],2)." V";?></td>
              </tr>
              <?php } ?>
            </table>
          
            <form action="activity.php" method="get">
              <div class="item-setting">
                <input type="hidden" name="action" value="capsule-info">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <button class="btn-save btn-save-spec" type="submit">Cargar</button>
                <input type="text" name="load-more" class="input-settings" value="<?php echo $limit;?>" style="margin-left:0;width:100px">
              </div>
            </form>
            <?php } ?>
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

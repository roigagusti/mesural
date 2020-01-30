<div class="lateral">
  <ul class="navegador">
    <li>
      <a href="#">
        <i class="fa fa-home"></i>
        <span class="nav-title">Home</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-file"></i>
        <span class="nav-title">Import</span>
      </a>
    </li>
    <?php 
    $url = explode(".",$_SERVER['SCRIPT_NAME']);
    $name = explode("/",$url[0]);
    if($name[1] == "admin"){
    ?>
    <li>
      <a href="#">
        <i class="fa fa-code"></i>
        <span class="nav-title">Admin</span>
      </a>
    </li>
    <?php } ?>
    <li>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="nav-title">Settings</span>
      </a>
    </li>
    <li>
      <a href="conexiones/logout.php?lang=<?php echo $text['lang']; ?>">
        <i class="fa fa-power-off"></i>
        <span class="nav-title">Logout</span>
      </a>
    </li>
  </ul>
</div>
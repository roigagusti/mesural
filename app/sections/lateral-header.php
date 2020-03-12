<div class="lateral col-lg-2 col-xs-3">
  <div class="lateral-logo">
    <a href="https://app.mesural.com" alt="Mesural">
      <img alt="Mesural Logo" title="Mesural Logo"  src="img/logo-light.png" />
    </a>
  </div>
  <div class="profile">
    <!--<img alt="Profile image" title="Profile image"  src="img/profile.jpg" />-->
    <span class="initials"><?php if(strpos($usernom, " ")){echo strtoupper(substr(explode(" ",$usernom)[0],0,1).substr(explode(" ",$usernom)[1],0,1));}else{echo strtoupper(substr($usernom,0,2));} ?></span>
    <div class="profile-name"><?php echo ucfirst($usernom); ?><i class="fa fa-chevron-down dropdown-arrow"></i></div>
  </div>
  <ul class="navegador">
    <?php if(explode(".php",$_SERVER['REQUEST_URI'])[0] == "/index"){echo '<li class="active">';}else{echo '<li>';} ?>
      <a href="index.php">
        <span class="nav-title">Control center</span>
      </a>
    </li>
    <?php if(explode(".php",$_SERVER['REQUEST_URI'])[0] == "/import"){echo '<li class="active">';}else{echo '<li>';} ?>
      <a href="import.php">
        <span class="nav-title">Data import</span>
      </a>
    </li>
    <?php if(explode(".php",$_SERVER['REQUEST_URI'])[0] == "/settings"){echo '<li class="active">';}else{echo '<li>';} ?>
      <a href="settings.php">
        <span class="nav-title">Settings</span>
      </a>
    </li>
    <li>
      <a href="conexiones/logout.php?lang=<?php echo $text['lang']; ?>">
        <span class="nav-title">Logout</span>
      </a>
    </li>
  </ul>
  <div class="navegador-footer">
    <a href="mailto:info@mesural.com?subject=App Support&body=Write your question here. We'll be happy to help you">Help & Support</a>
  </div>
</div>

<!-- Barra versió mòbil -->
<div class="lateral-header-mobile">
  <div class="mobile-logo">
    <a href="https://app.mesural.com" alt="Mesural">
      <img alt="Mesural Logo" title="Mesural Logo"  src="img/logo-dark.png" />
    </a>
  </div>
  <div class="mobile-bars"><i class="fa fa-bars"></i></div>
  <!--<div class="mobile-profile">
    <span class="initials"><?php if(strpos($usernom, " ")){echo strtoupper(substr(explode(" ",$usernom)[0],0,1).substr(explode(" ",$usernom)[1],0,1));}else{echo strtoupper(substr($usernom,0,2));} ?></span>
    <div class="profile-name"><?php echo ucfirst($usernom); ?><i class="fa fa-chevron-down dropdown-arrow"></i></div>
  </div>-->
</div>
<div class="lateral-footer-mobile">
  <ul class="navegador-mobile"><?php if(explode(".php",$_SERVER['REQUEST_URI'])[0] == "/index"){echo '<li class="col-xs-4 active">';}else{echo '<li class="col-xs-4">';} ?>
      <a href="index.php">
        <span class="nav-title">Dashboard</span>
      </a>
    </li>
    <?php if(explode(".php",$_SERVER['REQUEST_URI'])[0] == "/import"){echo '<li class="col-xs-4 active">';}else{echo '<li class="col-xs-4">';} ?>
      <a href="import.php">
        <span class="nav-title">Import</span>
      </a>
    </li>
    <?php if(explode(".php",$_SERVER['REQUEST_URI'])[0] == "/settings"){echo '<li class="col-xs-4 active">';}else{echo '<li class="col-xs-4">';} ?>
      <a href="settings.php">
        <span class="nav-title">Settings</span>
      </a>
    </li>
    <!--<li class="col-xs-3">
      <a href="conexiones/logout.php?lang=<?php echo $text['lang']; ?>">
        <span class="nav-title">Logout</span>
      </a>
    </li>-->
</div>
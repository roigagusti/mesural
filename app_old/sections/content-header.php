<div class="content-header">
  <div class="responsive-menu">
  	<a href="javascript:activeResponsiveMenu()">
  		<svg viewBox="0 0 448 512" stroke-width="2" focusable="false" aria-hidden="true" role="presentation" stroke-linecap="round" stroke-linejoin="round"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg>
  	</a>
  </div>
  <div class="user-welcome">
  	<a href="conexiones/logout.php">Cerrar sesión de <span><?php echo $userName;?></span></a>
  </div>
</div>
<div class="responsive-blur hidden"></div>
<div class="responsive-nav hidden">
  <div class="responsive-menu">
    <a href="javascript:disactiveResponsiveMenu()">
  		<svg style="margin-top:25px;" viewBox="0 0 320 512" stroke-width="2" focusable="false" aria-hidden="true" role="presentation" stroke-linecap="round" stroke-linejoin="round"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg>
  	</a>
  </div>

  <div class="nav-lateral">
    <?php include("sections/nav-lateral.php"); ?>
  </div>
</div>
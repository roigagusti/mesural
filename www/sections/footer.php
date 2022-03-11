<div class="col-md-12 footer">
  <div class="col-md-offset-2 col-md-8">
    <div class="col-md-offset-2 col-md-2">
      <a href="//www.mesural.com" hreflang="<?php echo $text['Lang']; ?>"><img class="logo logo-footer" alt="Mesural Logo" title="Mesural Logo"  src="https://www.mesural.com/img/logo-dark.png" /></a>
    </div>
    <ul class="col-md-2">
      <li class="footer-titol"><a><?php echo $text['Address']; ?></a></li>
      <li><?php echo $text['Direccio']; ?></li>
      <li>08018 Barcelona</li>
      <li>
        <script>
          enlace_correo()
        </script><?php echo $text['Contact us']; ?></a>
      </li>
    </ul>
    <ul class="col-md-2">
      <li class="footer-titol"><a><?php echo $text['About Us']; ?></a></li>
      <li><a href="https://twitter.com/share?text=<?php echo $text['Tweet']; ?>&url=https://www.mesural.com&hashtags=mesural" data-lang="<?php echo $text['Lang']; ?>" data-show-count="false" hreflang="<?php echo $text['Lang']; ?>" target="_blank"><?php echo $text['Spread the word']; ?></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script><li>
      <li><a href="legal.php" hreflang="<?php echo $text['Lang']; ?>"><?php echo $text['Terms of use']; ?></a></li>
      <li><a href="cookies-policy.php" hreflang="<?php echo $text['Lang']; ?>"><?php echo $text['Cookies policy']; ?></a></li>
      <li><a href="//twitter.com/mesuralstartup" target="_blank" hreflang="<?php echo $text['Lang']; ?>"><?php echo $text['Mesural on Twitter']; ?></a></li>
      <li><a href="//www.facebook.com/mesuralstartup" target="_blank" hreflang="<?php echo $text['Lang']; ?>"><?php echo $text['Mesural on Facebook']; ?></a></li>
    </ul>
    <ul class="col-md-3">
      <li class="footer-titol"><a><?php echo $text['News']; ?></a></li>
      <li><a><?php echo date('F jS',mktime(0,0,0,date('m'),date('d')-12,date('Y'))).": ".$text['We are already here']; ?></a><span class="footer-message"><?php echo $text['The building monitoring is now really']; ?></span></li>
      <li><a><?php echo date('F jS',mktime(0,0,0,date('m'),date('d')-8,date('Y'))).": ".$text['Working hard night and day']; ?></a><span class="footer-message"><?php echo $text['Hopefull our team is great']; ?></span></li>
      <li><a><?php echo date('F jS',mktime(0,0,0,date('m'),date('d')-3,date('Y'))).": ".$text['Server tests are unbelievable']; ?></a><span class="footer-message"><?php echo $text["It's gonna be amazing, will you be here?"]; ?></span></li>
    </ul>
  </div>
  <div class="copyright col-md-12">
    Copyright &copy <?php echo date("Y");?> Mesural
  </div>
</div>
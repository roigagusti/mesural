<table class="table-capsules">
  <tr>
    <th class="id">Id</th>
    <th class="name">Campaign</th>
    <th class="last-value">Limit date</th>
    <th class="last-value">Discount</th>
    <th class="last-value">Use</th>
    <th class="name">Code</th>
    <th class="id">Used</th>
  </tr>

  <?php 
  $cps = $database->select("codi-promo",["id","campain","fecha_limite","descuento","uso","codigo","utilizado"]);
  foreach ($cps as $cp){
    $urlCP="admin.php?action=capsule-info&id=".$cp['id'];?>
    <tr class="hover">
      <td class="id"><a href="<?php echo $urlCP;?>"><?php echo $cp['id'];?></a></td>
      <td class="name"><a href="<?php echo $urlCP;?>"><?php echo $cp['campain'];?></a></td>
      <td class="last-value"><a href="<?php echo $urlCP;?>"><?php echo date("d.m.Y H:m",strtotime($cp['fecha_limite']));?></a></td>
      <td class="last-value"><a href="<?php echo $urlCP;?>"><?php echo $cp['descuento'];?></a></td>
      <td class="last-value"><a href="<?php echo $urlCP;?>"><?php echo $cp['uso'];?></a></td>
      <td class="name"><a href="<?php echo $urlCP;?>"><?php echo $cp['codigo'];?></a></td>
      <td class="id"><a href="<?php echo $urlCP;?>"><?php echo $cp['utilizado'];?></a></td>
    </tr>
  <?php } ?>
</table>
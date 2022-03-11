<?php session_start();
require('../conexiones/conexion.php'); ?>

<style>
.deviceStatus{
  width:15px;height:15px;position:absolute;display:inline;border:none;border-radius:50%;margin-left:10px;margin-top:3px;background-color:#d9d9d9
}
.deviceStatus .active{
  background-color:#73bf73;
}
</style>

<div class="title">
  <div class="title-value"><h1>I+D</h1></div>
</div>

<?php
$capsules = ["ac:67:b2:06:4f:98","ac:67:b2:06:3d:34","ac:67:b2:08:15:b4","ac:67:b2:05:da:f8","ac:67:b2:04:1e:68"];
foreach ($capsules as $capsula){
  $dataCapsules = $database->select("spaceM",["datetime","setupTime","sendMac","sendTime","receiveMac","receiveTime"],["receiveMac"=>$capsula,"ORDER"=>["datetime"=>"DESC"],"LIMIT"=>10]);
?>
  <div class="body-box">
    <h3><?php echo "Node ".$capsula;?> <div class="deviceStatus" style=""></div></h3>
    <?php if($database->has("spaceM",["receiveMac"=>$capsula])){ ?>
    <table class="table-capsules">
      <tr>
        <th class="last-value">Server Time</th>
        <th class="last-value">Sent MAC</th>
        <th class="last-value">Setup Time</th>
        <th class="last-value">Sent Time</th>
        <th class="last-value">Received Time</th>
        <th class="last-value">Delay</th>
      </tr>

      <?php foreach ($dataCapsules as $data){
        $delay = date_diff(date_create($data['sendTime']),date_create($data['receiveTime']));
        $c = strtotime(date("Y-m-d H:i:s"))-strtotime($data['datetime']);
      ?>
      <tr class="hover <?php if($c<90){echo 'resaltat';}?>">
        <td class="last-value"><?php echo $data['datetime'];?></td>
        <td class="last-value"><?php echo $data['sendMac'];?></td>
        <td class="last-value"><?php echo $data['setupTime']." ns";?></td>
        <td class="last-value"><?php echo substr_replace($data['sendTime'],' ',10,0);?></td>
        <td class="last-value"><?php echo substr_replace($data['receiveTime'],' ',10,0);?></td>
        <td class="last-value"><?php echo $delay->format('%s000 ms'); ?></td>
      </tr>
      <?php } ?>
    </table>
    <?php }else{echo '<div class="empty-table">No hay datos disponibles para el node '.$capsula.'.</div>';} ?>
  </div>
  <?php } ?>
<!-- TAULA CapsuleInfo -->
<?php if(!isset($_GET['tab'])){?>
  <table class="table-capsules">
    <tr>
      <th class="id">Id</th>
      <th class="name">Number</th>
      <th class="last-value">Create date</th>
    </tr>

    <?php 
    $cis = $database->select("capsuleInfo",["id","number","create_date"]);
    foreach ($cis as $ci){
      $urlInfo="admin.php?action=capsule-info&id=".$ci['id'];?>
      <tr class="hover">
        <td class="id"><a href="<?php echo $urlInfo;?>"><?php echo $ci['id'];?></a></td>
        <td class="name"><a href="<?php echo $urlInfo;?>"><?php echo $ci['number'];?></a></td>
        <td class="last-value"><a href="<?php echo $urlInfo;?>"><?php echo $ci['create_date'];?></a></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>
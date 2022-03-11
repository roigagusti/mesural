<div class="db-box box-shadow capsule-list">
	<div class="title">
		<div class="title-value"><h1>Cápsulas</h1></div>
		<div class="table-header-buttons">
			<a href="capsules.php?action=add" class="btn-add"><div>+ Add capsule</div></a>
		</div>
	</div>
	<div class="body-box">
		<table class="table-capsules">
			<tr>
				<th class="id"></th>
				<th class="name left">Nombre</th>
				<th class="last-value">Último valor</th>
				<th class="status">Actualizado</th>
				<th class="edit"></th>
			</tr>

			<?php foreach ($capsules as $capsula){if($capsula['nom']==""){
				$nom="Mesural Capsule";}else{$nom=$capsula['nom'];}
				$capsulaNumber = $capsula['capsuleNumber'];
				$capsulaId = $database->get("capsuleInfo","id",["number"=>$capsulaNumber]);
				$lastValue = $database->get("capsuleValues",["id","value","datetime"],["capsuleid"=>$capsulaNumber,"ORDER"=>["datetime"=>"DESC"]]);
				
				$activityUrl= "activity.php?id=".$capsulaId;
				$editUrl= "capsules.php?action=edit&id=".$capsulaId;?>
			<tr class="hover">
				<td class="id"><a href="<?php echo $activityUrl;?>"><div data-test="product_image" class="Box-root" style="background-image: url(&quot;img/capsule.png&quot;); background-size: contain; background-repeat: no-repeat; width: 40px; height: 40px; border-radius: 4px;"></div></a></td>
				<td class="name"><a href="<?php echo $activityUrl;?>"><?php echo $nom;?><br><span><?php echo $capsula['capsuleNumber'];?></span></a></td>
				<td class="last-value"><a href="<?php echo $activityUrl;?>"><?php echo number_format($lastValue['value'],2)." N/mm<sup>2</sup>";?></a></td>
				<td class="status"><a href="<?php echo $activityUrl;?>"><?php echo date("d.m.Y", strtotime($lastValue['datetime']));?></a></td>
				<td class="edit"><a href="<?php echo $editUrl;?>">
					<svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18.311 2.828l2.862 2.861-15.033 15.032-3.583.722.723-3.584 15.031-15.031zm0-2.828l-16.873 16.872-1.438 7.127 7.127-1.437 16.874-16.873-5.69-5.689z"/></svg></a>
				</td>
			</tr>
			<?php } ?>

		</table>
	</div>
</div>
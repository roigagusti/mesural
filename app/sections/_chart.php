<?php
$device = $_GET['device'];
$lastTime = $database->get("temperature", [
  "createDate"
],["ORDER"=>["createDate"=>"DESC"],"device"=>$device]);
$unaHoraMenys = strtotime($lastTime['createDate'])-2*60*60;
$start = date("Y-m-d H:i:s",$unaHoraMenys);
$end = date("Y-m-d H:i:s",strtotime($lastTime['createDate']));

$temps = $database->select("temperature", [
  "device",
  "createDate",
  "temperature"
],["ORDER"=>["createDate"=>"ASC"],"AND"=>["device"=>$device,"createDate[<>]"=>[$start,$end]]]);

$etiquetas = [];
$datos = [];
foreach ($temps as $temp) {
    $etiquetas[] = date("H:i",strtotime($temp['createDate']));
    $datos[] = $temp['temperature'];
}
}
$respuesta = [
    "titulo" => $device,
    "etiquetas" => $etiquetas,
    "datos" => $datos,
];
$chart = json_encode($respuesta);
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo beautyDate($end);?>
                <canvas id="grafica"></canvas>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
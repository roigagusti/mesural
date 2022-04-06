<?php
function timeDistance($datetime){
  $timestamp = strtotime($datetime);
  $currentTime = time();
  $diff = $currentTime - $timestamp;
  return $diff;  
}
function generarDades($timeDistance){
    $generar = False;
    $delayAdmissible = 5400;
    if($timeDistance > $delayAdmissible){
        $generar = True;
    }
    return $generar;
}

$devices = ['hezije'=>3,'mutite'=>6,'zupone'=>11];
#$sectorDevices = ['hezije'=>'A3','mutite'=>'A5','zupone'=>'B6'];
#'A' => '2022-04-01 16:55:04';
#'B' => '2022-04-01 16:54:57';
foreach($devices as $device){
  $lastTimeCapsula = $database->get('capsuleValues_lep', 'createDate',["deviceID"=>$device,"ORDER"=>["createDate"=>"DESC"]]);
  $distancia = timeDistance($lastTimeCapsula);

  if(generarDades($distancia)){
    $pas = 59*60; #59 minuts en segons
    $qty = round($distancia / $pas)+5;

    if($device == 11){
      $times = $database->select('capsuleValues_lep',[
        'createDate',
        'weatherMain',
        'weatherTemp',
        'weatherFeels_like',
        'weatherTemp_min',
        'weatherTemp_max',
        'weatherPressure',
        'weatherHumidity',
        'weatherWind_speed',
        'weatherWind_deg',
        'weatherDeviation'
      ],['deviceID'=>7,"ORDER"=>["createDate"=>"DESC"],"LIMIT"=>$qty]);
    }else{
      $times = $database->select('capsuleValues_lep',[
        'createDate',
        'weatherMain',
        'weatherTemp',
        'weatherFeels_like',
        'weatherTemp_min',
        'weatherTemp_max',
        'weatherPressure',
        'weatherHumidity',
        'weatherWind_speed',
        'weatherWind_deg',
        'weatherDeviation'
      ],['deviceID'=>1,"ORDER"=>["createDate"=>"DESC"],"LIMIT"=>$qty]);        
    }
    foreach($times as $time){
      if(strtotime($time['createDate'])>strtotime($lastTimeCapsula)){

        switch($device){
          # Per 'hezije': 'A3' (3) -> Mitjana entre A2 (2) i A4 (4)
          case 3:
            $temp2 = $database->get('capsuleValues_lep','temperature',["AND"=>["deviceID"=>2,"createDate"=>$time['createDate']]]);
            $temp4 = $database->get('capsuleValues_lep','temperature',["AND"=>["deviceID"=>4,"createDate"=>$time['createDate']]]);
            $hum2 = $database->get('capsuleValues_lep','humidity',["AND"=>["deviceID"=>2,"createDate"=>$time['createDate']]]);
            $hum4 = $database->get('capsuleValues_lep','humidity',["AND"=>["deviceID"=>4,"createDate"=>$time['createDate']]]);
            $temp3 = 0.5*$temp2+0.5*$temp4;
            $hum3 = 0.5*$hum2+0.5*$hum4;
            $addData = [$temp3,$hum3];
            break;

          # Per 'mutite': 'A5' (6) -> Continuació entre A3 (3) i A4 (4)
          case 6:
            $temp3 = $database->get('capsuleValues_lep','temperature',["AND"=>["deviceID"=>3,"createDate"=>$time['createDate']]]);
            $temp4 = $database->get('capsuleValues_lep','temperature',["AND"=>["deviceID"=>4,"createDate"=>$time['createDate']]]);
            $hum3 = $database->get('capsuleValues_lep','humidity',["AND"=>["deviceID"=>3,"createDate"=>$time['createDate']]]);
            $hum4 = $database->get('capsuleValues_lep','humidity',["AND"=>["deviceID"=>4,"createDate"=>$time['createDate']]]);
            $temp6 = 0.2*$temp3+0.8*$temp4;
            $hum6 = 0.2*$hum3+0.8*$hum4;
            $addData = [$temp6,$hum6];
            break;

          # Per 'zupone': 'B6' (11) -> Continuació entre B4 (10) i B5 (12)
          case 11:
            $temp10 = $database->get('capsuleValues_lep','temperature',["AND"=>["deviceID"=>10,"createDate"=>$time['createDate']]]);
            $temp12 = $database->get('capsuleValues_lep','temperature',["AND"=>["deviceID"=>12,"createDate"=>$time['createDate']]]);
            $hum10 = $database->get('capsuleValues_lep','humidity',["AND"=>["deviceID"=>10,"createDate"=>$time['createDate']]]);
            $hum12 = $database->get('capsuleValues_lep','humidity',["AND"=>["deviceID"=>12,"createDate"=>$time['createDate']]]);
            $temp11 = 0.2*$temp10+0.8*$temp12;
            $hum11 = 0.2*$hum10+0.8*$hum12;
            $addData = [$temp11,$hum11];
            break;
        }
        if(!($addData[0]==0 && $addData[1]==0)){
          $add = $database->insert("capsuleValues_lep", [
            "deviceID" => $device,
            "createDate" => $time['createDate'],
            "temperature" => $addData[0],
            "humidity" => $addData[1],
            'weatherMain' => $time['weatherMain'],
            'weatherTemp' => $time['weatherTemp'],
            'weatherFeels_like' => $time['weatherFeels_like'],
            'weatherTemp_min' => $time['weatherTemp_min'],
            'weatherTemp_max' => $time['weatherTemp_max'],
            'weatherPressure' => $time['weatherPressure'],
            'weatherHumidity' => $time['weatherHumidity'],
            'weatherWind_speed' => $time['weatherWind_speed'],
            'weatherWind_deg' => $time['weatherWind_deg'],
            'weatherDeviation' => $time['weatherDeviation'],
            'type' => 0
          ]);
          
        }
      }
    }
  }
}
?>
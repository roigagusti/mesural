<?php
// Obté totes les càpsules propietat de l'usuari
$capsulesPropietat = $database->select('capsuleProperty',[
    'id',
    'userID',
    'deviceID',
    'deviceName',
    'devicePlace',
    'deviceUse',
    'createDate'
],["userID"=>$id]);

foreach($capsulesPropietat as $capsula){
	if($capsula['deviceName']==""){
        $capsulaName = $database->get("capsuleInfo","deviceKey",["id"=>$capsula['deviceID']]);
    }else{
        $capsulaName = $capsula['deviceName'];
    }
    // Obtenim el darrer valor. Possible final de bateria
    $last = $database->get('capsuleValues_lep','createDate',['deviceID'=>$capsula['deviceID'],'ORDER'=>['createDate'=>'DESC']]);
    // Calculem cada quants segons rebem dada (uns 57.5s de mitjana) x60min = 3450
    $frequency = 3450;
    // Calculem el temps que ha passat des de l'última dada fins ara
    $timeDistance = timeDistance($last);
    // Dividim el temps en segons que ha passat per la freqüència per saber quants valors ens falten
    $valorFaltants = floor($timeDistance / $frequency);

	echo "Càpsula: ".$capsula['deviceID'].". ".$capsulaName."<br>";

    // Agafem els últims cinc valors de temperatura i humitat
    $lastValues = $database->select("capsuleValues_lep",["temperature","humidity"],["deviceID"=>$capsula['deviceID'],'ORDER'=>['createDate'=>'DESC'],'LIMIT'=>5]);



	for($i=0;$i<$valorFaltants;$i++){
        // Preprarem una funció random que simuli "casi" una hora de delay entre dades
        $addTime = ' +'.rand(3420,3490).' seconds';
    	$newDate = date('Y-m-d H:i:s', strtotime($last.$addTime));
    	$diffDates = strtotime($newDate) - strtotime($last);
        $ara = strtotime(date('Y-m-d H:i:s'));

        if($ara>strtotime($newDate)){
            echo $newDate.'<br>';
            echo "Temperature: ".date('H', strtotime($newDate))." , ";
            echo $lastValues[0]['temperature']." , ";
            echo $lastValues[1]['temperature']." , ";
            echo $lastValues[2]['temperature']." , ";
            echo $lastValues[3]['temperature']." , ";
            echo $lastValues[4]['temperature']." , ";
            echo strtotime($newDate);

            echo '<br>';
        }
        array_unshift($lastValues,['temperature'=>423423,'humidity'=>9999]); //Afegim a principi de l'array els valors que hem predit per aquesta hora
    	$last = $newDate;
	}
	echo '<br>';
}
?>
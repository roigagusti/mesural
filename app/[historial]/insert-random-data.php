<?php
#Comprovem per quina iteració anem o si es tracta de l'inici
if(isset($_GET['i'])){
	$j = $_GET['i'];
}else{
	$j = 0;
}

#Variació d'ID possibles
$idPosibles = ['abcdef','bcdefg','cdefgh','defghi'];
$dcPosibles = ['j','w','j','w'];
$idrand = rand(0,3);
$identificacio = $idPosibles[$idrand];

#Variació de TIME possibles
$dia = rand(1,28);
$mes = rand(1,12);
$any = 20;
$hora = rand(0,23);
$minut = rand(0,59);
$segon = 0+$i;
if($dia<10){$dia="0".$dia;}
if($mes<10){$mes="0".$mes;}
if($hora<10){$hora="0".$hora;}
if($minut<10){$minut="0".$minut;}
if($segon<10){$segon="0".$segon;}
$temps = strval($dia.$mes.$any.$hora.$minut.$segon);

#Variació de VALUE possibles
$valor = rand(-50000,50000)*0.01;

include_once("data.php");

#Valors de CC segons les dades
$digitcc = $dcPosibles[$idrand].lletra($temps).lletra($valor);

$iteracions = 19;

if($j<$iteracions){
	$j = $j +1;
	echo "ID: ".$identificacio."; TIME: ".$temps."; VALUE: ".$valor."<br>";
	header('Location: https://app.mesural.com/insert-random-data.php?id='.$identificacio.'&time='.$temps.'&value='.$valor.'&cc='.$digitcc.'&i='.$j);
}
?>
/*
# Author: ldrs
# Template: Neway
# Version: 1.0
# Copyright 2015 Aldasoro Inc
# www: http://www.neway.com


Taula de continguts
-------------------

 1.Languages
 2.Email


/* ----------- 1. Languages ------------ */
function showlanguages(){
  if($('ul.languages').hasClass('hidden')){
    $('ul.languages').removeClass('hidden');
  }else{
    $('ul.languages').addClass('hidden');
  }
}

/* ----------- 2. Email ------------ */
usuario="info" 
dominio="mesural.com" 
conector="@"


function correo(){ 
   return usuario + conector + dominio 
} 

function enlace_correo(){ 
   document.write("<a href='mailto:" + correo() + "'>") 
}

/* ---------- 2. Slider range ---------- */
$( "#velocitat" ).slider({
  range: "min",
  value: 2.4,
  step: 0.2,
  min: 2.0,
  max: 4.6,
  slide: function( event, ui ) {
    $( "#velocitatvalue" ).val( ui.value );
    actualitzapreu();
  }
});
$( "#processador" ).slider({
  range: "min",
  value: 5,
  step: 2,
  min: 3,
  max: 7,
  slide: function( event, ui ) {
    $( "#processadorvalue" ).val( ui.value );
    actualitzapreu();
  }
});
$( "#ram" ).slider({
  range: "min",
  value: 6,
  step: 2,
  min: 2,
  max: 16,
  slide: function( event, ui ) {
    $( "#ramvalue" ).val( ui.value );
    actualitzapreu();
  }
});
$( "#capacitat" ).slider({
  range: "min",
  value: 450,
  step: 50,
  min: 100,
  max: 2000,
  slide: function( event, ui ) {
    actualitzapreu();
    if(ui.value<1000){
      $( "#capacitatvalue" ).val( ui.value );
      document.getElementById('spancapacitat').innerHTML='GB HDD';
    }else{
      $( "#capacitatvalue" ).val( ui.value/1000 );
      document.getElementById('spancapacitat').innerHTML='TB HDD';
    }
  }
});

//preu de servei
function actualitzapreu(){
  var velocitat = parseFloat(document.getElementById('velocitatvalue').value)*2.08;
  var processador = parseFloat(document.getElementById('processadorvalue').value)*1;
  var ram = parseFloat(document.getElementById('ramvalue').value)*0.5;
  if(document.getElementById('capacitatvalue').value>2.1){
    var capacitat = parseFloat(document.getElementById('capacitatvalue').value)*0.005;
  }else{
    var capacitat = parseFloat(document.getElementById('capacitatvalue').value)*2.5;
  }

  var preu = Math.round(velocitat + processador + ram + capacitat)-0.01;

  document.getElementById('preu').innerHTML=
  preu + '&euro;';
}
  
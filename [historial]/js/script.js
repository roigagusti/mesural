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
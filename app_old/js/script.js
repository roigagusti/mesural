/*
* Title: App. Style
* Author: Aldasoro
* Template: Mesural
* Version: 0.2.1
* Copyright 2020 Mesural Inc.
* Url: https://www.mesural.com


Content table
--------------
1. Basic scripts

/* ----- 1. Basic scripts ----- */
$(".input-settings").on('change', function() {
	$(".btn-cancel").removeClass("disabled");
	$(".btn-save").removeClass("disabled");
});
function termsChanged(){
	$(".btn-access").hasClass("disabled") ? $(".btn-access").removeClass("disabled") : $(".btn-access").addClass("disabled");
}	

/* ----- 2. Obrir i tancar menú responsive ----- */
function activeResponsiveMenu(){
	$(".responsive-nav").removeClass("hidden");
	$(".responsive-blur").removeClass("hidden");
};

function disactiveResponsiveMenu(){
	$(".responsive-nav").addClass("hidden");
	$(".responsive-blur").addClass("hidden");
};
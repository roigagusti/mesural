/*
* Title: Web. Style
* Author: Aldasoro
* Template: Mesural
* Version: 0.1.1
* Copyright 2020 Mesural Inc.
* Url: https://www.mesural.com


Content table
--------------
1. Custom scripts
2. Bootstrap scripts

/* ----- 1. Custom scripts ----- */
function showlanguages() {
	$("ul.languages").hasClass("hidden") ? $("ul.languages").removeClass("hidden") : $("ul.languages").addClass("hidden")
}

function correo() {
	return usuario + conector + dominio
}

function enlace_correo() {
	document.write("<a href='mailto:" + correo() + "'>")
}
usuario = "info", dominio = "mesural.com", conector = "@";


function actualitzapreu(preu){
  var items = document.getElementById("items").value;
  var discount = document.getElementById('discount').value;
  var total = (1-discount/100)*items*preu;
  var iva = total-total/1.21;
  document.getElementById('preu').innerHTML = total.toFixed(2).replace(".", ",")+" €";
  document.getElementById('subtotal').innerHTML = total.toFixed(2).replace(".", ",")+" €";
  document.getElementById('total').innerHTML = total.toFixed(2).replace(".", ",")+" €";
  document.getElementById('iva').innerHTML = iva.toFixed(2).replace(".", ",")+" €";
}


/* ----- 2. Bootstrap scripts ----- */
var mr_firstSectionHeight, mr_nav, mr_fixedAt, mr_navOuterHeight, mr_floatingProjectSections, mr_navScrolled = !1,
	mr_navFixed = !1,
	mr_outOfSight = !1,
	mr_scrollTop = 0;
function updateNav() {
	var e = mr_scrollTop;
	if (e <= 0) return mr_navFixed && (mr_navFixed = !1, mr_nav.removeClass("fixed")), mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight")), void(mr_navScrolled && (mr_navScrolled = !1, mr_nav.removeClass("scrolled")));
	if (e > mr_navOuterHeight + mr_fixedAt) {
		if (!mr_navScrolled) return mr_nav.addClass("scrolled"), void(mr_navScrolled = !0)
	} else e > mr_navOuterHeight ? (mr_navFixed || (mr_nav.addClass("fixed"), mr_navFixed = !0), e > mr_navOuterHeight + 10 ? mr_outOfSight || (mr_nav.addClass("outOfSight"), mr_outOfSight = !0) : mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight"))) : (mr_navFixed && (mr_navFixed = !1, mr_nav.removeClass("fixed")), mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight"))), mr_navScrolled && (mr_navScrolled = !1, mr_nav.removeClass("scrolled"))
}
$(document).ready(function() {
	"use strict";
	var e = $("a.inner-link");
	if (e.length) {
		e.each(function() {
			var e = $(this);
			"#" !== e.attr("href").charAt(0) && e.removeClass("inner-link")
		});
		var a = 0;
		$("body[data-smooth-scroll-offset]").length && (a = $("body").attr("data-smooth-scroll-offset"), a *= 1), smoothScroll.init({
			selector: ".inner-link",
			selectorHeader: null,
			speed: 750,
			easing: "easeInOutCubic",
			offset: a
		})
	}
	addEventListener("scroll", function() {
		mr_scrollTop = window.pageYOffset
	}, !1), $(".background-image-holder").each(function() {
		var e = $(this).children("img").attr("src");
		$(this).css("background", 'url("' + e + '")'), $(this).children("img").hide(), $(this).css("background-position", "initial")
	}), setTimeout(function() {
		$(".background-image-holder").each(function() {
			$(this).addClass("fadeIn")
		})
	}, 200), $('[data-toggle="tooltip"]').tooltip(), $("ul[data-bullet]").each(function() {
		var e = $(this).attr("data-bullet");
		$(this).find("li").prepend('<i class="' + e + '"></i>')
	}), $(".progress-bar").each(function() {
		$(this).css("width", $(this).attr("data-progress") + "%")
	}), $("nav").hasClass("fixed") || $("nav").hasClass("absolute") ? $("body").addClass("nav-is-overlay") : ($(".nav-container").css("min-height", $("nav").outerHeight(!0)), $(window).resize(function() {
		$(".nav-container").css("min-height", $("nav").outerHeight(!0))
	}), $(window).width() > 768 && $(".parallax:nth-of-type(1) .background-image-holder").css("top", -$("nav").outerHeight(!0)), $(window).width() > 768 && $("section.fullscreen:nth-of-type(1)").css("height", $(window).height() - $("nav").outerHeight(!0))), $("nav").hasClass("bg-dark") && $(".nav-container").addClass("bg-dark"), mr_nav = $("body .nav-container nav:first"), mr_navOuterHeight = $("body .nav-container nav:first").outerHeight(), mr_fixedAt = void 0 !== mr_nav.attr("data-fixed-at") ? parseInt(mr_nav.attr("data-fixed-at").replace("px", "")) : parseInt($("section:nth-of-type(1)").outerHeight()), window.addEventListener("scroll", updateNav, !1), $(".menu > li > ul").each(function() {
		var e = $(this).offset(),
			a = e.left + $(this).outerWidth(!0);
		if (a > $(window).width() && !$(this).hasClass("mega-menu")) $(this).addClass("make-right");
		else if (a > $(window).width() && $(this).hasClass("mega-menu")) {
			var t = $(window).width() - e.left,
				n = $(this).outerWidth(!0) - t;
			$(this).css("margin-left", -n)
		}
	}), $(".mobile-toggle").click(function() {
		$(".nav-bar").toggleClass("nav-open"), $(this).toggleClass("active")
	}), $(".menu li").click(function(e) {
		e || (e = window.event), e.stopPropagation(), $(this).find("ul").length ? $(this).toggleClass("toggle-sub") : $(this).parents(".toggle-sub").removeClass("toggle-sub")
	}), $(".menu li a").click(function() {
		$(this).hasClass("inner-link") && $(this).closest(".nav-bar").removeClass("nav-open")
	}), $(".module.widget-handle").click(function() {
		$(this).toggleClass("toggle-widget-handle")
	}), $(".search-widget-handle .search-form input").click(function(e) {
		e || (e = window.event), e.stopPropagation()
	}), $(".offscreen-toggle").length ? $("body").addClass("has-offscreen-nav") : $("body").removeClass("has-offscreen-nav"), $(".offscreen-toggle").click(function() {
		$(".main-container").toggleClass("reveal-nav"), $("nav").toggleClass("reveal-nav"), $(".offscreen-container").toggleClass("reveal-nav")
	}), $(".main-container").click(function() {
		$(this).hasClass("reveal-nav") && ($(this).removeClass("reveal-nav"), $(".offscreen-container").removeClass("reveal-nav"), $("nav").removeClass("reveal-nav"))
	}), $(".offscreen-container a").click(function() {
		$(".offscreen-container").removeClass("reveal-nav"), $(".main-container").removeClass("reveal-nav"), $("nav").removeClass("reveal-nav")
	})
}), $(window).load(function() {
	"use strict";
	setTimeout(initializeMasonry, 1e3), mr_firstSectionHeight = $(".main-container section:nth-of-type(1)").outerHeight(!0)
});
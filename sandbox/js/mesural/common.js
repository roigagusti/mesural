var i_ivwanaURLroot = window.location.href.match(/http\:\/\/[^\/]+/);
var sizetimer = null;

$("document").ready(function () {
    if ($(".date-selection").length > 0) {
        $("input", $(".date-selection").prototype).click(function (event) {
            $(".date-selection").find(".selection").removeClass("selected");
            $(event).parent().addClass("selected");
        });
    }

    i_ivwanacheckhash();
    //i_ivwanaHeaderAnimation();
    i_ivwanatabs();
    //i_ivwanascreenshot();
    i_ivwanaclone();
    i_ivwanaTips();
    //i_ivwanacarousel();
    i_ivwanaYouTube();
    
    $("body").find(".ivw-slideshow").each(function() {
        var slideShow = new ivw_slideShow($(this));
    });
    $("body").find("img").each(function() {
        var img = new ivw_image($(this));
    });
    $("body").find(".ivw-carousel").each(function() {
        var gallery = new ivw_gallery($(this));
    });

    if ($('input[name="ivw_ck"]').length > 0) {
        $('input[name="ivw_ck"]').attr("autocomplete", "off");
    }
    if ($('.animated-scroll').length > 0) {
        $(window).bind('scroll', i_ivwanaScollAnimation);
    }
});

function i_ivwanacheckhash() {
    if (window.location.hash) {
        var hash = window.location.hash.substr(1).toLowerCase();
        
        $("form").each(function() {
            var option = $(this).find("select option").filter(function() {
                return this.value.toLowerCase() === hash;
            });
            option.attr("selected", true);
        });
    }
}

function i_ivwanaScollAnimation(){ 
    var pos = $(window).scrollTop();
    var velocity = 0.3;

    $('.animated-scroll').each(function() { 
        var position = Math.round( ($(this).offset().top - pos - $(window).height() + $(this).height()) * velocity );

        $(this).css('backgroundPosition', '50% ' + position +  'px'); 
    });
}

 


/*
function i_ivwanacarousel() {
    if ($(".ivw-carousel").length === 0) {
        return false;
    }

    var imgIndex = 0;
    var imgArray = new Array();

    $("body").append('<div class="ivw-carousel-fullscreen">\n\
    <div>\n\
        <a class="ivw-carousel-button ivw-carousel-close">Close</a>\n\
        <div class="ivw-carousel-image"></div>\n\
        <div class="ivw-carousel-info"></div>\n\
    </div>\n\
</div>');

    $(".ivw-carousel").each(function (carouselKey) {
        $(this).wrap('<div class="ivw-carousel-container"></div>');
        $(this).parent().append('<a class="ivw-carousel-button ivw-carousel-previous"></a><a class="ivw-carousel-button ivw-carousel-next"></a>');

        imgArray[carouselKey] = new Array();

        var carouselWidth = $(".ivw-carousel-container").outerWidth(true);
        var totalWidth = 0;

        $(this).find("li").each(function () {
            totalWidth += $(this).outerWidth(true);
        });
        $(this).css("width", (carouselWidth * Math.ceil(totalWidth / carouselWidth)) + "px");

        $(this).find("li").each(function (imgKey) {
            imgArray[carouselKey][imgKey] = $(this).outerWidth(true);
            if ($(this).position().left + $(this).outerWidth(true) <= carouselWidth) {
                imgIndex = imgKey;
            }
            $(this).click(function () {
                i_ivwanacarouselShowFullScreen($(this).find("img"), imgKey + 1, imgArray[carouselKey].length);
            });
        });

        $(this).parent().find(".ivw-carousel-next").click(function () {
            var targetLeft = i_ivwanacarouselFindLastVisibleElement($(this).siblings(".ivw-carousel:first"));

            $(this).siblings(".ivw-carousel").animate({
                left: "-=" + targetLeft
            },{
                duration: 250,
                queue: false,
                done: function() {
                }
            });
        });

        $(this).parent().find(".ivw-carousel-previous").click(function () {
            var targetLeft = i_ivwanacarouselFindPreviousVisibleElement($(this).siblings(".ivw-carousel:first"));

            $(this).siblings(".ivw-carousel").animate({
                left: "+=" + targetLeft
            },{
                duration: 250,
                queue: false,
                done: function() {
                }
            });
        });
    });

    $(".ivw-carousel-fullscreen, .ivw-carousel-image").click(function (event) {
        $(".ivw-carousel-fullscreen").hide();
    });
}

function i_ivwanacarouselFindPreviousVisibleElement(p_list) {
    var viewport = p_list.parent().outerWidth(true);
    var parentLeft = parseInt(p_list.css("left"));
    var result = i_ivwanacarouselFindLastVisibleElement(p_list);
        
    if (!parentLeft) {
        parentLeft = 0;
    }
    if (result === 0) {
        result = viewport;
    } else if (parentLeft + result > 0) {
        result = -parentLeft;
    }

    return result;
}

function i_ivwanacarouselFindLastVisibleElement(p_list) {
    var viewport = p_list.parent().outerWidth(true);
    var parentLeft = parseInt(p_list.css("left"));
    var result = 0;
    
    if (!parentLeft) {
        parentLeft = 0;
    }

    p_list.find("li").each(function() {
        var elPos = $(this).position().left + parentLeft;
        if (elPos < viewport) {
           result =  elPos;
        }
    });

    return result;
}

function i_ivwanacarouselShowFullScreen(p_image, p_index, p_total) {
    var title = p_image.attr("title") ? p_image.attr("title") : "";

    $(".ivw-carousel-fullscreen").width($('body').innerWidth());
    $(".ivw-carousel-fullscreen").height($('body').innerHeight());
    $(".ivw-carousel-fullscreen .ivw-carousel-image").html('<img src="' + p_image.attr("src") + '" class="branding-width" />');
    $(".ivw-carousel-fullscreen .ivw-carousel-info").html('<span style="float:left; padding-left:10px;">' + title + '</span>' + '<span style="float:right; padding-right:10px;">' + p_index + " / " + p_total + '</span>');
    $(".ivw-carousel-fullscreen").show();
    
    i_ivwanacarouselShowFullScreenCenter();
}

function i_ivwanacarouselShowFullScreenCenter() {
    var imageWidth  = $(".ivw-carousel-fullscreen .ivw-carousel-image img").outerWidth();
    var imageHeight = $(".ivw-carousel-fullscreen .ivw-carousel-image img").outerHeight();

    if (imageWidth > 0) {
        var margintop  = $(window).height()/2 - imageHeight/2 + $(window).scrollTop();
        $(".ivw-carousel-fullscreen > div").css("width", imageWidth + "px");
        $(".ivw-carousel-fullscreen > div").css("margin-top", margintop + "px");
        
        $(".ivw-carousel-fullscreen").show();
    } else {
        console.log("hide");
        $(".ivw-carousel-fullscreen").hide();
        setTimeout(function() {
            i_ivwanacarouselShowFullScreenCenter();
        }, 100);
    }
}
*/

function i_ivwanatabs()
{
    if ($(".ivw-tab").length > 0)
    {
        $(".ivw-tab").children("li").click(function () {
            cancelevent();

            var nth = $(this).parent("ul").find("li").index($(this));

            $(".ivw-tab").children("li").removeClass("selected");
            $(".ivw-tabcontent").removeClass("selected");
            $(".ivw-tabcontent").hide();

            $(this).addClass("selected");
            $(this).show();
            $(".ivw-tabcontent:eq(" + nth + ")").addClass("selected");
            $(".ivw-tabcontent:eq(" + nth + ")").show();
        });

        $(".ivw-tab").children("li:first").addClass("selected");
        $(".ivw-tabcontent:eq(0)").addClass("selected");
        $(".ivw-tabcontent:eq(0)").show();
    }
}

/*
function i_ivwanascreenshot()
{
    if ($(".captureecran").length > 0)
    {
        var fullscreen = document.createElement("img");
        fullscreen.id = "fullscreen_screenshot";
        fullscreen.alt = "";
        fullscreen.style.position = "absolute";
        fullscreen.style.top = "0px";
        fullscreen.style.left = "0px";
        fullscreen.style.display = "none";
        fullscreen.onclick = function () {
            $(this).css("display", "none");
        };
        $("body:first").append(fullscreen);
        $(".captureecran a").click(function () {
            $("#fullscreen_screenshot").attr("src", $(this).attr("href"));
            $("#fullscreen_screenshot").css({"visibility": "hidden",
                "display": "block"});
            cancelevent();
            i_ivwanadisplayimage();
        });
    }
}

function i_ivwanadisplayimage()
{
    if ($("#fullscreen_screenshot").width() > 0) {
        $("#fullscreen_screenshot").css({"visibility": "visible",
            "left": (($("body:first").width() / 2) - ($("#fullscreen_screenshot").width() / 2)) + "px",
            "top": (($("body:first").height() / 2) - ($("#fullscreen_screenshot").height() / 2)) + "px"});
        clearTimeout(sizetimer);
    } else {
        sizetimer = setTimeout(i_ivwanadisplayimage, 60);
    }
}
*/
function i_ivwanaclone()
{
    if ($(".duplicate").length > 0) {
        $(".duplicate").click(function () {
            cancelevent();
            var toduplicate = $(".toduplicate:last");
            var clone = toduplicate.clone();

            clone.find(".clearonduplicate").val("");
            toduplicate.after(clone);

            clone.find("input").focus(function () {
                $(this).select();
            });

            i_ivwanarankclones();

            clone.find("input:first").focus();
        });
    }
}

function i_ivwanarankclones()
{
    $(".toduplicate").each(function (key, value) {
        $(this).find("input").each(function () {
            $(this).attr("name", $(this).attr("name").match(/([a-z0-9]*)/i)[1] + "[" + key + "]");
        });
    });
}

function i_ivwanaTips() {
    $(".ivw-titleTip").each(function (key, value) {
        var obj = $(this);
        obj.blur(function () {
            if (obj.val().length === 0) {
                obj.val(obj.attr("title"));
                obj.addClass("default");
            }
            ;
        });
        obj.focus(function () {
            if (obj.val() === obj.attr("title")) {
                obj.val("");
                obj.removeClass("default");
            }
        });
        obj.val(obj.attr("title"));
        obj.addClass("default");
    });
}

function i_ivwanaYouTube() {
    if ($("#player").length > 0) {
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
}
function onYouTubeIframeAPIReady() {
    var playerClass = $("#player").attr("class");
    var ytId  = "e-mPBSjLfSQ";

    if (playerClass) {
        ytId = playerClass.match(/yt_([^\s\"\']+)/i)[1];
    }

    var player = new YT.Player('player', {
        videoId: ytId,
        width: $("#player").outerWidth(),
        height: $("#player").outerHeight(),
        playerVars: { 'autoplay': 1, 'controls': 1 },
        events: {
            'onReady': function(e) {
                player.mute();
                player.playVideo();
            },
            'onStateChange': function(e) {
                if (e.data === YT.PlayerState.ENDED) {
                    player.playVideo();
                }
            }
        }
    });
    
    $("#player").wrap('<div class="player-wrapper"></div>');
    $(".player-wrapper").mouseover(function() {
        if (player) {
            player.unMute();
        }
        $("#player").addClass("active");
    });
    $(".player-wrapper").mouseout(function() {
        if (player) {
            player.mute();
        }
        $("#player").removeClass("active");
    });
}

function i_ivwanaAjax(p_url, p_data, p_callback)
{
    if (window.XMLHttpRequest) {
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/html');
        }
    } else if (window.ActiveXObject) {
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }

    if (!http_request) {
        return true;
    }

    http_request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            p_callback(this.responseText);
        }
    };

    http_request.open('POST', p_url, true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send(p_data);

    return true;
}

function cancelevent(e)
{
    var event = e || window.event;

    if (!event)
        return false;

    if (event.stopPropagation) {
        event.preventDefault();
        event.stopPropagation();
        event.stopped = true;
        return false;
    } else {
        event.cancelBubble = true;
        event.returnValue = false;
        return false;
    }

    return true;
}


Array.prototype.move = function (old_index, new_index) {
    while (old_index < 0) {
        old_index += this.length;
    }
    while (new_index < 0) {
        new_index += this.length;
    }
    if (new_index >= this.length) {
        var k = new_index - this.length;
        while ((k--) + 1) {
            this.push(undefined);
        }
    }
    this.splice(new_index, 0, this.splice(old_index, 1)[0]);
    return this; // for testing purposes
};


/*
 *  To change a Node type
 */
(function($) {
    $.fn.changeElementType = function(newType) {
        var attrs = {};

        $.each(this[0].attributes, function(idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });

        this.replaceWith(function() {
            return $("<" + newType + "/>", attrs).append($(this).contents());
        });
    }
})(jQuery);



var ivw_image = function(p_dom) {
    this.img = p_dom;
    this.url = null;
	this.offset = 150;
    this.size = {"width":0,"height":0};
    
    this.initialize = function() {
        this.url = this.img.attr("src");
        if (!this.displayed()) {
            this.setEvent();
        }
    };
    this.set = function(p_force) {
        if ((p_force === true) || this.displayed()) {
            this.img.attr("src", this.url);
            $(window).off("scroll", $.proxy(this.set, this));
            this.img.off("img:focus", $.proxy(this.focus, this));
        }
    };
    this.displayed = function() {
        var w = $(window);
        if ( (((w.scrollTop() + w.height()) - (this.img.offset().top - this.offset)) >= 0 &&
                ((this.img.offset().top + this.img.height() + this.offset) - w.scrollTop()) >= 0 ) &&
                this.displayedParent() ) {
            this.zoom();
            return true;
        }
        return false;
    };
    this.displayedParent = function() {
        var parent = this.img.parents().filter(function() {
                            return ($(this).css("overflow") === "hidden" && $(this).css("position") === "relative");
                        }).first();
        if (parent.length > 0) {
            if (this.img.position().left > parent.outerWidth() || this.img.position().top > parent.outerHeight()) {
                return false;
            }
        }
        return true;
    };
    this.focus = function() {
        this.set(true);
    };
    this.setEvent = function() {
        this.img.attr("src", "about:blank");
        $(window).on("scroll", $.proxy(this.set, this));
        this.img.on("img:focus", $.proxy(this.focus, this));
    };
    this.title = function() {
        var title = this.img.attr("title") || this.img.attr("alt") || this.img.attr("src");
        return $('<h5 style="text-align:center;background:#FFF;color:#2F2F2F;margin:0;padding: 1em 1em;border-top:2px solid #FFF;position:absolute;box-shadow: inset 0 20px 17px -20px rgba(0,0,0,0.3);width: calc(100% + 10px);margin: 0 -5px;line-height: 1em;left:0;bottom:-3em;box-sizing:border-box;">' + title + '</h5>');
    };
    this.zoom = function() {
        var self = this;
        this.img.on("mouseover", function handler() {
            self.size.width = self.img[0].naturalWidth;
            self.size.height = self.img[0].naturalHeight;
            if (self.size.width > self.img.outerWidth() && self.size.height > self.img.outerHeight()) {
                self.setClick();
            }
            self.img.off("mouseover", handler);
        });
    };
    this.setClick = function() {
        var self = this;
        var parent = this.img.parents().filter(function() {
                        return ($(this).is("a") && $(this).attr("href").length > 0);
                    }).first();
        if (parent.length === 0) {
            this.img.on("click", function() {
                ivw_popup.initialize(self.img.clone(), self.title());
            });
        }
    };

    this.initialize();
    return this.img;
};


var ivw_slideShow = function(p_dom) {
    this.parent = p_dom;
    this.controls = null;
    this.tiles = null;
	
    this.animator = null;
    this.offset = null;
    this.options = null;
		
    this.initialize = function() {
        this.options = this.parent.attr("class").split(" ");
        this.ui();
        this.animator = new ivw_animate(this.tiles, this.options, this.notify);
    };
    this.ui = function() {
        this.controls = $('<ul class="ivw-slideshow-controls"></ul>');
        this.tiles = $('<div class="tiles" style="position:relative;"></div>');
        var count = this.ui.tiles(this);
        if (count > 1) {
            if (this.options.indexOf("ivw-slideshow-ctrlPrevNext") > -1) {
                this.ui.previousnext(this);
            } else {
                this.ui.list(this, count);
            }
            this.parent.append(this.controls);
        }
        this.parent.append(this.tiles);
        $(window).on("resize", $.proxy(this.ui.update, this));
    };
        this.ui.tiles = function(p_self) {
            var totalWidth = 0;
            var childs = p_self.parent.children();
            childs.each(function(index) {
                if (!$(this).hasClass("overlay")) {
                    $(this).css("width", p_self.parent.outerWidth() + "px");
                    $(this).css("height", "100%");
                    $(this).addClass("slide-tile_" + index);
                    totalWidth += $(this).outerWidth();
                    p_self.tiles.append($(this));
                    if (p_self.parent.hasClass("imgToBackground")) {
                        $(this).css("background-image", "url" + "(" + $(this).find("img:last").attr("src") + ")");
                        $(this).css("background-size", "cover");
                        $(this).find("img:last").remove();
                    }
                }
            });
            p_self.tiles.css("width", totalWidth + "px");
            return childs.length;
        };
        this.ui.previousnext = function(p_self) {
            var self = this;
            p_self.controls.append('<li><a href="#" class="ivw-previous"></a></li>').click(function(){ p_self.animator.now(null, false); });
            p_self.controls.append('<li><a href="#" class="ivw-next"></a></li>').click(function(){ p_self.animator.now(null, true); });
        };
        this.ui.list = function(p_self, p_count) {
            for(var x = 0; x < p_count; x++) {
                p_self.controls.append($('<li><a href="#"></a>\n\</li>').click(function(){ p_self.animator.now($(this).parent().find("li").index($(this))); }));

            }
        };
        this.ui.update = function() {
            var self = this;
            var totalWidth = 0;
            self.tiles.children().each(function(index) {
                if (!$(this).hasClass("overlay")) {
                    $(this).css("width", self.parent.outerWidth() + "px");
                    totalWidth += $(this).outerWidth();
                }
            });
            self.tiles.css("width", totalWidth + "px");
        };
    this.notify = function(p_id) {
        this.tiles.prev(".ivw-slideshow-controls").find("li").removeClass("selected");
        this.tiles.prev(".ivw-slideshow-controls").find("li:nth-child(" + (p_id + 1) + ")").addClass("selected");
        this.tiles.children("*:eq(0)").find("img").trigger("img:focus");
        this.tiles.children("*:eq(1)").find("img").trigger("img:focus");
    }

    this.initialize();
    return this.img;
}


var ivw_animate = function (p_dom, p_options, p_notify) {
    this.timer = null;
    this.tiles = p_dom;
    this.options = p_options;
    this.delay = 6000;
    this.offset = null;

    this.running = false;
    this.notify = function() {};

    this.initialize = function(p_notify) {
        if (p_notify) {
            this.notify = p_notify;
        }
        if(this.tiles.children().length > 1) {
            this.offset = Math.floor(500 - (Math.random() * 1000));
            this.setEvents();
            this.notify(0);
        }
    };
    this.go = function(p_id, p_next) {
        var self = this;
        this.timer = window.setTimeout(function () {
            self.now(p_id, p_next);
        }, this.delay + this.offset);
    };
    this.now = function(p_id, p_next) {
        this.stop();
        if (this.options.indexOf("fade") > -1) {
            this.fade(p_id, p_next);
        } else {
            this.slide(p_id, p_next);
        }
    }
    this.setEvents = function() {
        var self = this;
        this.running = true;
        this.tiles.on("mouseover", function handler() {
            self.running = false;
            window.clearTimeout(self.timer);
        });
        this.tiles.on("mouseout", function handler() {
            self.running = true;
            self.go(null, true);
        });
        this.go(null, true);
    };
    this.current = function() {
        return parseInt(this.tiles.find("[class^=slide-tile]:first").attr("class").match(/slide\-tile_([0-9]+)/)[1]);
    };
    this.next = function() {
        var next = this.tiles.find("[class^=slide-tile]:nth-of-type(2)").attr("class");
        if (next) {
            next = parseInt(next.match(/slide\-tile_([0-9]+)/)[1]);
        } else {
            next = 0;
        }
        return next;
    };
    this.stop = function() {
        cancelevent();
        this.tiles.stop();
        window.clearTimeout(this.timer);
    };
    this.slide = function(p_id, p_next) {
        var tiles = this.tiles;
        var self = this;
        
        if (p_id >= 0 || p_next) {
            if (p_id === null) {
                p_id = this.next();
            }
            tiles.find("[class=slide-tile_" + p_id + "]").insertAfter(tiles.find("[class^=slide-tile]:first"));
        } else if (!p_id && !p_next) {
            var previous = this.current() - 1;
            if (previous < 0) {
                previous = tiles.find("[class^=slide-tile]").length - 1;
            }
            tiles.find("[class=slide-tile_" + previous + "]").insertAfter(tiles.find("[class^=slide-tile]:first"));
        }

        tiles.animate({
            left: "-" + (tiles.find(".slide-tile_" + this.current()).get(0).offsetWidth) + "px"
        }, {
            duration: 500,
            complete: function () {
                var tc = self.next();
                var tn = tc + 1;
                for(var x = 1; x < tiles.find("[class^=slide-tile]").length; x++) {
                    if (tn === tiles.find("[class^=slide-tile]").length) {
                        tn = 0;
                    }
                   tiles.find(".slide-tile_" + tn).insertAfter(tiles.find(".slide-tile_" + tc));
                   tc = tn;
                   tn++;
                }
                tiles.css("left", "0px");
                if (self.running) {
                    self.go(null, true);
                }
                self.notify(self.current());
            }
        });
    };
    this.fade = function(p_id, p_next) {
        var tiles = this.tiles;
        var next = this.next();
        var current = this.current();
        var self = this;

        tiles.find(".slide-tile_" + next).css("opacity", "0");
        tiles.find(".slide-tile_" + next).css("position", "absolute");
        tiles.find(".slide-tile_" + next).css("top", "0");
        tiles.find(".slide-tile_" + next).css("left", "0");
        tiles.find(".slide-tile_" + next).css("z-index", "1");

        tiles.find(".slide-tile_" + next).animate({
            opacity: 1
        }, {
            duration: 500,
            start: function() {
            },
            complete: function () {
                $(this).css("z-index", "0");
                $(this).css("position", "relative");
                tiles.append(tiles.find(".slide-tile_" + current));
                
                if (self.running) {
                    self.go(null, true);
                }
            }
        });

        return true;
    };

    this.initialize(p_notify);
    return this;
};


var ivw_popup = {
    content: null,
    title: null,
    url: null,
    domShadow: null,
    domBox: null,
    domTitle: null,
    onShow: function() { return false; },
    onHide: function() { return false; },
    initialize: function(p_dom, p_title) {
        this.content = p_dom.clone();
        this.title = p_title;
        this.show();
    },
    show: function(p_size) {
        this.shadow();
        this.box();
        this.onShow(this);
    },
    hide: function() {
        this.domShadow.remove();
        this.domBox.remove();
        this.onHide(this);
        $(window).off("scroll", this.scroll);
    },
    scroll: function(p_self) {
        p_self = ivw_popup;
        p_self.center(p_self.domBox, {"width":p_self.domBox.width(),"height":p_self.domBox.height()});
    },
    update: function(p_dom, p_size) {
        this.domBox.css("height", "auto");
        if (this.content && this.content.is("img")) {
            this.content.focus();
            this.content.removeAttr("style");
            this.content.removeAttr("class");
            this.content.removeAttr("width");
            this.content.removeAttr("height");
            this.content.css("max-width", "100%");
        }
        if (!p_size) {
            p_size = {"width":this.domBox.outerWidth(),"height":this.domBox.outerHeight()};
        }
        this.center(this.domBox, p_size);
    },
    center: function(p_obj, p_size) {
        if (p_size.height > ($(window).height() * 0.8)) {
            p_size.width = p_size.width * (($(window).height() * 0.8) / p_size.height);
            p_size.height = $(window).height() * 0.8;
        }
        if (p_size.width > ($(window).width() * 0.8)) {
            p_size.height = p_size.height * (($(window).width() * 0.8) / p_size.width);
            p_size.width = $(window).width() * 0.8;
        }

        p_obj.width(p_size.width);
        p_obj.height(p_size.height);

        p_obj.css("left", ($(window).scrollLeft() + Math.round($(window).width() / 2 - p_obj.width() / 2)) + "px");
        p_obj.css("top", ($(window).scrollTop() + Math.round($(window).height() / 2 - p_obj.height() / 2)) + "px");
    },
    box: function() {
        var self = this;
        
        this.domBox = $('<div class="ivw-image-zoom" style="position:absolute;z-index:99999;border:5px solid #FFF;background:#FFF;box-shadow:0 0 10px 0 rgba(0,0,0,1);max-width:80%;border-radius:2px;"></div>').append($('<img alt="" style="max-width:100%;max-height:100%;display:block;margin:0 auto;" />'));
        this.domBox.append($('<canvas width="24" height="24" style="position:absolute;top:2px;right:2px;"></canvas>').on("click", function handler() {
                                self.hide();
                            }))

        this.domBox.append(this.content.show());
        this.domBox.append(this.title);

        var c = this.domBox.find("canvas")[0].getContext("2d");

        c.beginPath();
        c.moveTo(2,0);
        c.lineTo(26,24);
        c.moveTo(2,24);
        c.lineTo(26,0);
        c.lineWidth = 1;
        c.strokeStyle = "#FFFFFF";
        c.stroke();
        
        c.beginPath();
        c.moveTo(0,0);
        c.lineTo(24,24);
        c.moveTo(0,24);
        c.lineTo(24,0);
        c.lineWidth = 2;
        c.strokeStyle = "#CCCCCC";
        c.stroke();

        $(window).on("scroll", this.scroll);
        $("body").append(this.domBox);

        this.update();
        return this.domBox;
    },
    shadow: function() {
        var self = this;
        this.domShadow = $('<div style="opacity:0.3;position:absolute;background:#000;z-index:99998;top:0;left:0;"></div>');
        this.domShadow.width($(document).outerWidth());
        this.domShadow.height($(document).outerHeight());
        this.domShadow.show();
        this.domShadow.on("click", function handler() {
            self.hide();
        });
        $("body").append(this.domShadow);
        return this.domShadow;
    }
}






var __ = {
    accents: function(p_str) {
        for(var i = 0; i < defaultDiacriticsRemovalMap.length; i++) {
            p_str = p_str.replace(defaultDiacriticsRemovalMap[i].letters, defaultDiacriticsRemovalMap[i].base);
        }
        return p_str;
    }
};


/*
   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/
var defaultDiacriticsRemovalMap = [
    {'base':'A', 'letters':/[\u0041\u24B6\uFF21\u00C0\u00C1\u00C2\u1EA6\u1EA4\u1EAA\u1EA8\u00C3\u0100\u0102\u1EB0\u1EAE\u1EB4\u1EB2\u0226\u01E0\u00C4\u01DE\u1EA2\u00C5\u01FA\u01CD\u0200\u0202\u1EA0\u1EAC\u1EB6\u1E00\u0104\u023A\u2C6F]/g},
    {'base':'AA','letters':/[\uA732]/g},
    {'base':'AE','letters':/[\u00C6\u01FC\u01E2]/g},
    {'base':'AO','letters':/[\uA734]/g},
    {'base':'AU','letters':/[\uA736]/g},
    {'base':'AV','letters':/[\uA738\uA73A]/g},
    {'base':'AY','letters':/[\uA73C]/g},
    {'base':'B', 'letters':/[\u0042\u24B7\uFF22\u1E02\u1E04\u1E06\u0243\u0182\u0181]/g},
    {'base':'C', 'letters':/[\u0043\u24B8\uFF23\u0106\u0108\u010A\u010C\u00C7\u1E08\u0187\u023B\uA73E]/g},
    {'base':'D', 'letters':/[\u0044\u24B9\uFF24\u1E0A\u010E\u1E0C\u1E10\u1E12\u1E0E\u0110\u018B\u018A\u0189\uA779]/g},
    {'base':'DZ','letters':/[\u01F1\u01C4]/g},
    {'base':'Dz','letters':/[\u01F2\u01C5]/g},
    {'base':'E', 'letters':/[\u0045\u24BA\uFF25\u00C8\u00C9\u00CA\u1EC0\u1EBE\u1EC4\u1EC2\u1EBC\u0112\u1E14\u1E16\u0114\u0116\u00CB\u1EBA\u011A\u0204\u0206\u1EB8\u1EC6\u0228\u1E1C\u0118\u1E18\u1E1A\u0190\u018E]/g},
    {'base':'F', 'letters':/[\u0046\u24BB\uFF26\u1E1E\u0191\uA77B]/g},
    {'base':'G', 'letters':/[\u0047\u24BC\uFF27\u01F4\u011C\u1E20\u011E\u0120\u01E6\u0122\u01E4\u0193\uA7A0\uA77D\uA77E]/g},
    {'base':'H', 'letters':/[\u0048\u24BD\uFF28\u0124\u1E22\u1E26\u021E\u1E24\u1E28\u1E2A\u0126\u2C67\u2C75\uA78D]/g},
    {'base':'I', 'letters':/[\u0049\u24BE\uFF29\u00CC\u00CD\u00CE\u0128\u012A\u012C\u0130\u00CF\u1E2E\u1EC8\u01CF\u0208\u020A\u1ECA\u012E\u1E2C\u0197]/g},
    {'base':'J', 'letters':/[\u004A\u24BF\uFF2A\u0134\u0248]/g},
    {'base':'K', 'letters':/[\u004B\u24C0\uFF2B\u1E30\u01E8\u1E32\u0136\u1E34\u0198\u2C69\uA740\uA742\uA744\uA7A2]/g},
    {'base':'L', 'letters':/[\u004C\u24C1\uFF2C\u013F\u0139\u013D\u1E36\u1E38\u013B\u1E3C\u1E3A\u0141\u023D\u2C62\u2C60\uA748\uA746\uA780]/g},
    {'base':'LJ','letters':/[\u01C7]/g},
    {'base':'Lj','letters':/[\u01C8]/g},
    {'base':'M', 'letters':/[\u004D\u24C2\uFF2D\u1E3E\u1E40\u1E42\u2C6E\u019C]/g},
    {'base':'N', 'letters':/[\u004E\u24C3\uFF2E\u01F8\u0143\u00D1\u1E44\u0147\u1E46\u0145\u1E4A\u1E48\u0220\u019D\uA790\uA7A4]/g},
    {'base':'NJ','letters':/[\u01CA]/g},
    {'base':'Nj','letters':/[\u01CB]/g},
    {'base':'O', 'letters':/[\u004F\u24C4\uFF2F\u00D2\u00D3\u00D4\u1ED2\u1ED0\u1ED6\u1ED4\u00D5\u1E4C\u022C\u1E4E\u014C\u1E50\u1E52\u014E\u022E\u0230\u00D6\u022A\u1ECE\u0150\u01D1\u020C\u020E\u01A0\u1EDC\u1EDA\u1EE0\u1EDE\u1EE2\u1ECC\u1ED8\u01EA\u01EC\u00D8\u01FE\u0186\u019F\uA74A\uA74C]/g},
    {'base':'OI','letters':/[\u01A2]/g},
    {'base':'OO','letters':/[\uA74E]/g},
    {'base':'OU','letters':/[\u0222]/g},
    {'base':'P', 'letters':/[\u0050\u24C5\uFF30\u1E54\u1E56\u01A4\u2C63\uA750\uA752\uA754]/g},
    {'base':'Q', 'letters':/[\u0051\u24C6\uFF31\uA756\uA758\u024A]/g},
    {'base':'R', 'letters':/[\u0052\u24C7\uFF32\u0154\u1E58\u0158\u0210\u0212\u1E5A\u1E5C\u0156\u1E5E\u024C\u2C64\uA75A\uA7A6\uA782]/g},
    {'base':'S', 'letters':/[\u0053\u24C8\uFF33\u1E9E\u015A\u1E64\u015C\u1E60\u0160\u1E66\u1E62\u1E68\u0218\u015E\u2C7E\uA7A8\uA784]/g},
    {'base':'T', 'letters':/[\u0054\u24C9\uFF34\u1E6A\u0164\u1E6C\u021A\u0162\u1E70\u1E6E\u0166\u01AC\u01AE\u023E\uA786]/g},
    {'base':'TZ','letters':/[\uA728]/g},
    {'base':'U', 'letters':/[\u0055\u24CA\uFF35\u00D9\u00DA\u00DB\u0168\u1E78\u016A\u1E7A\u016C\u00DC\u01DB\u01D7\u01D5\u01D9\u1EE6\u016E\u0170\u01D3\u0214\u0216\u01AF\u1EEA\u1EE8\u1EEE\u1EEC\u1EF0\u1EE4\u1E72\u0172\u1E76\u1E74\u0244]/g},
    {'base':'V', 'letters':/[\u0056\u24CB\uFF36\u1E7C\u1E7E\u01B2\uA75E\u0245]/g},
    {'base':'VY','letters':/[\uA760]/g},
    {'base':'W', 'letters':/[\u0057\u24CC\uFF37\u1E80\u1E82\u0174\u1E86\u1E84\u1E88\u2C72]/g},
    {'base':'X', 'letters':/[\u0058\u24CD\uFF38\u1E8A\u1E8C]/g},
    {'base':'Y', 'letters':/[\u0059\u24CE\uFF39\u1EF2\u00DD\u0176\u1EF8\u0232\u1E8E\u0178\u1EF6\u1EF4\u01B3\u024E\u1EFE]/g},
    {'base':'Z', 'letters':/[\u005A\u24CF\uFF3A\u0179\u1E90\u017B\u017D\u1E92\u1E94\u01B5\u0224\u2C7F\u2C6B\uA762]/g},
    {'base':'a', 'letters':/[\u0061\u24D0\uFF41\u1E9A\u00E0\u00E1\u00E2\u1EA7\u1EA5\u1EAB\u1EA9\u00E3\u0101\u0103\u1EB1\u1EAF\u1EB5\u1EB3\u0227\u01E1\u00E4\u01DF\u1EA3\u00E5\u01FB\u01CE\u0201\u0203\u1EA1\u1EAD\u1EB7\u1E01\u0105\u2C65\u0250]/g},
    {'base':'aa','letters':/[\uA733]/g},
    {'base':'ae','letters':/[\u00E6\u01FD\u01E3]/g},
    {'base':'ao','letters':/[\uA735]/g},
    {'base':'au','letters':/[\uA737]/g},
    {'base':'av','letters':/[\uA739\uA73B]/g},
    {'base':'ay','letters':/[\uA73D]/g},
    {'base':'b', 'letters':/[\u0062\u24D1\uFF42\u1E03\u1E05\u1E07\u0180\u0183\u0253]/g},
    {'base':'c', 'letters':/[\u0063\u24D2\uFF43\u0107\u0109\u010B\u010D\u00E7\u1E09\u0188\u023C\uA73F\u2184]/g},
    {'base':'d', 'letters':/[\u0064\u24D3\uFF44\u1E0B\u010F\u1E0D\u1E11\u1E13\u1E0F\u0111\u018C\u0256\u0257\uA77A]/g},
    {'base':'dz','letters':/[\u01F3\u01C6]/g},
    {'base':'e', 'letters':/[\u0065\u24D4\uFF45\u00E8\u00E9\u00EA\u1EC1\u1EBF\u1EC5\u1EC3\u1EBD\u0113\u1E15\u1E17\u0115\u0117\u00EB\u1EBB\u011B\u0205\u0207\u1EB9\u1EC7\u0229\u1E1D\u0119\u1E19\u1E1B\u0247\u025B\u01DD]/g},
    {'base':'f', 'letters':/[\u0066\u24D5\uFF46\u1E1F\u0192\uA77C]/g},
    {'base':'g', 'letters':/[\u0067\u24D6\uFF47\u01F5\u011D\u1E21\u011F\u0121\u01E7\u0123\u01E5\u0260\uA7A1\u1D79\uA77F]/g},
    {'base':'h', 'letters':/[\u0068\u24D7\uFF48\u0125\u1E23\u1E27\u021F\u1E25\u1E29\u1E2B\u1E96\u0127\u2C68\u2C76\u0265]/g},
    {'base':'hv','letters':/[\u0195]/g},
    {'base':'i', 'letters':/[\u0069\u24D8\uFF49\u00EC\u00ED\u00EE\u0129\u012B\u012D\u00EF\u1E2F\u1EC9\u01D0\u0209\u020B\u1ECB\u012F\u1E2D\u0268\u0131]/g},
    {'base':'j', 'letters':/[\u006A\u24D9\uFF4A\u0135\u01F0\u0249]/g},
    {'base':'k', 'letters':/[\u006B\u24DA\uFF4B\u1E31\u01E9\u1E33\u0137\u1E35\u0199\u2C6A\uA741\uA743\uA745\uA7A3]/g},
    {'base':'l', 'letters':/[\u006C\u24DB\uFF4C\u0140\u013A\u013E\u1E37\u1E39\u013C\u1E3D\u1E3B\u017F\u0142\u019A\u026B\u2C61\uA749\uA781\uA747]/g},
    {'base':'lj','letters':/[\u01C9]/g},
    {'base':'m', 'letters':/[\u006D\u24DC\uFF4D\u1E3F\u1E41\u1E43\u0271\u026F]/g},
    {'base':'n', 'letters':/[\u006E\u24DD\uFF4E\u01F9\u0144\u00F1\u1E45\u0148\u1E47\u0146\u1E4B\u1E49\u019E\u0272\u0149\uA791\uA7A5]/g},
    {'base':'nj','letters':/[\u01CC]/g},
    {'base':'o', 'letters':/[\u006F\u24DE\uFF4F\u00F2\u00F3\u00F4\u1ED3\u1ED1\u1ED7\u1ED5\u00F5\u1E4D\u022D\u1E4F\u014D\u1E51\u1E53\u014F\u022F\u0231\u00F6\u022B\u1ECF\u0151\u01D2\u020D\u020F\u01A1\u1EDD\u1EDB\u1EE1\u1EDF\u1EE3\u1ECD\u1ED9\u01EB\u01ED\u00F8\u01FF\u0254\uA74B\uA74D\u0275]/g},
    {'base':'oi','letters':/[\u01A3]/g},
    {'base':'ou','letters':/[\u0223]/g},
    {'base':'oo','letters':/[\uA74F]/g},
    {'base':'p','letters':/[\u0070\u24DF\uFF50\u1E55\u1E57\u01A5\u1D7D\uA751\uA753\uA755]/g},
    {'base':'q','letters':/[\u0071\u24E0\uFF51\u024B\uA757\uA759]/g},
    {'base':'r','letters':/[\u0072\u24E1\uFF52\u0155\u1E59\u0159\u0211\u0213\u1E5B\u1E5D\u0157\u1E5F\u024D\u027D\uA75B\uA7A7\uA783]/g},
    {'base':'s','letters':/[\u0073\u24E2\uFF53\u00DF\u015B\u1E65\u015D\u1E61\u0161\u1E67\u1E63\u1E69\u0219\u015F\u023F\uA7A9\uA785\u1E9B]/g},
    {'base':'t','letters':/[\u0074\u24E3\uFF54\u1E6B\u1E97\u0165\u1E6D\u021B\u0163\u1E71\u1E6F\u0167\u01AD\u0288\u2C66\uA787]/g},
    {'base':'tz','letters':/[\uA729]/g},
    {'base':'u','letters':/[\u0075\u24E4\uFF55\u00F9\u00FA\u00FB\u0169\u1E79\u016B\u1E7B\u016D\u00FC\u01DC\u01D8\u01D6\u01DA\u1EE7\u016F\u0171\u01D4\u0215\u0217\u01B0\u1EEB\u1EE9\u1EEF\u1EED\u1EF1\u1EE5\u1E73\u0173\u1E77\u1E75\u0289]/g},
    {'base':'v','letters':/[\u0076\u24E5\uFF56\u1E7D\u1E7F\u028B\uA75F\u028C]/g},
    {'base':'vy','letters':/[\uA761]/g},
    {'base':'w','letters':/[\u0077\u24E6\uFF57\u1E81\u1E83\u0175\u1E87\u1E85\u1E98\u1E89\u2C73]/g},
    {'base':'x','letters':/[\u0078\u24E7\uFF58\u1E8B\u1E8D]/g},
    {'base':'y','letters':/[\u0079\u24E8\uFF59\u1EF3\u00FD\u0177\u1EF9\u0233\u1E8F\u00FF\u1EF7\u1E99\u1EF5\u01B4\u024F\u1EFF]/g},
    {'base':'z','letters':/[\u007A\u24E9\uFF5A\u017A\u1E91\u017C\u017E\u1E93\u1E95\u01B6\u0225\u0240\u2C6C\uA763]/g}
];
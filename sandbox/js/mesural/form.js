var URL_root = window.location.href.match(/http\:\/\/[^\/]+/);

$("document").ready(function () {
    i_ivwanashowlimit();
});


function i_ivwanashowlimit()
{
    if ($("#text-limit").length > 0)
    {
        var count = 0;
        var t = $("#text-limit");

        while ((t.length == 0) || (t[0].nodeType != 1 && count < 4) || (t[0].nodeName != "TEXTAREA" && count < 4))
        {
            if (t.prev().length > 0) {
                t = t.prev();
            } else {
                t = t.parent();
            }
            count++;
        }

        if (t.length > 0 && t[0].nodeName == "TEXTAREA")
        {
            var max = $("#text-limit").html().match(/([^\d]*)([0-9]*)([\s\S]*)/);
            t.keypress(function () {
                if ((parseInt(max[2]) - t.val().length) < 1) {
                    return false;
                }
            });

            t.keyup(function () {
                if ((parseInt(max[2]) - t.val().length) < 1) {
                    t.val(t.val().substr(0, parseInt(max[2])));
                }
                $("#text-limit").html(max[1] + (parseInt(max[2]) - t.val().length) + max[3]);
            });
        }
    }
}

function validateEmail(language) {
    var emailReg = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    var msg = "";

    if (language == 'en') {
        msg = "Please enter a valid email address.";
    } else {
        msg = "S.V.P. entrez une adresse courriel valide.";
    }

    if (!emailReg.test($('#user_email').val())) {
        alert(msg);
        return false;
    } else {
        return true;
    }
}

function compare_pwds(language) {
    var pwd_first = $('#user_pass').val();
    var pwd_confirm = $('#confirm_user_pass').val();
    var msg = "";

    if (language == 'en') {
        msg = "Please make sure that the contents of both password fields are the same.";
    } else {
        msg = "S.V.P. assurez-vous que le contenu des deux champs sont identiques.";
    }

    if (pwd_first != pwd_confirm) {
        alert(msg);
        return false;
    }
    return true;
}

function check(p_form)
{
    var element = p_form.elements;
    var url = $(p_form).attr("action");
    var completed = true;

    $(p_form).find(".mandatory").each(function() {
        var value = false;

        switch($(this).prop("type").toLowerCase()) {
            case "radio":
            case "checkbox":
                    var name = $(this).attr("name").match(/([^\[]+)(\[[0-9]*\])?/)[1];
                    value = $(this).parents('form:first').find("input[name^='" + name + "']:checked").val();
                break;
            default:
                    value = $(this).val();
                break;
        }

        if ($(this).attr("name") === "email") {
            value = isRFC822ValidEmail($(this).val());
        }
        if (value !== strip_tags(value)) {
            console.log(value + " " + strip_tags(value));
            value = false;
        }

        if (completed) {
            completed = value;
        }

        i_ivwanaCheckHighlight($(this), value);
    });

    if (completed) {
        var data = $(p_form).serialize() + "&js=1";
        
        for (var x = 0; x < element.length; x++) {
            //element[x].disabled = "disabled";
        }

        i_ivwanaajax(url, data, function (response) {
			console.log(response);
            if (response.substr(0, 1) === "1") {
                window.location = "?success";
                return true;
            } else {
                try {
                    console.log(response);
                } catch(err) {
                }
                window.location = "?error";
            }

            if (document.getElementById("form_loading")) {
                document.getElementById("form_loading").style.display = "none";
            }
        });
    }

    return false;
}

function i_ivwanaCheckHighlight(p_node, p_isFilled) {
    var target = p_node.prevUntil('input,select,textarea', 'label:first,h3:first,h6:first');
        
    if (target.length === 0) {
        target = p_node.parents('div:first,h3:first,h6:first');
    }

    if (target.length > 0) {
        if (!p_isFilled) {
            target.css("color", "#C1272D");
        } else {
            target.css("color", "");
        }
    }
}

function i_ivwanaajax(p_url, p_data, p_callback)
{
    if (window.XMLHttpRequest) {
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType)
            http_request.overrideMimeType('text/html');
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

    http_request.onreadystatechange = function checkforresults() {
        if (this.readyState === 4 && this.status === 200) {
            p_callback(this.responseText);
        }
    };

    http_request.open('POST', p_url, true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send(p_data);

    return true;
}

var stripAccents = function ()
{
    var transl = {};
    var in_chrs = 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ';
    var out_chrs = 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY';
    var chars_rgx = new RegExp('[' + in_chrs + ']', 'g');
    var lookup = function (m) {
        return transl[m] || m;
    };

    for (var i = 0; i < in_chrs.length; i++)
        transl[ in_chrs[i] ] = out_chrs[i];

    return function (s) {
        return s.replace(chars_rgx, lookup);
    };
};

function isRFC822ValidEmail(p_email)
{
    var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
    var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
    var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
    var sQuotedPair = '\\x5c[\\x00-\\x7f]';
    var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
    var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
    var sDomain_ref = sAtom;
    var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
    var sWord = '(' + sAtom + '|' + sQuotedString + ')';
    var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
    var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
    var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
    var sValidEmail = '^' + sAddrSpec + '$'; // as whole string
    var reValidEmail = new RegExp(sValidEmail);

    if (reValidEmail.test(p_email)) {
        return true;
    }

    return false;
}

function strip_tags (input, allowed) { // eslint-disable-line camelcase
  //  discuss at: http://locutus.io/php/strip_tags/
  // original by: Kevin van Zonneveld (http://kvz.io)
  // improved by: Luke Godfrey
  // improved by: Kevin van Zonneveld (http://kvz.io)
  //    input by: Pul
  //    input by: Alex
  //    input by: Marc Palau
  //    input by: Brett Zamir (http://brett-zamir.me)
  //    input by: Bobby Drake
  //    input by: Evertjan Garretsen
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Eric Nagel
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Tomasz Wesolowski
  //  revised by: Rafał Kukawski (http://blog.kukawski.pl)
  //   example 1: strip_tags('<p>Kevin</p> <br /><b>van</b> <i>Zonneveld</i>', '<i><b>')
  //   returns 1: 'Kevin <b>van</b> <i>Zonneveld</i>'
  //   example 2: strip_tags('<p>Kevin <img src="someimage.png" onmouseover="someFunction()">van <i>Zonneveld</i></p>', '<p>')
  //   returns 2: '<p>Kevin van Zonneveld</p>'
  //   example 3: strip_tags("<a href='http://kvz.io'>Kevin van Zonneveld</a>", "<a>")
  //   returns 3: "<a href='http://kvz.io'>Kevin van Zonneveld</a>"
  //   example 4: strip_tags('1 < 5 5 > 1')
  //   returns 4: '1 < 5 5 > 1'
  //   example 5: strip_tags('1 <br/> 1')
  //   returns 5: '1  1'
  //   example 6: strip_tags('1 <br/> 1', '<br>')
  //   returns 6: '1 <br/> 1'
  //   example 7: strip_tags('1 <br/> 1', '<br><br/>')
  //   returns 7: '1 <br/> 1'

  // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
  allowed = (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('')

  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi
  var commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi
  
  if (typeof input !== "string") {
      return input;
  }

  return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
    return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : ''
  });
}

function sendCopernicPromo(p_form, p_productName)
{
    var nopromoform = 0;
    var radio = p_form.elements;

    if (isRFC822ValidEmail(p_form.elements["email"].value))
    {

        var sellang = document.forms[p_form.name].elements["form"];
        var selId = undefined;

        if (sellang.length) {
            for (var i = 0; i < sellang.length; i++) {
                if (sellang[i].checked) {
                    selId = sellang[i].value;
                    break;
                }
            }
        } else {
            selId = sellang.value;
        }

        var poststr = "form=" + selId + "&email=" + encodeURIComponent(p_form.elements["email"].value) + "&pid=1&lid=" + listId;
        var url = location.protocol + "//" + location.hostname;

        if (location.port != "80")
            url += ":" + location.port;

        i_ivwanaajax(url + "/widget/copernicpromo.php?js=1", poststr, function(response) {
            switch (response)
            {
                case "success":
                    document.getElementById('error').style.display = 'none';
                    if (document.getElementById('success')) {
                        document.getElementById('success').style.display = "block";
                    }
                    if (p_productName && p_productName.length > 0) {
                        pageTracker._trackEvent('Download Form', p_productName, p_form.elements["form"].lang);
                    }
                    break;
                case "ready":
                case "success":
                    document.getElementById('error').style.display = 'none';
                    if (document.getElementById('ready')) {
                        document.getElementById('ready').style.display = 'block';
                    }
                    break;
                case "error":
                    alert("Please enter a valid e-mail address.");
                    document.getElementById('error').style.display = 'block';
                    break;
                default:
                    alert("An error occured.");
                    document.getElementById('error').style.display = 'block';
                    break;
            }
        });
    } else {
        alert("Please enter a valid e-mail address.");
    }

    return false;
}
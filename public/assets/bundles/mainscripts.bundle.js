function initSparkline() {
    $(".sparkline").each(function() {
        var a = $(this);
        a.sparkline("html", a.data())
    })
}

function initCounters() {
    $(".count-to").countTo()
}

function skinChanger() {
    $(".right-sidebar .choose-skin li").on("click", function() {
        var a = $("body"),
            b = $(this),
            c = $(".right-sidebar .choose-skin li.active").data("theme");
        $(".right-sidebar .choose-skin li").removeClass("active"), a.removeClass("theme-" + c), b.addClass("active"), a.addClass("theme-" + b.data("theme"))
    })
}

function CustomScrollbar() {
    $(".sidebar .menu .list").slimscroll({
        height: "calc(100vh - 60px)",
        color: "rgba(0,0,0,0.2)",
        position: "left",
        size: "2px",
        alwaysVisible: !1,
        borderRadius: "3px",
        railBorderRadius: "0"
    }), $(".navbar-left .dropdown-menu .body .menu").slimscroll({
        height: "300px",
        color: "rgba(0,0,0,0.2)",
        size: "3px",
        alwaysVisible: !1,
        borderRadius: "3px",
        railBorderRadius: "0"
    }), $(".chat-widget").slimscroll({
        height: "300px",
        color: "rgba(0,0,0,0.4)",
        size: "2px",
        alwaysVisible: !1,
        borderRadius: "3px",
        railBorderRadius: "2px"
    }), $(".right-sidebar .slim_scroll").slimscroll({
        height: "calc(100vh - 60px)",
        color: "rgba(0,0,0,0.4)",
        size: "2px",
        alwaysVisible: !1,
        borderRadius: "3px",
        railBorderRadius: "0"
    })
}
if ("undefined" == typeof jQuery) throw new Error("jQuery plugins need to be before this file");
$.AdminOreo = {}, $.AdminOreo.options = {
    colors: {
        red: "#ec3b57",
        pink: "#E91E63",
        purple: "#ba3bd0",
        deepPurple: "#673AB7",
        indigo: "#3F51B5",
        blue: "#2196f3",
        lightBlue: "#03A9F4",
        cyan: "#00bcd4",
        green: "#4CAF50",
        lightGreen: "#8BC34A",
        yellow: "#ffe821",
        orange: "#FF9800",
        deepOrange: "#f83600",
        grey: "#9E9E9E",
        blueGrey: "#607D8B",
        black: "#000000",
        blush: "#dd5e89",
        white: "#ffffff"
    },
    leftSideBar: {
        scrollColor: "rgba(0,0,0,0.5)",
        scrollWidth: "4px",
        scrollAlwaysVisible: !1,
        scrollBorderRadius: "0",
        scrollRailBorderRadius: "0"
    },
    dropdownMenu: {
        effectIn: "fadeIn",
        effectOut: "fadeOut"
    }
}, $.AdminOreo.leftSideBar = {
    activate: function() {
        var a = this,
            b = $("body"),
            c = $(".overlay");
        $(window).on("click", function(d) {
            var e = $(d.target);
            "i" === d.target.nodeName.toLowerCase() && (e = $(d.target).parent()), !e.hasClass("bars") && a.isOpen() && 0 === e.parents("#leftsidebar").length && (e.hasClass("js-right-sidebar") || c.fadeOut(), b.removeClass("overlay-open"))
        }), $.each($(".menu-toggle.toggled"), function(a, b) {
            $(b).next().slideToggle(0)
        }), $.each($(".menu .list li.active"), function(a, b) {
            var c = $(b).find("a:eq(0)");
            c.addClass("toggled"), c.next().show()
        }), $(".menu-toggle").on("click", function(a) {
            var b = $(this),
                c = b.next();
            if ($(b.parents("ul")[0]).hasClass("list")) {
                var d = $(a.target).hasClass("menu-toggle") ? a.target : $(a.target).parents(".menu-toggle");
                $.each($(".menu-toggle.toggled").not(d).next(), function(a, b) {
                    $(b).is(":visible") && ($(b).prev().toggleClass("toggled"), $(b).slideUp())
                })
            }
            b.toggleClass("toggled"), c.slideToggle(320)
        }), a.checkStatuForResize(!0), $(window).resize(function() {
            a.checkStatuForResize(!1)
        }), Waves.attach(".menu .list a", ["waves-block"]), Waves.init()
    },
    checkStatuForResize: function(a) {
        var b = $("body"),
            c = $(".navbar .navbar-header .bars"),
            d = b.width();
        a && b.find(".content, .sidebar").addClass("no-animate").delay(1e3).queue(function() {
            $(this).removeClass("no-animate").dequeue()
        }), d < 1170 ? (b.addClass("ls-closed"), c.fadeIn()) : (b.removeClass("ls-closed"), c.fadeOut())
    },
    isOpen: function() {
        return $("body").hasClass("overlay-open")
    }
}, $.AdminOreo.rightSideBar = {
    activate: function() {
        var a = this,
            b = $("#rightsidebar"),
            c = $(".overlay");
        $(window).on("click", function(d) {
            var e = $(d.target);
            "i" === d.target.nodeName.toLowerCase() && (e = $(d.target).parent()), !e.hasClass("js-right-sidebar") && a.isOpen() && 0 === e.parents("#rightsidebar").length && (e.hasClass("bars") || c.fadeOut(), b.removeClass("open"))
        }), $(".js-right-sidebar").on("click", function() {
            b.toggleClass("open"), a.isOpen() ? c.fadeIn() : c.fadeOut()
        })
    },
    isOpen: function() {
        return $(".right-sidebar").hasClass("open")
    }
}, $.AdminOreo.navbar = {
    activate: function() {
        var a = $("body"),
            b = $(".overlay");
        $(".bars").on("click", function() {
            a.toggleClass("overlay-open"), a.hasClass("overlay-open") ? b.fadeIn() : b.fadeOut()
        }), $('.nav [data-close="true"]').on("click", function() {
            var a = $(".navbar-toggle").is(":visible"),
                b = $(".navbar-collapse");
            a && b.slideUp(function() {
                b.removeClass("in").removeAttr("style")
            })
        })
    }
}, $.AdminOreo.select = {
    activate: function() {
        $.fn.selectpicker && $("select:not(.ms)").selectpicker()
    }
}, $(".boxs-close").on("click", function() {
    $(this).parents(".card").addClass("closed").fadeOut()
});
var edge = "Microsoft Edge",
    ie10 = "Internet Explorer 10",
    ie11 = "Internet Explorer 11",
    opera = "Opera",
    firefox = "Mozilla Firefox",
    chrome = "Google Chrome",
    safari = "Safari";
$.AdminOreo.browser = {
    activate: function() {
        var a = this;
        "" !== a.getClassName() && $("html").addClass(a.getClassName())
    },
    getBrowser: function() {
        var a = navigator.userAgent.toLowerCase();
        return /edge/i.test(a) ? edge : /rv:11/i.test(a) ? ie11 : /msie 10/i.test(a) ? ie10 : /opr/i.test(a) ? opera : /chrome/i.test(a) ? chrome : /firefox/i.test(a) ? firefox : navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) ? safari : void 0
    },
    getClassName: function() {
        var a = this.getBrowser();
        return a === edge ? "edge" : a === ie11 ? "ie11" : a === ie10 ? "ie10" : a === opera ? "opera" : a === chrome ? "chrome" : a === firefox ? "firefox" : a === safari ? "safari" : ""
    }
}, $(function() {
    $.AdminOreo.browser.activate(), $.AdminOreo.leftSideBar.activate(), $.AdminOreo.rightSideBar.activate(), $.AdminOreo.navbar.activate(), $.AdminOreo.select.activate(), setTimeout(function() {
        $(".page-loader-wrapper").fadeOut()
    }, 50)
}), $(function() {
    "use strict";
    skinChanger(), CustomScrollbar(), initSparkline(), initCounters()
}), $(".theme-light-dark .t-light").on("click", function() {
    $("body").removeClass("menu_dark")
}), $(".theme-light-dark .t-dark").on("click", function() {
    $("body").addClass("menu_dark")
}), $(".m_img_btn").on("click", function() {
    $("body").toggleClass("menu_img")
}), $(".ls-toggle-btn").on("click", function() {
    $("body").toggleClass("ls-toggle-menu")
}), $(function() {
    $(".chat-launcher").on("click", function() {
        $(".chat-launcher").toggleClass("active"), $(".chat-wrapper").toggleClass("is-open pullUp")
    })
}), $(".form-control").on("focus", function() {
    $(this).parent(".input-group").addClass("input-group-focus")
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus")
}), $(function() {
    "use strict";

    function a() {
        var a = screenfull.element;
        $("#status").text("Is fullscreen: " + screenfull.isFullscreen), a && $("#element").text("Element: " + a.localName + (a.id ? "#" + a.id : "")), screenfull.isFullscreen || ($("#external-iframe").remove(), document.body.style.overflow = "auto")
    }
    if ($("#supported").text("Supported/allowed: " + !!screenfull.enabled), !screenfull.enabled) return !1;
    $("#request").on("click", function() {
        screenfull.request($("#container")[0])
    }), $("#exit").on("click", function() {
        screenfull.exit()
    }), $('[data-provide~="boxfull"]').on("click", function() {
        screenfull.toggle($(".box")[0])
    }), $('[data-provide~="fullscreen"]').on("click", function() {
        screenfull.toggle($("#container")[0])
    });
    var b = '[data-provide~="boxfull"]',
        b = '[data-provide~="fullscreen"]';
    $(b).each(function() {
        $(this).data("fullscreen-default-html", $(this).html())
    }), document.addEventListener(screenfull.raw.fullscreenchange, function() {
        screenfull.isFullscreen ? $(b).each(function() {
            $(this).addClass("is-fullscreen")
        }) : $(b).each(function() {
            $(this).removeClass("is-fullscreen")
        })
    }), screenfull.on("change", a), a()
});
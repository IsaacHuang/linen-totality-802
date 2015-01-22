<script>
/*! Copyright (C) Neave Interactive, neave.com | glfx.js Copyright (C) Evan Wallace, github.com/evanw/glfx.js */
var WebcamToy = {};
if (!window.console ||!console.log) {
    window.console = {
        log: function() {},
        error: function() {}
    }
}(function(d, e, j, h, f, c, b) {
    d.GoogleAnalyticsObject = f;
    d[f] = d[f] || function() {
        (d[f].q = d[f].q || []).push(arguments)
    }, d[f].l = 1 * new Date();
    c = e.createElement(j), b = e.getElementsByTagName(j)[0];
    c.async = 1;
    c.src = h;
    b.parentNode.insertBefore(c, b)
})(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
ga("create", "UA-56095-9", "auto");
ga("send", "pageview");
(function(o) {
    var k = [], c = new Date().getTime(), l = false, d = false, m = false, E = $("body").hasClass("home"), s, x = false, D = "", e = 0, i = "", I = $("#toy"), w = $("#toy-intro"), G = $("#app"), p = $("#button-start");
    function v(M) {
        if (window.$) {
            $("#toy-intro>p").hide();
            $("#prompt-" + M).show()
        }
    }
    o.showAccess = function(M) {
        if (!window.$ || M&&!o.ua.chrome) {
            return 
        }
        $("#content").css("top", 0);
        $("header,#head-sponsor,#toy-intro footer").hide();
        $("#infobar-stripe").show();
        $("#app").css("top", 14);
        w.addClass("bg-access")
    };
    o.hideAccess = function(M) {
        if (!window.$ || M&&!o.ua.chrome) {
            return 
        }
        $("#content").css("top", 50);
        $("header,#head-sponsor").show();
        $("#infobar-stripe").hide();
        $("#app").css("top", "");
        w.removeClass("bg-access")
    };
    o.addScript = function(Q) {
        var P = document, M = "script", O = P.createElement(M), N = $(M)[0];
        O.src = Q;
        O.async = true;
        N.parentNode.insertBefore(O, N)
    };
    function u() {
        var N = o.log();
        try {
            if (N.length > 0) {
                var O = new Date().toUTCString() + ", V" + o.version;
                if (!E) {
                    O += " App"
                }
                localStorage.setItem("log", O + "\n" + N)
            }
        } catch (M) {}
    }
    o.log = function() {
        var O = new Date().getTime() - c, M = arguments[0], N;
        if (arguments.length === 0) {
            return k.join("\n")
        } else {
            if (arguments.length > 1 && arguments[0] === "Loader" && arguments[1] === "Init") {
                x = true
            }
        }
        for (N = 1; N < arguments.length; N++) {
            if (arguments[N] || arguments[N] === 0) {
                M += " " + arguments[N]
            }
        }
        k.push(O + " " + M);
        if (k.length > 60) {
            if (k[40] === "...") {
                k.splice(41, 1)
            } else {
                k.splice(40, 1, "...")
            }
        }
        if (arguments[0] === "*ERROR*") {
            u()
        }
    };
    o.trackEvent = function(O, P, M, N) {
        try {
            ga("send", "event", O, P, M, N ? 1 : undefined, {
                nonInteraction: N
            })
        } catch (Q) {}
    };
    function r(N, M) {
        if (N) {
            D += N + "<br>";
            if (w.is(":visible")) {
                $("#toy-intro footer").show();
                $("#footer-message").html(D)
            }
            if (!o.Services.isHosted) {
                console.error("" + N, M)
            }
            if (D && /context|Effects not/.test(D)) {
                m = true;
                M = M || i
            }
            o.trackEvent("Error", "" + N, M, true);
            o.log("*ERROR*", "" + N, M)
        }
    }
    o.error = function(N, M) {
        if (w.is(":visible")) {
            w.removeClass("wait");
            $("#toy-intro>p,#button-start,#footer-check").hide();
            v("error");
            if (!o.ua.mobile) {
                $("#button-start-flash").css("display", "inline-block")
            }
        }
        o.hideAccess();
        r(N, M)
    };
    function t() {
        return !!window.swfobject && swfobject.getObjectById("app-flash")
    }
    function z(M, N) {
        o.Services.facebookAlbum(function(P, O, R) {
            var Q = t();
            if (Q) {
                if (Q.setFacebookAlbumURL) {
                    Q.setFacebookAlbumURL(P)
                }
                if (Q.setFacebookAlbumPrivacy) {
                    Q.setFacebookAlbumPrivacy(O)
                }
                if (Q.setFacebookAlbumID) {
                    Q.setFacebookAlbumID(R)
                }
            }
        }, M, N)
    }
    function f(M) {
        var N = t();
        if (N && N.setFacebookToken) {
            N.setFacebookToken(M)
        }
    }
    function q(N) {
        var M = t();
        if (M && M.setFacebookUser) {
            M.setFacebookUser(N.fullName)
        }
    }
    function B(N, O, M) {
        var P = t();
        if (P && P.setTwitterUser) {
            P.setTwitterUser(N, O, M)
        }
    }
    function J(N, O, M) {
        var P = t();
        if (P && P.setTumblrUser) {
            P.setTumblrUser(N, O, M)
        }
    }
    function C(M, N) {
        var O = t();
        if (O && O.setVKUser) {
            O.setVKUser(M, N)
        }
    }
    function L(N) {
        var M = t();
        if (M && M.setVKAlbum) {
            M.setVKAlbum(N)
        }
    }
    function H() {
        if (window.$) {
            $("#home").remove()
        }
        delete o.Home;
        E = false
    }
    function h() {
        var O = $("#app-no-flash a,#home-no-flash a");
        if (o.ua.chrome) {
            O.attr("href", o.ua.chromeVersion > 11 ? "https://support.google.com/chrome/answer/108086?hl=" + (navigator.userLanguage || navigator.language || o.ua.locale) : "http://www.google.com/chrome")
        } else {
            if (o.ua.ie&&!o.ua.ieOld && typeof window.external.msActiveXFilteringEnabled !== "undefined" && external.msActiveXFilteringEnabled()) {
                var M = o.ua.locale || "en", Q = M + "-" + M.toUpperCase();
                switch (M) {
                case"en":
                    Q = "en-US";
                    break;
                case"cs":
                    Q = "cs-CZ";
                    break;
                case"da":
                    Q = "da-DK";
                    break;
                case"el":
                    Q = "el-GR";
                    break;
                case"es":
                    Q = "es-XL";
                    break;
                case"ja":
                    Q = "ja-JP";
                    break;
                case"nb":
                    Q = "nb-NO";
                    break;
                case"pt":
                    if (navigator.userLanguage === "pt-PT") {
                        Q = "pt-PT"
                    } else {
                        Q = "pt-BR"
                    }
                    break;
                case"sr":
                    Q = "sr-latn-RS";
                    break;
                case"sv":
                    Q = "sv-SE";
                    break;
                case"zh":
                    Q = "zh-CN";
                    break
                }
                O.attr("href", "http://windows.microsoft.com/" + Q + "/internet-explorer/use-activex-filtering").text(O.eq(0).text().replace(/Adobe.Flash.Player/, "ActiveX"))
            }
        }
        if (E) {
            $("#home-main,#button-init").hide();
            $("#home-no-flash").removeClass("hidden")
        } else {
            $("#toy-intro>p,#toy-intro footer,#button-start").hide();
            $("#app-no-flash").show();
            I.addClass("bg-toy")
        }
        var N;
        try {
            if (!!window.swfobject && swfobject.getFlashPlayerVersion) {
                N = swfobject.getFlashPlayerVersion();
                N = N.major + "." + N.minor + "." + N.release
            }
        } catch (R) {}
        var P = "Flash not available";
        o.trackEvent("Error", P, N, true);
        o.log("*ERROR*", P, N)
    }
    function g(M) {
        if (!("localStorage" in window) || window.localStorage === null) {
            return - 1
        }
        if (M && M > 0) {
            try {
                localStorage.setItem("saveCount", M);
                return M
            } catch (N) {}
        } else {
            try {
                return parseInt(localStorage.getItem("saveCount"), 10) || 1
            } catch (N) {}
        }
        return - 1
    }
    function F() {
        o.log("Init Flash");
        if (d) {
            I.hide();
            G.show().append('<div id="app-flash"></div>').show();
            if (!o.ua.ieOld) {
                jQuery(document).on("visibilitychange webkitvisibilitychange mozvisibilitychange", function() {
                    o.log("App", (document.hidden || document.webkitHidden || document.mozHidden) ? "hidden" : "visible");
                    u()
                })
            }
            o.Services.flashFacebookAlbum = z;
            o.Services.onFacebookAuth = f;
            o.Services.onFacebookUser = q;
            o.Services.onTwitterAuth = B;
            o.Services.onTumblrAuth = J;
            o.Services.onVKAuth = C;
            o.Services.onVKAlbum = L;
            o.Services.flashSaveCount = g;
            setTimeout(function() {
                if (!x) {
                    var M = t();
                    if (!M || M&&!M.eitest) {
                        $("#app-flash").hide();
                        I.show().addClass("bg-toy");
                        $("#footer-message").show();
                        o.error("Flash not loaded", s)
                    }
                }
            }, 6000);
            swfobject.createSWF({
                data: s,
                width: "100%",
                height: "100%"
            }, {
                base: "/assets/flash/",
                bgcolor: "#000000",
                allowfullscreen: "true",
                allowscriptaccess: "always",
                flashvars: "embed=1&infobar=" + (o.ua.chromeVersion > 26 ? 1 : 0) + "&fbver=" + o.Services.facebookVersion + "&shaderscale=" + (swfobject.hasFlashPlayerVersion("11.8.0") ? (o.ua.mac ? 0.5 : 0.4) : 1) + "&lang=" + (navigator.userLanguage || navigator.language || "en").toLowerCase() + "&v=" + (I.attr("data-swf-main") || 1)
            }, "app-flash")
        } else {
            h()
        }
        H()
    }
    function a(M) {
        d=!!window.swfobject && swfobject.hasFlashPlayerVersion(o.ua.mac ? "10.3.183" : "10.1.0");
        s = "/assets/flash/loader-" + o.ua.locale + "." + (I.attr("data-swf-loader") || 1) + ".swf";
        if (M) {
            F();
            return 
        }
        if (E) {
            if (d) {
                $.get(s)
            } else {
                h()
            }
        } else {
            F()
        }
    }
    function n(N) {
        if (o.ua.mobile || o.ua.tablet) {
            return 
        }
        if (!!window.swfobject) {
            a(N);
            return 
        }
        var M = o.Services.assetsURL + "js/libs/swfobject.2.2.js";
        $.ajax({
            url: M,
            dataType: "script",
            cache: true,
            timeout: 12000,
            error: function(Q, P, O) {
                o.addScript(M);
                setTimeout(function() {
                    if (!!window.swfobject) {
                        a(N)
                    } else {
                        o.trackEvent("Error", "swfobject", O || P, true);
                        n(N)
                    }
                }, 6000)
            },
            success: function(O) {
                a(N)
            }
        })
    }
    function y() {
        o.log("Start HTML5");
        if (!o.Capabilities.webGL) {
            o.error("WebGL not enabled", i);
            return 
        }
        o.showAccess();
        p.hide();
        v("access" + (o.ua.chrome&&!o.ua.mobile ? "-above" : ""));
        o.Camera.getCamera(function(N, M, O) {
            if (O) {
                o.error(O, M);
                return 
            }
            i = M || "";
            o.trackEvent("Capabilities", "Camera", i, true);
            if (D.length > 0) {
                o.trackEvent("Error", "Camera error recovered", "", true)
            }
            o.log("Camera accessed", i);
            o.hideAccess();
            p.hide();
            v("loading");
            $("#footer-check").hide();
            $("#toy-intro footer").fadeOut(150, function() {
                w.addClass("wait");
                if (!o.ua.mobile) {
                    o.Audio.loadAudio()
                }
                o.Effect.loadImages(function() {
                    o.log("Images loaded");
                    o.Effect.loadEffects(function() {
                        o.log("Effects loaded");
                        try {
                            localStorage.removeItem("forceFlash")
                        } catch (P) {}
                        setTimeout(function() {
                            o.UI.init(N)
                        }, 150)
                    }, function(P) {
                        o.error("Effects not loaded", P)
                    })
                }, function(P) {
                    o.error("Images not loaded", P)
                })
            })
        }, function(M) {
            o.hideAccess();
            if (M) {
                D = "";
                r(M, i)
            }
            if (e < 2) {
                e++;
                v("request-error");
                $("#footer-check").show();
                p.show()
            } else {
                D = "";
                o.error("Camera not found", i)
            }
        })
    }
    function K() {
        o.log("Init HTML5");
        if (o.ua.mobile) {
            $("header,#mobile-sponsor").remove();
            $("#content").css({
                top: 0,
                bottom: 0
            })
        }
        I.addClass("bg-toy");
        $("#prompt-request,#footer-message").show();
        $("#prompt-error").hide();
        p.removeClass("hidden").buttonClick(y);
        $("#prompt-request-error a,#button-start-flash").click(function(N) {
            if (N) {
                N.preventDefault()
            }
            if (m && o.Capabilities.localStorage) {
                try {
                    localStorage.setItem("forceFlash", "1");
                    o.trackEvent("Capabilities", "ForceFlash", "true", true);
                    o.log("ForceFlash")
                } catch (M) {}
            }
            n(true)
        });
        G.fadeIn(150);
        H()
    }
    o.init = function() {
        if (l) {
            K()
        } else {
            n(true)
        }
        delete o.init
    };
    o.popup = function(T, N, U, R, O) {
        U = U || 600;
        R = R || 310;
        var V = window.screenX || 0, Q = V ? $(window).width(): screen.availWidth, S = window.screenY || 0, M = S ? $(window).height(): screen.availHeight, P = V + (Q - U) / 2, W = S + (M - R) / 2;
        window.open(N || (T && (T.target.href || T.currentTarget.href)), "webcamtoy" + (O || "window"), "resizable=yes,toolbar=no,scrollbars=yes,status=no,width=" + U + ",height=" + R + ",left=" + P + ",top=" + W);
        if (T) {
            T.preventDefault()
        }
    };
    function b() {
        $("#head-social .twitter").fadeIn(250);
        $("#head-social .twitter a").click(function(M) {
            o.popup(M, "https://twitter.com/intent/tweet?url=" + encodeURIComponent($(this).attr("data-url")) + "&text=" + encodeURIComponent($(this).attr("data-text")) + "&related=" + $(this).attr("data-related") + "&lang=" + $(this).attr("data-lang"));
            $(this).off("click").removeAttr("href").addClass("inactive")
        })
    }
    function A() {
        $("#head-social .vk-share").fadeIn(250);
        $("#head-social .vk-share a").click(function(M) {
            o.popup(M);
            $(this).off("click").removeAttr("href").addClass("inactive")
        })
    }
    function j(N) {
        var O = document.cookie.split("; ");
        for (var M = 0, P; P = O[M] && O[M].split("="); M++) {
            if (decodeURIComponent(P[0]) === N) {
                return decodeURIComponent(P[1] || "")
            }
        }
        return ""
    }
    jQuery(document).ready(function() {
        window.onerror = function(ac, ab, aa) {
            if (ac&&!(/Script error|Access is denied\.|disconnected port|: a is null|freecorder|TopLine|NPObject|dpQuery/.test(ac))) {
                o.trackEvent("Error", ac, ab && aa ? ("[" + ab + ":" + aa + "]") : "", true);
                o.log("*ERROR*", ac)
            }
            return false
        };
        if (location.pathname === "/contact/") {
            return 
        }
        if ($("html").attr("manifest")&&!E) {
            var Q = j("webcamtoy").split("=")[1], V = (navigator.userLanguage || navigator.language || "en"), R = V.substr(0, 2), N = top.location.search, Z = {
                bg: "/bg/",
                cs: "/cs/",
                da: "/da/",
                de: "/de/",
                el: "/el/",
                en: "/",
                es: "/es/",
                fi: "/fi/",
                fr: "/fr/",
                hr: "/hr/",
                hu: "/hu/",
                id: "/id/",
                it: "/it/",
                ja: "/ja/",
                lt: "/lt/",
                lv: "/lv/",
                nb: "/nb/",
                nl: "/nl/",
                pl: "/pl/",
                pt: "/pt/",
                ro: "/ro/",
                ru: "/ru/",
                sk: "/sk/",
                sr: "/sr/",
                sv: "/sv/",
                th: "/th/",
                tr: "/tr/",
                zh: "/zh/"
            };
            if (/ca/.test(R)) {
                R = "es"
            } else {
                if (/nn|no/.test(R)) {
                    R = "nb"
                } else {
                    if (/be|kk|ky|uk/.test(R)) {
                        R = "ru"
                    }
                }
            }
            if (!(/utm_medium=speeddial/.test(N))) {
                N = ""
            }
            var O = Z[Q] + "app/" + N, X = Z[R] + "app/" + N, T = window.applicationCache;
            if (T) {
                $(T).on("updateready", function() {
                    if (T.status === T.UPDATEREADY) {
                        T.swapCache();
                        location.reload()
                    }
                }).on("cached error noupdate", function() {
                    if (Q) {
                        if (Q !== o.ua.locale && Z[Q]) {
                            top.location.href = O
                        }
                    } else {
                        if (R && R !== o.ua.locale && Z[R]) {
                            top.location.href = X
                        }
                    }
                })
            } else {
                if (Q) {
                    if (Q !== o.ua.locale && Z[Q]) {
                        top.location.href = O;
                        return 
                    }
                } else {
                    if (R && R !== o.ua.locale && Z[R]) {
                        top.location.href = X;
                        return 
                    }
                }
            }
        }
        if (window.location !== window.top.location ||!o.Services.isHosted&&!o.ua.mobile&&!I.attr("data-dev")) {
            top.location.href = "http://webcamtoy.com/";
            return 
        }
        document.title = o.Services.appName;
        var W = o.Capabilities.webGL, M = o.Capabilities.checkWebGL(), Y = o.Camera && o.Camera.hasGetUserMedia, P = location.search && location.search.substr(location.search.indexOf("app=") + 4, 5), U = false;
        if (o.ua.mac) {
            $("body").addClass("mac");
            if ((/Chrom(e|ium)\/(2[2-3])/).test(navigator.userAgent)) {
                $("body").addClass("font-fix")
            }
        }
        if ($.fn.noisy) {
            $("header").noisy({
                opacity: 0.04,
                height: 50
            })
        }
        if (E) {
            if (o.Home) {
                o.Home.init()
            }
        } else {
            delete o.Home
        }
        if (o.Capabilities.localStorage) {
            try {
                U = localStorage.getItem("forceFlash") === "1"&&!o.ua.mobile
            } catch (S) {
                U = false
            }
        }
        if (o.ua.mobile || o.ua.iPad) {
            addEventListener("load", function() {
                window.scrollTo(0, 1)
            }, false)
        } else {
            o.trackEvent("Capabilities", "Version", o.version, true)
        }
        o.trackEvent("Capabilities", "GetUserMedia", Y.toString(), true);
        o.trackEvent("Capabilities", "WebGL", W.toString(), true);
        if (W) {
            l = (M.hasFloat || o.ua.mobile) && M.canCompile && M.canLink
        }
        l=!o.ua.ie && (P === "html5" || l && Y&&!U && P !== "flash"&&!I.hasClass("disabled"));
        o.trackEvent("Capabilities", "HTML5", l.toString(), true);
        o.trackEvent("Capabilities", "ForceFlash", U.toString(), true);
        jQuery(window).on("beforeunload", u);
        if (!o.ua.mobile && E) {
            o.Services.onFacebookUser = o.Home.setFacebookUser
        }
        if (o.ua.mobile || o.ua.tablet) {
            if (l) {
                o.UI.loadImages()
            } else {
                $("#button-init").hide()
            }
        } else {
            if (l) {
                o.UI.loadImages();
                if (!E) {
                    K()
                }
            } else {
                n()
            }
        }
        if (!o.ua.mobile&&!o.ua.tablet) {
            b();
            A();
            if (o.Services) {
                o.Services.init()
            }
        }
    })
})(WebcamToy);
WebcamToy.Capabilities = (function(b) {
    b.version = $("#toy").attr("data-version") || "0";
    b.ua = (function() {
        var i = navigator.userAgent.toLowerCase() || "", h = $("body").hasClass("mobile"), j = /iPad/.test(navigator.platform), g = j || $("body").hasClass("tablet"), l = / opr\//.test(i), k = i.match(/chrom(e|ium)\/([0-9]+)\./), e = {
            ie: /msie /.test(i) || /trident\//.test(i),
            ieOld: /msie [2-8]\./.test(i),
            chrome: !l && /chrom(e|ium)/.test(i),
            chromeVersion: !l && k && k.length >= 2 ? parseInt(k[2], 10): 0,
            firefox: /firefox/.test(i),
            mobile: h,
            tablet: g,
            iPad: j,
            mac: !h&&!g && /mac os/.test(i),
            locale: $('meta[property="og:locale"]').attr("content") || "en"
        };
        return e
    })();
    var f, a = {
        canvas: !!window.CanvasRenderingContext2D,
        history: !!(window.history && history.pushState),
        touch: !!("ontouchstart" in window) && (b.ua.mobile || b.ua.tablet)
    };
    try {
        a.localStorage = "localStorage" in window && window.localStorage !== null
    } catch (d) {
        a.localStorage = false
    }
    a.webGL = (function() {
        var h;
        try {
            var g = document.createElement("canvas");
            h=!!(window.WebGLRenderingContext && g.getContext("experimental-webgl"));
            g = undefined
        } catch (i) {
            h = false
        }
        return h
    })();
    function c(g, i) {
        var h = f.createShader(g);
        f.shaderSource(h, i);
        f.compileShader(h);
        var j = f.getError();
        if (j !== f.NO_ERROR || f.isContextLost() ||!f.getShaderParameter(h, f.COMPILE_STATUS)) {
            return null
        }
        return h
    }
    a.checkWebGL = function() {
        var j = {
            hasFloat: false,
            canCompile: false,
            canLink: false
        };
        if (a.webGL) {
            try {
                var i = document.createElement("canvas");
                f = i.getContext("experimental-webgl");
                if (f) {
                    j.hasFloat=!!(f.getExtension("OES_texture_float") || f.getExtension("OES_texture_float_linear"));
                    var h = f.createProgram(), l = c(f.VERTEX_SHADER, "attribute vec3 p;void main(){gl_Position=vec4(p,1.0);}"), g = c(f.FRAGMENT_SHADER, "precision mediump float;uniform sampler2D t;uniform float a;void main(){vec4 c=vec4(1.0);vec2 p=gl_FragCoord.xy;if(a==1.0){p+=a;};for(float i=0.0;i<9.0;i++){float h=atan(p.y,p.x)+i,r=length(p),b=mod(floor(h/r),2.0);c+=texture2D(t,vec2(b));}gl_FragColor=c;}");
                    f.attachShader(h, l);
                    f.attachShader(h, g);
                    f.linkProgram(h);
                    j.canLink=!!f.getProgramParameter(h, f.LINK_STATUS);
                    j.canCompile=!!(l && g);
                    f.deleteShader(l);
                    f.deleteShader(g);
                    f.deleteProgram(h)
                }
                f = undefined;
                i = undefined
            } catch (k) {
                j.canLink = j.canCompile = false
            }
        }
        return j
    };
    return a
}(WebcamToy));
WebcamToy.Services = (function(n) {
    var B = {
        appName: "Webcam Toy",
        isHosted: location.hostname === "webcamtoy.com",
        facebookVersion: 2.2,
        onFacebookAuth: null,
        onFacebookUser: null,
        onTwitterAuth: null,
        onTumblrAuth: null,
        onVKAuth: null,
        onVKAlbum: null
    }, g = {
        facebook: {
            firstName: "",
            fullName: "",
            user: "",
            id: "",
            url: "",
            token: "",
            album: {
                id: "",
                url: "",
                privacy: ""
            }
        },
        twitter: {
            user: "",
            token: "",
            secret: "",
            forceLogin: false
        },
        tumblr: {
            user: "",
            token: "",
            secret: "",
            forceLogin: false
        },
        vk: {
            user: "",
            token: "",
            aid: "",
            forceLogin: false
        }
    }, G, j, K = false, v = "201969246526783", a = "http://webcamtoy.com/" + (n.ua.locale === "en" ? "" : n.ua.locale + "/") + "fb-channel.html", w = 0, y = 8, J = 6000, f, m = 12000, c, z = "http://oauth.webcamtoy.com", h = z + "/twitter/", b = z + "/tumblr/", t = z + "/vk/";
    B.assetsURL = B.isHosted ? "http://assets.webcamtoy.com/" : "/assets/";
    try {
        g.facebook.album.id = localStorage.getItem("facebookAlbumID") || "";
        g.twitter.user = localStorage.getItem("twitterUser") || "";
        g.twitter.token = localStorage.getItem("twitterToken") || "";
        g.twitter.secret = localStorage.getItem("twitterSecret") || "";
        g.tumblr.user = localStorage.getItem("tumblrUser") || "";
        g.tumblr.token = localStorage.getItem("tumblrToken") || "";
        g.tumblr.secret = localStorage.getItem("tumblrSecret") || "";
        g.vk.aid = localStorage.getItem("vkAlbumID") || "";
        g.vk.user = localStorage.getItem("vkUser") || ""
    } catch (I) {}
    g.vk.token = "";
    function C(O) {
        if (!O ||!window.Blob ||!window.atob) {
            return null
        }
        var T = window.atob(O.split(",")[1]), N = O.split(",")[0].split(":")[1].split(";")[0], Q = new ArrayBuffer(T.length), R = new Uint8Array(Q), P;
        for (P = T.length; P--;) {
            R[P] = T.charCodeAt(P)
        }
        try {
            if (!!window.DataView) {
                return new Blob([new DataView(Q)], {
                    type: N
                })
            }
        } catch (S) {}
        try {
            return new Blob([R], {
                type: N
            })
        } catch (S) {}
        return null
    }
    function k(O, N) {
        var Q;
        try {
            Q = $.parseJSON(O.responseText)
        } catch (P) {}
        if (N) {
            N(Q)
        }
    }
    function A() {
        if (G) {
            G.abort()
        }
        clearTimeout(f)
    }
    B.cancelPost = function() {
        A();
        K = false
    };
    B.init = function() {
        $(window).on("message", function(O) {
            O = O.originalEvent;
            if (O.origin === z) {
                var P;
                try {
                    P = $.parseJSON(O.data)
                } catch (N) {}
                switch (P.service) {
                case"twitter":
                    F(P.user, P.token, P.secret);
                    break;
                case"tumblr":
                    s(P.user, P.token, P.secret);
                    break;
                case"vk":
                    l(P.user, P.token);
                    break
                }
            }
        });
        x();
        i();
        M();
        p()
    };
    function q() {
        g.facebook.album.id = g.facebook.album.url = g.facebook.album.privacy = "";
        try {
            localStorage.setItem("facebookAlbumID", "")
        } catch (N) {}
    }
    function d() {
        g.facebook.token = g.facebook.firstName = g.facebook.fullName = g.facebook.id = g.facebook.url = "";
        q()
    }
    function r(e) {
        var N = e.authResponse ? e.authResponse.accessToken: "";
        if (e && e.status === "connected" && N) {
            g.facebook.token = N;
            B.facebookUser();
            if (B.onFacebookAuth) {
                B.onFacebookAuth(g.facebook.token)
            }
        } else {
            d()
        }
    }
    function L() {
        if (!!window.FB) {
            return 
        }
        var N = navigator.userLanguage || navigator.language || "en-US", e = n.ua.locale || "en", O = e + "_" + e.toUpperCase();
        switch (e) {
        case"en":
            if (N === "en-GB") {
                O = "en_GB"
            } else {
                O = "en_US"
            }
            break;
        case"cs":
            O = "cs_CZ";
            break;
        case"da":
            O = "da_DK";
            break;
        case"el":
            O = "el_GR";
            break;
        case"es":
            O = "es_LA";
            switch (N) {
            case"ca-ES":
                O = "ca_ES";
                break;
            case"es-ES":
                O = "es_ES";
                break
            }
            break;
        case"ja":
            O = "ja_JP";
            break;
        case"nb":
            O = "nb_NO";
            break;
        case"pt":
            if (N === "pt-PT") {
                O = "pt_PT"
            } else {
                O = "pt_BR"
            }
            break;
        case"sr":
            O = "sr_RS";
            break;
        case"sv":
            O = "sv_SE";
            break;
        case"zh":
            O = "zh_CN";
            break
        }
        n.addScript("//connect.facebook.net/" + O + "/sdk.js")
    }
    function x() {
        var P = location.hash.substr(1);
        if (P) {
            var e = P.split("&"), Q = {}, N, O;
            for (N = 0; N < e.length; N++) {
                O = e[N].split("=");
                Q[O[0]] = O[1]
            }
            if (Q.access_token && Q.access_token.length > 50) {
                g.facebook.token = Q.access_token;
                location.hash = ""
            }
        }
        window.fbAsyncInit = function() {
            if (!!window.FB) {
                FB.Event.subscribe("auth.statusChange", r);
                FB.Event.subscribe("auth.logout", r);
                FB.init({
                    appId: v,
                    channelUrl: a,
                    status: true,
                    cookie: true,
                    oauth: true,
                    version: "v" + B.facebookVersion
                });
                if (FB.XFBML) {
                    FB.XFBML.parse($("#head-social")[0])
                }
            }
        };
        L()
    }
    B.facebookUser = function() {
        if (g.facebook.firstName) {
            if (B.onFacebookUser) {
                B.onFacebookUser(g.facebook)
            }
        } else {
            if (!!window.FB) {
                FB.api("/me", function(e) {
                    if (e) {
                        g.facebook.firstName = e.first_name;
                        g.facebook.fullName = e.name;
                        g.facebook.id = e.id;
                        g.facebook.url = e.link;
                        if (B.onFacebookUser) {
                            B.onFacebookUser(g.facebook)
                        }
                    }
                })
            }
        }
    };
    B.facebookAuth = function() {
        A();
        if (!g.facebook.token) {
            if (!window.FB) {
                L()
            } else {
                FB.login(function() {}, {
                    scope: "user_photos,publish_actions"
                })
            }
        } else {
            if (B.onFacebookAuth) {
                FB.getLoginStatus(function(e) {
                    if (e && e.status === "connected") {
                        B.onFacebookAuth(g.facebook.token || "")
                    } else {
                        d()
                    }
                })
            }
        }
    };
    B.facebookLogout = function() {
        A();
        if (!!window.FB) {
            FB.getLoginStatus(function(e) {
                if (e && e.status === "connected") {
                    FB.logout();
                    FB.getLoginStatus()
                }
            })
        }
        d()
    };
    B.facebookStatus = function() {
        if (!window.FB) {
            L()
        } else {
            FB.getLoginStatus(r)
        }
    };
    function H(e) {
        clearTimeout(c);
        if (e) {
            e("", "", g.facebook.album.id = "me")
        }
    }
    B.facebookAlbum = function(P, e, O, N) {
        if (!!window.FB && e) {
            clearTimeout(c);
            c = setTimeout(function() {
                H(P)
            }, m);
            FB.api("/me/albums", function(S) {
                if (S && S.data) {
                    var R = g.facebook.album.id;
                    for (var V = 0; V < S.data.length; V++) {
                        var Q = S.data[V].name.toLowerCase();
                        if (R && S.data[V].id === R ||!R && (Q === e.toLowerCase() || /webcam toy/.test(Q))) {
                            if (S.data[V].can_upload) {
                                var U = g.facebook.album.url = S.data[V].link || "https://www.facebook.com/" + R, T = g.facebook.album.privacy = S.data[V].privacy, X = g.facebook.album.id = S.data[V].id;
                                try {
                                    localStorage.setItem("facebookAlbumID", X)
                                } catch (W) {}
                                if (P) {
                                    clearTimeout(c);
                                    P(U, T, X)
                                }
                                return 
                            }
                        }
                    }
                    if (N) {
                        H(P)
                    } else {
                        g.facebook.album.id = "";
                        FB.api("/me/albums", "post", {
                            name: e,
                            message: ""
                        }, function(Y) {
                            if (Y && Y.id) {
                                q();
                                var aa = g.facebook.album.id = Y.id;
                                try {
                                    localStorage.setItem("facebookAlbumID", aa)
                                } catch (Z) {}
                                B.facebookAlbum(P, e, "", true)
                            } else {
                                H(P)
                            }
                        })
                    }
                } else {
                    H(P)
                }
            })
        }
    };
    B.facebookPost = function(O, Q, N) {
        if (!g.facebook.token) {
            N("OAuth token not found");
            return 
        }
        if (!g.facebook.album.id) {
            clearTimeout(c);
            g.facebook.album.id = "me"
        }
        var e = C(O.image.src);
        if (!e) {
            N("Image data not found");
            return 
        }
        K = true;
        var P = new FormData();
        P.append("access_token", g.facebook.token);
        P.append("message", "");
        P.append("source", e);
        if (j) {
            j.abort()
        }
        j = $.ajax({
            url: "https://graph.facebook.com/v" + B.facebookVersion + "/" + g.facebook.album.id + "/photos",
            data: P,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            timeout: 30000,
            statusCode: {
                400: function(R) {
                    k(R, N)
                },
                401: function(R) {
                    k(R, N)
                },
                403: function(R) {
                    k(R, N)
                },
                500: function(R) {
                    k(R, N)
                }
            },
            complete: function(R, T) {
                if (K) {
                    var U;
                    T = R && R.statusText || T;
                    try {
                        U = $.parseJSON(R.responseText)
                    } catch (S) {
                        N(T)
                    }
                    if (U && U.success === 0) {
                        N(U)
                    } else {
                        if (U && U.id) {
                            Q()
                        } else {
                            N(T)
                        }
                    }
                }
            }
        })
    };
    function F(O, P, N) {
        A();
        if (!P) {
            O = P = N = ""
        }
        g.twitter.user = O;
        g.twitter.token = P;
        g.twitter.secret = N;
        try {
            localStorage.setItem("twitterUser", O);
            localStorage.setItem("twitterToken", P);
            localStorage.setItem("twitterSecret", N)
        } catch (Q) {}
        if (B.onTwitterAuth) {
            B.onTwitterAuth(O, P, N)
        }
    }
    function i() {
        if (g.twitter.token && B.onTwitterAuth) {
            B.onTwitterAuth(g.twitter.user, g.twitter.token, g.twitter.secret);
            return true
        }
        return false
    }
    function E() {
        if (i()) {
            A();
            return 
        }
        $.ajax({
            url: h + "verify.php?format=json",
            dataType: "jsonp",
            crossDomain: true,
            cache: false,
            timeout: 15000,
            error: function() {},
            success: function(e) {
                if (e.success === 1) {
                    F(e.user, e.token, e.secret)
                } else {
                    if (e.success === 0 && /blacklist/i.test(e.message)) {
                        A()
                    }
                }
            }
        });
        if (w < y) {
            w++;
            f = setTimeout(E, J)
        }
    }
    B.twitterAuth = function() {
        A();
        if (!g.twitter.token) {
            var e = n.ua.locale;
            if (e === "zh-CN") {
                e = "zh"
            }
            n.popup(null, h + "?force_login=" + (g.twitter.forceLogin ? "1&destroy=1" : 0) + (e ? "&locale=" + e : ""), 700, 520, "twitter");
            w = 0;
            f = setTimeout(E, J)
        } else {
            if (B.onTwitterAuth) {
                B.onTwitterAuth(g.twitter.user, g.twitter.token, g.twitter.secret)
            }
        }
    };
    B.twitterLogout = function() {
        A();
        F("", "", "");
        g.twitter.forceLogin = true
    };
    B.twitterPost = function(Q, P, N) {
        if (!g.twitter.token) {
            N("OAuth token not found");
            return 
        }
        var e = C(Q.image.src);
        if (!e) {
            N("Image data not found");
            return 
        }
        K = true;
        var O = new FormData();
        O.append("format", "json");
        O.append("user", g.twitter.user);
        O.append("token", g.twitter.token);
        O.append("secret", g.twitter.secret);
        O.append("message", Q.message);
        O.append("file", e);
        if (j) {
            j.abort()
        }
        j = $.ajax({
            url: h + "tweet.php",
            data: O,
            type: "POST",
            cache: false,
            crossDomain: true,
            contentType: false,
            processData: false,
            timeout: 20000,
            error: function() {},
            complete: function(R, T) {
                if (K) {
                    T = R && R.statusText || T;
                    var U;
                    try {
                        U = $.parseJSON(R.responseText)
                    } catch (S) {
                        N(T)
                    }
                    if (U) {
                        if (U.success === 0) {
                            N(U.message || T)
                        } else {
                            P(U.id ? ("http://pic.twitter.com/" + U.id) : "")
                        }
                    } else {
                        N(T)
                    }
                }
            }
        })
    };
    function s(O, P, N) {
        A();
        if (!P) {
            O = P = N = ""
        }
        g.tumblr.user = O;
        g.tumblr.token = P;
        g.tumblr.secret = N;
        try {
            localStorage.setItem("tumblrUser", O);
            localStorage.setItem("tumblrToken", P);
            localStorage.setItem("tumblrSecret", N)
        } catch (Q) {}
        if (B.onTumblrAuth) {
            B.onTumblrAuth(O, P, N)
        }
    }
    function M() {
        if (g.tumblr.token && B.onTumblrAuth) {
            B.onTumblrAuth(g.tumblr.user, g.tumblr.token, g.tumblr.secret);
            return true
        }
        return false
    }
    function u() {
        if (M()) {
            A();
            return 
        }
        $.ajax({
            url: b + "verify.php?format=json",
            dataType: "jsonp",
            crossDomain: true,
            cache: false,
            timeout: 15000,
            error: function() {},
            success: function(e) {
                if (e.success === 1) {
                    s(e.user, e.token, e.secret)
                }
            }
        });
        if (w < y) {
            w++;
            f = setTimeout(u, J)
        }
    }
    B.tumblrAuth = function() {
        A();
        if (!g.tumblr.token) {
            n.popup(null, b + "?force_login=" + (g.tumblr.forceLogin ? "1&destroy=1" : 0), 700, 520, "tumblr");
            w = 0;
            f = setTimeout(u, J)
        } else {
            if (B.onTumblrAuth) {
                B.onTumblrAuth(g.tumblr.user, g.tumblr.token, g.tumblr.secret)
            }
        }
    };
    B.tumblrLogout = function() {
        A();
        s("", "", "");
        g.tumblr.forceLogin = true
    };
    B.tumblrPost = function(P, R, O) {
        if (!g.tumblr.token) {
            O("OAuth token not found");
            return 
        }
        var e = C(P.image.src);
        if (!e) {
            O("Image data not found");
            return 
        }
        K = true;
        var N = "http://webcamtoy.com/" + (n.ua.locale === "en" ? "" : n.ua.locale + "/"), Q = new FormData();
        Q.append("format", "json");
        Q.append("user", g.tumblr.user);
        Q.append("token", g.tumblr.token);
        Q.append("secret", g.tumblr.secret);
        Q.append("effect", P.effect);
        Q.append("link", N);
        Q.append("message", P.message.replace(B.appName, '<a href="' + N + '">' + B.appName + "</a>"));
        Q.append("file", e);
        if (j) {
            j.abort()
        }
        j = $.ajax({
            url: b + "upload.php",
            data: Q,
            type: "POST",
            cache: false,
            crossDomain: true,
            contentType: false,
            processData: false,
            timeout: 20000,
            error: function() {},
            complete: function(S, U) {
                if (K) {
                    U = S && S.statusText || U;
                    var V;
                    try {
                        V = $.parseJSON(S.responseText)
                    } catch (T) {
                        O(U)
                    }
                    if (V) {
                        if (V.success === 0) {
                            O(V.message || U)
                        } else {
                            R(V.id ? ("http://" + g.tumblr.user + ".tumblr.com/post/" + V.id + "/") : "")
                        }
                    } else {
                        O(U)
                    }
                }
            }
        })
    };
    function l(N, O) {
        A();
        if (!O ||!N) {
            N = O = ""
        }
        g.vk.user = String(N);
        g.vk.token = O;
        try {
            localStorage.setItem("vkUser", N)
        } catch (P) {}
        if (B.onVKAuth) {
            B.onVKAuth(N, O)
        }
    }
    function D(N) {
        if (!N) {
            N = ""
        }
        N = String(N);
        g.vk.aid = N;
        try {
            localStorage.setItem("vkAlbumID", N)
        } catch (O) {}
        if (B.onVKAlbum) {
            B.onVKAlbum(N)
        }
    }
    function p() {
        if (g.vk.aid && B.onVKAlbum) {
            B.onVKAlbum(g.vk.aid)
        }
        if (g.vk.token && B.onVKAuth) {
            B.onVKAuth(g.vk.user, g.vk.token);
            return true
        }
        return false
    }
    function o() {
        if (p()) {
            A();
            return 
        }
        $.ajax({
            url: t + "verify.php?format=json",
            dataType: "jsonp",
            crossDomain: true,
            cache: false,
            timeout: 15000,
            error: function() {},
            success: function(e) {
                if (e.success === 1) {
                    l(e.user, e.token)
                }
            }
        });
        if (w < y) {
            w++;
            f = setTimeout(o, J)
        }
    }
    B.vkAuth = function() {
        A();
        if (!g.vk.token) {
            n.popup(null, t + "?force_login=" + (g.vk.forceLogin ? "1&destroy=1" : 0), 620, 350, "vk");
            w = 0;
            f = setTimeout(o, J)
        } else {
            if (B.onVKAuth) {
                B.onVKAuth(g.vk.user, g.vk.token)
            }
        }
    };
    B.vkLogout = function() {
        A();
        l("", "");
        D("");
        g.vk.forceLogin = true
    };
    B.vkPost = function(O, Q, N) {
        if (!g.vk.token) {
            N("OAuth token not found");
            return 
        }
        var e = C(O.image.src);
        if (!e) {
            N("Image data not found");
            return 
        }
        K = true;
        var P = new FormData();
        P.append("format", "json");
        P.append("aid", g.vk.aid);
        P.append("user", g.vk.user);
        P.append("token", g.vk.token);
        P.append("message", O.message.replace(B.appName, "webcamtoy.com"));
        P.append("file", e);
        if (j) {
            j.abort()
        }
        j = $.ajax({
            url: t + "upload.php",
            data: P,
            type: "POST",
            cache: false,
            crossDomain: true,
            contentType: false,
            processData: false,
            timeout: 30000,
            error: function() {},
            complete: function(R, T) {
                if (K) {
                    T = R && R.statusText || T;
                    var U;
                    try {
                        U = $.parseJSON(R.responseText)
                    } catch (S) {
                        N(T)
                    }
                    if (U) {
                        if (U.success === 0) {
                            D(U.aid);
                            N(U.message || T)
                        } else {
                            if (U.aid && g.vk.aid !== String(U.aid)) {
                                D(U.aid)
                            }
                            Q(U.id ? ("http://vk.com/" + U.id) : "")
                        }
                    } else {
                        N(T)
                    }
                }
            }
        })
    };
    return B
}(WebcamToy));
WebcamToy.Texture = (function() {
    function b(g, e, c) {
        var f = document.createElement("canvas");
        f.width = e || g.width;
        f.height = c || g.height;
        var d = f.getContext("2d");
        if (d) {
            d.clearRect(0, 0, e, c)
        }
        return d
    }
    function a(k, h, c, j, g, d, f) {
        this.gl = k;
        this.id = k.createTexture();
        this.format = j;
        this.type = g;
        f = f || (WebcamToy.ua.mac ? k.LINEAR : k.NEAREST);
        k.bindTexture(k.TEXTURE_2D, this.id);
        k.texParameteri(k.TEXTURE_2D, k.TEXTURE_MAG_FILTER, f);
        k.texParameteri(k.TEXTURE_2D, k.TEXTURE_MIN_FILTER, f);
        k.texParameteri(k.TEXTURE_2D, k.TEXTURE_WRAP_S, k.CLAMP_TO_EDGE);
        k.texParameteri(k.TEXTURE_2D, k.TEXTURE_WRAP_T, k.CLAMP_TO_EDGE);
        if (d) {
            this.loadContentsOf(d)
        } else {
            if (h && c) {
                this.width = h;
                this.height = c;
                try {
                    k.texImage2D(k.TEXTURE_2D, 0, j, h, c, 0, j, g, null)
                } catch (i) {}
            }
        }
    }
    a.prototype.loadContentsOf = function(c) {
        this.gl.bindTexture(this.gl.TEXTURE_2D, this.id);
        this.gl.pixelStorei(this.gl.UNPACK_FLIP_Y_WEBGL, true);
        try {
            this.gl.texImage2D(this.gl.TEXTURE_2D, 0, this.format, this.format, this.type, c)
        } catch (d) {}
        return this
    };
    a.prototype.use = function(c) {
        this.gl.activeTexture(this.gl.TEXTURE0 + (c || 0));
        this.gl.bindTexture(this.gl.TEXTURE_2D, this.id)
    };
    a.prototype.drawTo = function(d) {
        var c = this.gl;
        c.bindFramebuffer(c.FRAMEBUFFER, c.framebuffer = c.framebuffer || c.createFramebuffer());
        c.framebufferTexture2D(c.FRAMEBUFFER, c.COLOR_ATTACHMENT0, c.TEXTURE_2D, this.id, 0);
        if (c.checkFramebufferStatus(c.FRAMEBUFFER) === c.FRAMEBUFFER_COMPLETE) {
            d()
        }
        c.bindFramebuffer(c.FRAMEBUFFER, null);
        return this
    };
    a.prototype.toImage = function(r, o, d, p) {
        p = p || this.height;
        d = r ? p : d || this.width;
        var m = 2, k = this.height, n = r ? k: this.width, j, s = n * k * 4, g = new Uint8Array(s), l = b(this, d, p), q = b(this, n, k), f = q.createImageData(n, k), c = f.data, e;
        this.gl.readPixels(r ? (this.width - k) / 2 : 0, 0, n, k, this.gl.RGBA, this.gl.UNSIGNED_BYTE, g);
        for (j = s; j--;) {
            c[j] = g[j]
        }
        q.putImageData(f, 0, 0);
        l.save();
        l.translate(0, p);
        l.scale(d / n, - p / k);
        l.drawImage(q.canvas, m/-2 * n / k, m/-2, n + m * n / k, k + m);
        l.restore();
        e = l.canvas.toDataURL("image/jpeg", o);
        q = null;
        l = null;
        return e
    };
    a.prototype.swapWith = function(c) {
        var d = c.id;
        c.id = this.id;
        this.id = d;
        d = c.width;
        c.width = this.width;
        this.width = d;
        d = c.height;
        c.height = this.height;
        this.height = d;
        d = c.format;
        c.format = this.format;
        this.format = d;
        return this
    };
    a.prototype.destroy = function() {
        if (this.gl && this.id) {
            this.gl.deleteTexture(this.id)
        }
        this.id = null;
        this.gl = null
    };
    return a
}());
WebcamToy.Shader = (function(c) {
    var g = "attribute vec2 vertex;attribute vec2 _texCoord;varying vec2 texCoord;void main(){texCoord=_texCoord;gl_Position=vec4(vertex*2.0-1.0,0.0,1.0);}", b = "uniform sampler2D texture;varying vec2 texCoord;void main(){gl_FragColor=texture2D(texture,texCoord);}";
    function a(h) {
        return Object.prototype.toString.call(h) === "[object Array]"
    }
    function d(h) {
        return Object.prototype.toString.call(h) === "[object Number]"
    }
    function f(l, i, k) {
        var j = l.createShader(i), h = "Compilation error";
        if (!j) {
            throw h
        } else {
            l.shaderSource(j, k)
        }
        l.compileShader(j);
        if (!l.isContextLost()&&!l.getShaderParameter(j, l.COMPILE_STATUS)) {
            throw h
        }
        return j
    }
    function e(k, l, i) {
        this.gl = k;
        this.vertexAttribute = null;
        this.texCoordAttribute = null;
        this.program = k.createProgram();
        l = l || g;
        i = i || b;
        i = "precision mediump float;" + i;
        k.attachShader(this.program, f(k, k.VERTEX_SHADER, l));
        k.attachShader(this.program, f(k, k.FRAGMENT_SHADER, i));
        k.linkProgram(this.program);
        if (!k.isContextLost()&&!k.getProgramParameter(this.program, k.LINK_STATUS)) {
            var j;
            try {
                j = k.getProgramInfoLog(this.program)
            } catch (h) {}
            throw "Link error" + (j ? ": " + j : "")
        }
    }
    e.getMainShader = function(h) {
        return new e(h, null, "uniform sampler2D texture;varying vec2 texCoord;uniform float mult;uniform float offset;uniform float mirror;void main(){vec2 p=texCoord/1.005+0.0025;if(mirror==1.0){p.x=1.0-p.x;}gl_FragColor=vec4(clamp(texture2D(texture,p).rgb*mult+offset,0.0,1.0),1.0);}")
    };
    e.getBlackShader = function(h) {
        return new e(h, null, "void main(){gl_FragColor=vec4(0.0,0.0,0.0,1.0);}")
    };
    e.getWhiteShader = function(h) {
        return new e(h, null, "void main(){gl_FragColor=vec4(1.0);}")
    };
    e.prototype.uniforms = function(h) {
        if (h) {
            var l = this.gl;
            l.useProgram(this.program);
            for (var j in h) {
                if (h.hasOwnProperty(j)) {
                    var i = l.getUniformLocation(this.program, j);
                    if (!i) {
                        continue
                    }
                    var k = h[j];
                    if (a(k)) {
                        switch (k.length) {
                        case 1:
                            l.uniform1fv(i, new Float32Array(k));
                            break;
                        case 2:
                            l.uniform2fv(i, new Float32Array(k));
                            break;
                        case 3:
                            l.uniform3fv(i, new Float32Array(k));
                            break;
                        case 4:
                            l.uniform4fv(i, new Float32Array(k));
                            break;
                        case 9:
                            l.uniformMatrix3fv(i, false, new Float32Array(k));
                            break;
                        case 16:
                            l.uniformMatrix4fv(i, false, new Float32Array(k));
                            break;
                        default:
                            throw 'Cannot load uniform "' + j + '" of length ' + k.length
                        }
                    } else {
                        if (d(k)) {
                            l.uniform1f(i, k)
                        } else {
                            throw 'Attempted to set uniform "' + j + '" to invalid value ' + (k || "undefined").toString()
                        }
                    }
                }
            }
        }
        return this
    };
    e.prototype.textures = function(h) {
        this.gl.useProgram(this.program);
        for (var i in h) {
            if (h.hasOwnProperty(i)) {
                this.gl.uniform1i(this.gl.getUniformLocation(this.program, i), h[i])
            }
        }
        return this
    };
    e.prototype.drawRect = function(k, j, h, i) {
        var l = this.gl;
        if (!l) {
            return 
        }
        k = k || 0;
        j = j || 0;
        h = h || 1;
        i = i || 1;
        if (!l.vertexBuffer) {
            l.vertexBuffer = l.createBuffer()
        }
        l.bindBuffer(l.ARRAY_BUFFER, l.vertexBuffer);
        l.bufferData(l.ARRAY_BUFFER, new Float32Array([j, k, j, h, i, k, i, h]), l.STATIC_DRAW);
        if (!l.texCoordBuffer) {
            l.texCoordBuffer = l.createBuffer();
            l.bindBuffer(l.ARRAY_BUFFER, l.texCoordBuffer);
            l.bufferData(l.ARRAY_BUFFER, new Float32Array([0, 0, 0, 1, 1, 0, 1, 1]), l.STATIC_DRAW)
        }
        if (!this.vertexAttribute) {
            this.vertexAttribute = l.getAttribLocation(this.program, "vertex");
            l.enableVertexAttribArray(this.vertexAttribute)
        }
        if (!this.texCoordAttribute) {
            this.texCoordAttribute = l.getAttribLocation(this.program, "_texCoord");
            l.enableVertexAttribArray(this.texCoordAttribute)
        }
        l.useProgram(this.program);
        l.bindBuffer(l.ARRAY_BUFFER, l.vertexBuffer);
        l.vertexAttribPointer(this.vertexAttribute, 2, l.FLOAT, false, 0, 0);
        l.bindBuffer(l.ARRAY_BUFFER, l.texCoordBuffer);
        l.vertexAttribPointer(this.texCoordAttribute, 2, l.FLOAT, false, 0, 0);
        l.drawArrays(l.TRIANGLE_STRIP, 0, 4)
    };
    e.prototype.destroy = function() {
        if (this.gl && this.program) {
            this.gl.deleteProgram(this.program)
        }
        this.program = null;
        this.gl = null
    };
    return e
}(WebcamToy));
WebcamToy.Effect = (function(n) {
    var H = {}, k = ["mirrorleft", "mirrorright", "mirrortop", "mirrorbottom", "mirrorquad", "upsidedown", "switch", "kaleidoscope", "fragment", "quadcam", "splitscreen", "filmstrip", "ghost", "colorghost", "trail", "shuffle", "tunnel", "spiral", "twist", "dent", "pinch", "bulge", "fisheye", "wedge", "ripple", "stretch", "softfocus", "hazydays", "vintage", "rose", "retro", "cocoa", "xpro", "envy", "zinc", "citrus", "berry", "mint", "smoke", "halo", "bloom", "glaze", "watercolor", "silk", "oldmovie", "cocktail", "spycam", "hotpink", "bokeh", "flare", "danger", "rainbow", "trueblue", "mono", "lomo", "comicbook", "monoquad", "lomoquad", "comicstrip", "magazine", "blackwhite", "cartoon", "outline", "sketch", "crosshatch", "underwater", "fire", "snow", "disco", "sparkle", "glitch", "xray", "lsd", "alien", "nightvision", "thermal", "spectrum", "neon", "popart", "popbooth"], r = 0, s = 3, y = 800, j = 600, x = {
        texture2: 1
    }, F = [2, 2, 2, 0, 0, 0, - 2, - 2, - 2], o = [1, 2, 1, 2, - 12, 2, 1, 2, 1], a = {
        add: function(I) {
            this.initShader("add");
            this.uniforms.add = {
                ratio: I || 0.5
            }
        },
        alien: function() {
            this.initShader("alien");
            this.fps = 20
        },
        blur: function(I) {
            if (!this.initShader("blur")) {
                this.initShader("blursimple")
            }
            this.uniforms.blur1 = {
                delta: [(I || 32) / this.width, 0]
            };
            this.uniforms.blur2 = {
                delta: [0, (I || 32) / this.height]
            }
        },
        bloom: function() {
            this.uniforms = {
                center: this.center,
                radius: (this.square ? this.height : this.width) / 4,
                width: this.height
            }
        },
        bokeh: function() {
            var I = this.width / 6, L = this.square ? this.width / 3: (this.width + this.height) / 6;
            this.initShader("bokeh");
            this.initShader("radialblur");
            this.fps = 20;
            this.extraTexture = this.getTexture(q.bokeh);
            this.startTime = Date.now() - Math.random() * 100 - 50;
            this.uniforms = {
                bokehs: [],
                bokeh: {
                    center: this.center,
                    radius: this.height * 1.2,
                    init: 1,
                    texSize: this.size,
                    time: 0
                },
                radialblur1: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: L,
                    delta: [1 / this.width, 0]
                },
                radialblur2: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: L,
                    delta: [0, 1 / this.height]
                }
            };
            for (var K = 32; K--;) {
                var J = 128 - K * K / 24;
                this.uniforms.bokehs.push(new t(Math.random() * y - J / 2, Math.random() * j - J / 2, J))
            }
        },
        bulge: function() {
            this.uniforms = {
                mode: 1,
                strength: 0.9,
                center: this.center,
                radius: this.height / 4
            }
        },
        cartoon: function() {
            this.initShader("cartoon");
            this.initShader("cartoonink");
            this.fps = 20;
            this.quality = 0.7;
            this.uniforms = {
                cartoonink: {
                    size: [2.5 / j * this.height / this.width, 2.5 / j]
                },
                cartoon: {
                    rect: this.getRect(0.01)
                }
            }
        },
        cocktail: function() {
            this.initShader("cocktail");
            this.initShader("cocktailborder");
            this.fps = 20;
            this.extraTexture = this.getTexture(this.square ? q.cocktailsq : q.cocktail);
            this.uniforms = {
                rect: this.getRect(0.006),
                fade: y / 3
            }
        },
        cocoa: function() {
            this.initShader("cocoa");
            this.fps = 20;
            this.uniforms = {
                center: this.center,
                radius: (this.square ? this.height : this.width) / 6,
                width: this.height * 0.58,
                rect: this.getRect(0.022),
                fade: 60
            }
        },
        colorghost: function() {
            this.initShader("colorghost");
            this.initFrameTextures(this.fps = u ? 8 : 20, this.width, this.height);
            this.uniforms = {
                frame: 0,
                tex: {
                    frame1: 1,
                    frame2: 2
                }
            }
        },
        comicbook: function() {
            this.quality = 0.55;
            this.uniforms = {
                quad: 0,
                center: this.center,
                size: Math.min(0.8, 400 / this.height),
                rect: this.getRect(0.02)
            }
        },
        comicstrip: function() {
            this.initShader("quadcam");
            this.initShader("comicbook");
            this.initShader("comicstripborder");
            this.quality = 0.55;
            this.isQuad = true;
            this.uniforms.comicstrip = {
                center: this.center,
                size: Math.min(0.8, 500 / this.height),
                rect: this.getRect(this.square ? 0.028 : 0)
            };
            this.uniforms.comicstripborder = {
                rect: this.getRect(0.018),
                border: [0.009 * this.height / this.width, 0.009],
                wide: (this.width - this.height / 2) / this.width
            };
            this.uniforms.comicstripwide = {
                wide: this.square || u ? 0: 1,
                square: this.square || u ? 1: 0
            };
            this.uniforms.comicstripsquare = {
                wide: this.square || u ? 0: 1,
                square: 1
            }
        },
        danger: function() {
            this.uniforms = {
                center: this.center,
                radius: this.width * 0.75,
                rect: this.getRect(0.05),
                fade: 32
            }
        },
        dent: function() {
            this.initShader("bulge");
            this.uniforms = {
                mode: 0,
                strength: - 1,
                center: this.center,
                radius: this.height / 4
            }
        },
        disco: function() {
            this.initShader("discored");
            this.initShader("discogreen");
            this.initShader("discoblue");
            this.startTime = Date.now() - 2000;
            this.uniforms = {
                discolights: {},
                discored: [new p(3.3, 2.9, 0.3, 0.3), new p(1.9, 2, 0.4, 0.4), new p(0.8, 0.7, 0.4, 0.5), new p(2.3, 0.1, 0.6, 0.3), new p(0.8, 1.7, 0.5, 0.4), new p(0.3, 1, 0.4, 0.4), new p(1.4, 1.7, 0.4, 0.5), new p(1.3, 2.1, 0.6, 0.3), new p(1.8, 1.7, 0.5, 0.4)],
                discogreen: [new p(1.2, 1.9, 0.3, 0.3), new p(0.7, 2.7, 0.4, 0.4), new p(1.4, 0.6, 0.4, 0.5), new p(2.6, 0.4, 0.6, 0.3), new p(0.7, 1.4, 0.5, 0.4), new p(0.7, 1.7, 0.4, 0.4), new p(0.8, 0.5, 0.4, 0.5), new p(1.4, 0.9, 0.6, 0.3), new p(0.7, 1.3, 0.5, 0.4)],
                discoblue: [new p(3.7, 0.3, 0.3, 0.3), new p(1.9, 1.3, 0.4, 0.4), new p(0.8, 0.9, 0.4, 0.5), new p(1.2, 1.7, 0.6, 0.3), new p(0.3, 0.6, 0.5, 0.4), new p(0.3, 0.3, 0.4, 0.4), new p(1.4, 0.8, 0.4, 0.5), new p(0.2, 0.6, 0.6, 0.3), new p(1.3, 0.5, 0.5, 0.4)]
            }
        },
        envy: function() {
            var I = this.square ? this.width / 8: (this.width + this.height) / 10, J = this.square ? this.width / 1.5: (this.width + this.height) / 3;
            this.initShader("envy");
            this.initShader("radialblur");
            this.initShader("envyborder");
            this.fps = 20;
            this.uniforms = {
                radialblur1: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [1 / this.width, 0]
                },
                radialblur2: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [0, 1 / this.height]
                },
                envyborder: {
                    rect: this.getRect(0.022),
                    fade: y / 3
                }
            }
        },
        fire: function() {
            var I = this.square ? (this.width - this.height) / this.width / 2: 0;
            this.initShader("fire");
            this.initShader("firevignette");
            this.initFrameTextures(6, this.width, this.height);
            this.fps = 20;
            this.quality = 0.7;
            this.uniforms = {
                frame: 0,
                center: this.center,
                radius: this.height * 0.4,
                width: (this.square ? this.height : this.width) / 3,
                left: I,
                right: 1 - I,
                tex: {
                    frame1: 1,
                    frame2: 2,
                    frame3: 3,
                    frame4: 4,
                    frame5: 5,
                    frame6: 6
                }
            }
        },
        filmstrip: function() {
            var I = u ? 1.5: 3, J = this.square ? (this.width - this.height) / this.width / 2: 0;
            this.initShader("filmstrip");
            this.initFrameTextures(1, Math.round(this.width * I), Math.round(this.height * I));
            this.fps = 20;
            this.quality = 0.7;
            this.uniforms = {
                frame: 0,
                init: true,
                left: J,
                right: 1 - J
            }
        },
        fisheye: function() {
            this.initShader("bulge");
            this.uniforms = {
                mode: 1,
                strength: 1,
                center: this.center,
                radius: this.height * 0.75
            }
        },
        ghost: function() {
            this.initShader("ghost");
            this.initFrameTextures(this.fps = u ? 8 : 20, this.width, this.height);
            this.uniforms.ghost = {
                frame: 0
            }
        },
        glaze: function() {
            this.initShader("glaze");
            this.initShader("overlay");
            this.fps = 20;
            this.uniforms = {
                glaze: {
                    size: [this.width / 2, this.width / 2],
                    time: 0
                },
                overlay: {
                    rect: this.getRect(0.025),
                    mult: 1.25,
                    offset: 0.7
                }
            }
        },
        glitch: function() {
            this.uniforms = {
                pixelSize: Math.max(10, this.height / j * 20),
                center: this.center,
                width: this.width / 2
            }
        },
        halo: function() {
            this.initShader("halo");
            this.initShader("softfocus");
            this.fps = 20
        },
        hazydays: function() {
            this.initShader("hazydays");
            this.extraTexture = this.getTexture(this.square ? q.hazydayssq : q.hazydays)
        },
        hotpink: function() {
            this.initShader("hotpink");
            this.extraTexture = this.getTexture(q.hotpink)
        },
        kaleidoscope: function() {
            if (this.mainTexture.type === this.gl.FLOAT) {
                this.initShader("kaleidoscope1");
                this.initShader("kaleidoscope2")
            } else {
                this.initShader("kaleidoscope")
            }
            this.uniforms = {
                center: this.center,
                offset: [this.width / 2, this.height * 0.1]
            }
        },
        lomo: function() {
            this.uniforms = {
                quad: 0,
                center: this.center,
                radius: this.width * 0.8,
                exposure: 2.25
            }
        },
        lomoquad: function() {
            this.initShader("lomo");
            this.isQuad = true;
            this.uniforms.lomoquad = {
                center: this.center,
                radius: this.width * 0.85,
                exposure: 2.25,
                rect: this.getRect(0.028),
                fade: 80
            }
        },
        lsd: function() {
            this.initShader("lsd");
            this.sourceTexture.loadContentsOf(this.source);
            this.tempTexture.drawTo(this.mainDrawRect);
            this.fps = 15
        },
        magazine: function() {
            var I = Math.PI / 3;
            this.quality = 0.6;
            this.uniforms = {
                center: this.center,
                size: Math.min(0.8, 400 / this.height),
                cosa: Math.cos(I),
                sina: Math.sin(I),
                rect: this.getRect(0.028),
                fade: 48 * 24
            }
        },
        mix: function(I) {
            this.initShader("mix");
            this.uniforms.mix = {
                strength: I || 8
            }
        },
        mono: function() {
            this.uniforms = {
                quad: 0
            }
        },
        monoquad: function() {
            this.initShader("mono");
            this.isQuad = true;
            this.uniforms.monoquad = {
                rect: this.getRect(0.028),
                fade: 120
            }
        },
        neon: function() {
            this.quality = 0.9
        },
        nightvision: function() {
            this.quality = 0.7;
            this.uniforms = {
                center: this.center,
                radius: (this.square ? this.height : this.width) * 0.3
            }
        },
        oldmovie: function() {
            this.initShader("oldmovienoise");
            this.initShader("oldmoviedirt");
            this.initShader("sepia");
            this.fps = 10;
            this.quality = 0.7;
            this.uniforms = {
                flicker: 0,
                jump: 0,
                line: 0,
                dot0: new Array(3),
                dot1: new Array(3),
                dot2: new Array(3),
                sepia: {
                    center: this.center,
                    radius: this.height / 2,
                    width: (this.square ? this.height : this.width) / 3
                }
            }
        },
        outline: function() {
            this.quality = 0.7;
            this.uniforms = {
                rect: this.getRect(0.01)
            }
        },
        pinch: function() {
            this.initShader("bulge");
            this.uniforms = {
                mode: 1,
                strength: - 0.5,
                center: this.center,
                radius: this.height / 4
            }
        },
        popart: function() {
            this.initShader("popart");
            this.extraTexture = this.getTexture(q.popart);
            this.quality = 0.9
        },
        popbooth: function() {
            this.initShader("popart");
            this.extraTexture = this.getTexture(q.popbooth)
        },
        quad: function() {
            this.uniforms.quad = {
                texSize: this.size,
                square: this.square ? 1: 0,
                quad: 1
            }
        },
        quadcam: function() {
            this.initShader("quadcam");
            this.isQuad = true
        },
        rainbow: function() {
            var I = 32 * this.height / j;
            this.initShader("rainbow");
            this.initShader("overlay");
            this.initShader("rainbowborder");
            this.uniforms = {
                rainbow: {
                    size: [this.width, this.square ? this.width: this.height],
                    offset: this.square ? 0.4: 0.25
                },
                overlay: {
                    rect: this.getRect(0),
                    mult: 1.4,
                    offset: 0.6
                },
                rainbowborder: {
                    texSize: this.size,
                    radius: I,
                    border: 1.5,
                    ratio: this.square ? 1: this.width / this.height
                }
            }
        },
        retro: function() {
            this.initShader("retro");
            this.extraTexture = this.getTexture(this.square ? q.retrosq : q.retro)
        },
        ripple: function() {
            this.uniforms = {
                center: this.center,
                wavelength: this.height / 16,
                amplitude: this.height / 22
            }
        },
        rose: function() {
            var I = this.square ? this.height: this.width;
            this.uniforms = {
                center: this.center,
                radius: I / 6.4,
                width: I * 0.75,
                rect: this.getRect(0.03),
                fade: 75
            }
        },
        shuffle: function() {
            if (!u && this.initShader("shuffle")) {
                this.initFrameTextures(27, this.width, this.height);
                this.uniforms = {
                    frame: 0,
                    tex: {
                        frame1: 1,
                        frame2: 2,
                        frame3: 3,
                        frame4: 4,
                        frame5: 5,
                        frame6: 6,
                        frame7: 7,
                        frame8: 8,
                        frame9: 9
                    }
                }
            } else {
                this.initShader("shufflesimple");
                this.initFrameTextures(12, this.width, this.height);
                this.uniforms = {
                    frame: 0,
                    tex: {
                        frame1: 1,
                        frame2: 2,
                        frame3: 3,
                        frame4: 4
                    }
                }
            }
            this.fps = 20
        },
        silk: function() {
            var I = (this.square ? this.height : this.width) / 8, J = this.height;
            this.initShader("silk");
            this.initShader("radialblur");
            this.fps = 20;
            this.uniforms = {
                silk: {
                    texSize: this.size,
                    center: this.center,
                    radius: I * 2,
                    width: J * 1.5
                },
                radialblur1: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [1 / this.width, 0]
                },
                radialblur2: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [0, 1 / this.height]
                }
            }
        },
        snow: function() {
            var J = Math.max(60, Math.floor(this.height / 4)), I = Math.floor(J * this.width / this.height);
            this.tempContext2D = c.getContext2D(I, J);
            this.assets.snowflakes = [];
            this.uniforms = {
                center: this.center,
                radius: (this.square ? this.height : this.width) / 3,
                width: this.height / 2
            }
        },
        softfocus: function() {
            this.initShader("softfocus");
            this.fps = 20
        },
        sparkle: function() {
            var J = Math.max(60, Math.floor(this.height / 4)), I = Math.floor(J * this.width / this.height);
            this.initShader("sparkle");
            this.initFrameTextures(1, this.width, this.height);
            this.tempContext2D = c.getContext2D(I, J);
            this.fps = 20;
            this.assets.sparkles = [];
            this.uniforms = {
                mirror: this.mirror ? 1: 0,
                tex: {
                    texture2: 1,
                    texture3: 2
                }
            }
        },
        spectrum: function() {
            this.quality = 0.7
        },
        spiral: function() {
            var P = 7, M = j / this.height * 0.95, N = Math.cos(P), L = Math.sin(P), K = 60 * this.height / j, J = 140 * this.height / j, I = Math.log(J / K), O = Math.atan(I / Math.PI / 2);
            if (this.mainTexture.type === this.gl.FLOAT) {
                this.initShader("spiral1");
                this.initShader("spiral2")
            } else {
                this.initShader("spiral")
            }
            this.uniforms = {
                spiralx: K,
                a: I,
                center: this.center,
                za: [N * M, L * M],
                start: [(this.center[0] * N + this.center[1] * L)*-M, (this.center[1] * N - this.center[0] * L) * M],
                s: [Math.cos(O), Math.sin(O)]
            }
        },
        splitscreen: function() {
            this.initShader("splitscreen");
            this.initFrameTextures(this.fps = u ? 10 : 20, this.width, this.height);
            this.uniforms = {
                frame: 0
            }
        },
        thermal: function() {
            this.initShader("thermal");
            this.extraTexture = this.getTexture(q.thermal);
            this.quality = 0.7
        },
        trail: function() {
            this.initShader("trail");
            this.sourceTexture.loadContentsOf(this.source);
            this.tempTexture.drawTo(this.mainDrawRect)
        },
        tunnel: function() {
            this.uniforms = {
                center: this.center,
                radius: this.height * 0.2
            }
        },
        twist: function() {
            this.uniforms = {
                center: this.center,
                radius: this.height / 2,
                angle: - 150 * Math.PI / 180
            }
        },
        underwater: function() {
            this.initShader("underwater");
            this.initShader("underwaterblue");
            this.assets.bubbles = new Array(12);
            this.uniforms = {
                center: this.center,
                radius: (this.square ? this.height : this.width) / 3,
                width: this.height / 2
            }
        },
        vintage: function() {
            this.initShader("vintage");
            this.extraTexture = this.getTexture(q.vintage);
            this.uniforms = {
                center: this.center,
                radius: (this.square ? this.height : this.width) / 3,
                width: this.height * 0.6
            }
        },
        watercolor: function() {
            this.initShader("watercolor");
            this.extraTexture = this.getTexture(q.watercolor);
            this.quality = 0.9;
            this.uniforms = {
                rect: this.getRect(0.028),
                fade: 100
            }
        },
        wedge: function() {
            this.uniforms = {
                center: this.center
            }
        },
        xpro: function() {
            var I = this.square ? this.width / 6: (this.width + this.height) / 8, J = this.square ? this.width / 3: (this.width + this.height) / 6;
            this.initShader("xpro");
            this.initShader("radialblur");
            this.initShader("xproborder");
            this.fps = 20;
            this.uniforms = {
                radialblur1: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [1 / this.width, 0]
                },
                radialblur2: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [0, 1 / this.height]
                },
                xproborder: {
                    rect: this.getRect(0.022),
                    fade: 120
                }
            }
        },
        zinc: function() {
            var I = this.square ? this.width / 6: (this.width + this.height) / 8, J = this.square ? this.width / 1.5: (this.width + this.height) / 3;
            this.initShader("zinc");
            this.initShader("radialblur");
            this.fps = 20;
            this.uniforms = {
                radialblur1: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [1 / this.width, 0]
                },
                radialblur2: {
                    texSize: this.size,
                    center: this.center,
                    blur: Math.floor(this.width / 32),
                    radius: I,
                    width: J,
                    delta: [0, 1 / this.height]
                },
                zinc: {
                    rect: this.getRect(0.022),
                    fade: j / 3
                }
            }
        }
    }, A = {
        add: function(I) {
            if (!this.uniforms.add) {
                a.add.call(this, I)
            }
            this.shaders.add.textures(x);
            z.call(this, this.shaders.add, this.uniforms.add)
        },
        alien: function() {
            this.shaders.alien.textures(x);
            this.tempTexture.drawTo(this.mainDrawRect).use(1);
            if (!u) {
                A.blur.call(this, Math.floor(this.width / 16))
            }
            z.call(this, this.shaders.alien);
            this.mainDraw()
        },
        blur: function(I) {
            if (this.shaders.blursimple) {
                z.call(this, this.shaders.blursimple, this.uniforms)
            } else {
                if (!this.uniforms.blur1) {
                    a.blur.call(this, I)
                }
                z.call(this, this.shaders.blur, this.uniforms.blur1);
                z.call(this, this.shaders.blur, this.uniforms.blur2)
            }
        },
        bokeh: function() {
            if (!u) {
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur1);
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur2)
            }
            this.extraTexture.use(1);
            this.shaders.bokeh.textures(x);
            this.uniforms.bokeh.time = this.uniforms.time;
            for (var I = 4; I--;) {
                this.uniforms.bokeh.init = I === 3 ? 1 : 0;
                for (var J = 8; J--;) {
                    this.uniforms.bokeh["p" + J] = this.uniforms.bokehs[J + I * 8].move()
                }
                z.call(this, this.shaders.bokeh, this.uniforms.bokeh)
            }
            this.mainDraw()
        },
        cartoon: function() {
            z.call(this, this.shaders.cartoonink, this.uniforms.cartoonink);
            z.call(this, this.shaders.cartoon, this.uniforms.cartoon);
            this.mainDraw()
        },
        cocktail: function() {
            this.shaders.cocktail.textures(x);
            this.tempTexture.drawTo(this.mainDrawRect).use(1);
            if (!u) {
                A.blur.call(this, Math.floor(this.width / 16))
            }
            z.call(this, this.shaders.cocktail, this.uniforms);
            this.extraTexture.use(1);
            this.shaders.cocktailborder.textures(x);
            z.call(this, this.shaders.cocktailborder, this.uniforms);
            this.mainDraw()
        },
        cocoa: function() {
            this.shaders.cocoa.textures(x);
            this.tempTexture.drawTo(this.mainDrawRect).use(1);
            if (!u) {
                A.blur.call(this, Math.floor(this.width / 32))
            }
            z.call(this, this.shaders.cocoa, this.uniforms);
            this.mainDraw()
        },
        colorghost: function() {
            var J = this.uniforms.frame, I = this.frameTextures.length;
            this.mainTexture.use(0);
            this.frameTextures[J].drawTo(this.defaultDrawRect);
            J++;
            this.uniforms.frame = J%=I;
            this.frameTextures[J].use(1);
            this.frameTextures[(J + I / 2)%I].use(2);
            this.shaders.colorghost.textures(this.uniforms.tex);
            z.call(this, this.shaders.colorghost);
            this.mainDraw()
        },
        comicstrip: function() {
            this.shaders.comicbook.uniforms(this.uniforms.comicstrip);
            A.quad.call(this, this.shaders.comicbook)
        },
        dent: function() {
            z.call(this, this.shaders.bulge, this.uniforms);
            this.mainDraw()
        },
        disco: function() {
            var J = this.uniforms.time, I;
            for (I = 0; I < 9; I++) {
                this.uniforms.discolights["p" + I] = this.uniforms.discored[I].getPos(J)
            }
            z.call(this, this.shaders.discored, this.uniforms.discolights);
            for (I = 0; I < 9; I++) {
                this.uniforms.discolights["p" + I] = this.uniforms.discogreen[I].getPos(J)
            }
            z.call(this, this.shaders.discogreen, this.uniforms.discolights);
            for (I = 0; I < 9; I++) {
                this.uniforms.discolights["p" + I] = this.uniforms.discoblue[I].getPos(J)
            }
            z.call(this, this.shaders.discoblue, this.uniforms.discolights);
            this.mainDraw()
        },
        envy: function() {
            z.call(this, this.shaders.envy);
            if (!u) {
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur1);
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur2)
            }
            z.call(this, this.shaders.envyborder, this.uniforms.envyborder);
            this.mainDraw()
        },
        filmstrip: function() {
            var K = this.defaultShader, I = this.frameTextures[0], L = this.uniforms.frame, J;
            this.mainTexture.use(0);
            this.gl.viewport(0, 0, I.width, I.height);
            if (this.uniforms.init) {
                this.uniforms.init = false;
                I.drawTo(function() {
                    for (J = 0; J < 6; J++) {
                        for (var M = 0; M < 6; M++) {
                            K.drawRect(J / 6, M / 6, (J + 1) / 6, (M + 1) / 6)
                        }
                    }
                }).use(1)
            } else {
                I.drawTo(function() {
                    for (J = 0; J < 6; J++) {
                        switch (L) {
                        case J:
                            K.drawRect(J / 6, 0, (J + 1) / 6, 1 / 6);
                            break;
                        case J + 6:
                            K.drawRect(J / 6, 1 / 6, (J + 1) / 6, 2 / 6);
                            break;
                        case J + 12:
                            K.drawRect(J / 6, 2 / 6, (J + 1) / 6, 0.5);
                            break;
                        case J + 18:
                            K.drawRect(J / 6, 0.5, (J + 1) / 6, 4 / 6);
                            break;
                        case J + 24:
                            K.drawRect(J / 6, 4 / 6, (J + 1) / 6, 5 / 6);
                            break;
                        case J + 30:
                            K.drawRect(J / 6, 5 / 6, (J + 1) / 6, 1);
                            break
                        }
                    }
                }).use(1)
            }
            this.gl.viewport(0, 0, this.width, this.height);
            this.shaders.filmstrip.textures(x);
            z.call(this, this.shaders.filmstrip, this.uniforms);
            L++;
            this.uniforms.frame = L%=36;
            this.mainDraw()
        },
        fire: function() {
            var I, K = this.uniforms.frame, J = this.frameTextures.length;
            this.mainTexture.use(0);
            this.frameTextures[K].drawTo(this.defaultDrawRect);
            K++;
            this.uniforms.frame = K%=J;
            for (I = J; I--;) {
                this.frameTextures[(K + I)%J].use(I + 1)
            }
            this.shaders.fire.textures(this.uniforms.tex);
            z.call(this, this.shaders.fire, this.uniforms);
            z.call(this, this.shaders.firevignette, this.uniforms);
            this.mainDraw()
        },
        fisheye: function() {
            z.call(this, this.shaders.bulge, this.uniforms);
            this.mainDraw()
        },
        ghost: function() {
            var I = this.uniforms.ghost.frame;
            this.mainTexture.use(0);
            this.frameTextures[I].drawTo(this.defaultDrawRect);
            I++;
            this.uniforms.ghost.frame = I%=this.frameTextures.length;
            this.frameTextures[I].use(1);
            A.add.call(this, 0.5);
            this.mainDraw()
        },
        glaze: function() {
            var I = this;
            this.uniforms.glaze.time = this.uniforms.time;
            this.mainTexture.use(0);
            this.tempTexture.drawTo(function() {
                I.shaders.glaze.uniforms(I.uniforms.glaze).drawRect()
            }).use(1);
            this.shaders.overlay.textures(x);
            z.call(this, this.shaders.overlay, this.uniforms.overlay);
            this.mainDraw()
        },
        halo: function() {
            this.shaders.softfocus.textures(x);
            this.tempTexture.drawTo(this.mainDrawRect).use(1);
            if (!u) {
                A.blur.call(this, Math.floor(this.width / 16))
            }
            z.call(this, this.shaders.softfocus);
            z.call(this, this.shaders.halo, this.uniforms);
            this.mainDraw()
        },
        hazydays: function() {
            this.extraTexture.use(1);
            this.shaders.hazydays.textures(x);
            z.call(this, this.shaders.hazydays, this.uniforms);
            this.mainDraw()
        },
        hotpink: function() {
            this.extraTexture.use(1);
            this.shaders.hotpink.textures(x);
            z.call(this, this.shaders.hotpink);
            this.mainDraw()
        },
        kaleidoscope: function() {
            if (this.mainTexture.type === this.gl.FLOAT) {
                this.shaders.kaleidoscope2.textures(x);
                this.tempTexture.drawTo(this.mainDrawRect).use(1);
                z.call(this, this.shaders.kaleidoscope1, this.uniforms);
                z.call(this, this.shaders.kaleidoscope2, this.uniforms)
            } else {
                z.call(this, this.shaders.kaleidoscope, this.uniforms)
            }
            this.mainDraw()
        },
        lomoquad: function() {
            this.shaders.lomo.uniforms(this.uniforms.lomoquad);
            A.quad.call(this, this.shaders.lomo)
        },
        lsd: function() {
            this.tempTexture.use(1);
            if (!u) {
                A.blur.call(this, 2)
            }
            z.call(this, this.shaders.lsd);
            A.add.call(this, u ? 0.6 : 0.85);
            this.tempTexture.swapWith(this.mainTexture);
            this.mainDraw()
        },
        mix: function(I) {
            if (!this.uniforms.mix) {
                a.mix.call(this, I)
            }
            this.shaders.mix.textures(x);
            z.call(this, this.shaders.mix, this.uniforms.mix)
        },
        monoquad: function() {
            this.shaders.mono.uniforms(this.uniforms.monoquad);
            A.quad.call(this, this.shaders.mono)
        },
        oldmovie: function() {
            if (Math.random() < 0.04) {
                this.uniforms.jump = Math.random() * 0.02 + 0.02
            } else {
                this.uniforms.jump = 0
            }
            this.uniforms.flicker = Math.random() * 1.25;
            this.uniforms.dot0[0] = Math.random() * this.width;
            this.uniforms.dot1[0] = Math.random() * this.width;
            this.uniforms.dot2[0] = Math.random() * this.width;
            this.uniforms.dot0[1] = Math.random() * this.height;
            this.uniforms.dot1[1] = Math.random() * this.height;
            this.uniforms.dot2[1] = Math.random() * this.height;
            this.uniforms.dot0[2] = Math.random() * this.width / 60 + 1;
            this.uniforms.dot1[2] = Math.random() * this.width / 60 + 1;
            this.uniforms.dot2[2] = Math.random() < 0.05 ? this.width * 2 : Math.random() * this.width / 60 + 1;
            var I = this.uniforms.line;
            if (Math.random() < 0.025) {
                I = this.width
            } else {
                if (Math.random() < 0.05) {
                    I = this.width * 0.1
                } else {
                    I += (Math.random() * this.width * 0.25 - I) * 0.05
                }
            }
            this.uniforms.line = I;
            z.call(this, this.shaders.oldmovienoise, this.uniforms);
            z.call(this, this.shaders.oldmoviedirt, this.uniforms);
            z.call(this, this.shaders.sepia, this.uniforms.sepia);
            this.mainDraw()
        },
        pinch: function() {
            z.call(this, this.shaders.bulge, this.uniforms);
            this.mainDraw()
        },
        popart: function() {
            this.extraTexture.use(1);
            this.shaders.popart.textures(x);
            z.call(this, this.shaders.popart, this.uniforms);
            this.mainDraw()
        },
        popbooth: function() {
            this.extraTexture.use(1);
            this.shaders.popart.textures(x);
            z.call(this, this.shaders.popart, this.uniforms);
            this.mainDraw()
        },
        quad: function(M) {
            var L = this, I = this.square ? (this.width - this.height) / this.width / 2: 0, P, N = 0, J = 0.5, O = 0.5, K = this.blackShader;
            switch (M) {
            case this.shaders.mono:
            case this.shaders.lomo:
                N = 0.004;
                break;
            case this.shaders.comicbook:
                N = 0.005;
                if (!this.square&&!u) {
                    O = this.height / 2 / this.width;
                    J = 1 - O
                }
                K = this.whiteShader;
                break
            }
            P = N * this.height / this.width;
            if (!this.uniforms.quad) {
                a.quad.call(this)
            }
            this.mainTexture.use(0);
            this.tempTexture.drawTo(function() {
                M.uniforms(L.uniforms.quad);
                switch (L.quadPos) {
                case 0:
                case 4:
                    K.drawRect(0.5, I, 1, J);
                    M.uniforms(L.uniforms.comicstripwide).drawRect(0.5 - N, I + P, 1 - N, J + P);
                case 3:
                    K.drawRect(0.5, J, 1, 1 - I);
                    M.uniforms(L.uniforms.comicstripsquare).drawRect(0.5 - N, J - P, 1 - N, 1 - I - P);
                case 2:
                    K.drawRect(0, I, 0.5, O);
                    M.uniforms(L.uniforms.comicstripsquare).drawRect(N, I + P, 0.5 + N, O + P);
                case 1:
                    K.drawRect(0, O, 0.5, 1 - I);
                    M.uniforms(L.uniforms.comicstripwide).drawRect(N, O - P, 0.5 + N, 1 - I - P)
                }
            }).use(0);
            if (L.uniforms.comicstripborder&&!this.square&&!u) {
                this.swapTexture.drawTo(function() {
                    L.shaders.comicstripborder.uniforms(L.uniforms.comicstripborder).drawRect()
                }).swapWith(this.mainTexture);
                this.mainTexture.use(0)
            }
            this.defaultShader.drawRect()
        },
        quadcam: function() {
            A.quad.call(this, this.shaders.quadcam)
        },
        rainbow: function() {
            var I = this;
            this.mainTexture.use(0);
            this.tempTexture.drawTo(function() {
                I.shaders.rainbow.uniforms(I.uniforms.rainbow).drawRect()
            }).use(1);
            this.shaders.overlay.textures(x);
            z.call(this, this.shaders.overlay, this.uniforms.overlay);
            z.call(this, this.shaders.rainbowborder, this.uniforms.rainbowborder);
            this.mainDraw()
        },
        retro: function() {
            this.extraTexture.use(1);
            this.shaders.retro.textures(x);
            z.call(this, this.shaders.retro, this.uniforms);
            this.mainDraw()
        },
        shuffle: function() {
            var I, K = this.uniforms.frame, J = this.frameTextures.length;
            this.mainTexture.use(0);
            this.frameTextures[K].drawTo(this.defaultDrawRect);
            K++;
            this.uniforms.frame = K%=J;
            for (I = J / 3; I--;) {
                this.frameTextures[(K + I * 3)%J].use(I + 1)
            }
            if (this.shaders.shufflesimple) {
                this.shaders.shufflesimple.textures(this.uniforms.tex);
                z.call(this, this.shaders.shufflesimple, this.uniforms)
            } else {
                this.shaders.shuffle.textures(this.uniforms.tex);
                z.call(this, this.shaders.shuffle, this.uniforms)
            }
            this.mainDraw()
        },
        silk: function() {
            z.call(this, this.shaders.silk, this.uniforms.silk);
            if (!u) {
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur1);
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur2)
            }
            this.mainDraw()
        },
        softfocus: function() {
            this.shaders.softfocus.textures(x);
            this.tempTexture.drawTo(this.mainDrawRect).use(1);
            A.blur.call(this, Math.floor(this.width / 40));
            z.call(this, this.shaders.softfocus);
            this.mainDraw()
        },
        sparkle: function() {
            this.shaders.sparkle.textures(this.uniforms.tex);
            this.tempTexture.drawTo(this.mainDrawRect).use(1);
            if (!u) {
                A.blur.call(this, Math.floor(this.width / 40))
            }
            this.frameTextures[0].loadContentsOf(this.context2D.canvas).use(2);
            z.call(this, this.shaders.sparkle, this.uniforms);
            this.mainDraw()
        },
        spiral: function() {
            if (this.mainTexture.type === this.gl.FLOAT) {
                this.shaders.spiral2.textures(x);
                this.tempTexture.drawTo(this.mainDrawRect).use(1);
                z.call(this, this.shaders.spiral1, this.uniforms);
                z.call(this, this.shaders.spiral2, this.uniforms)
            } else {
                z.call(this, this.shaders.spiral, this.uniforms)
            }
            this.mainDraw()
        },
        splitscreen: function() {
            var I = this.uniforms.frame;
            this.mainTexture.use(0);
            this.frameTextures[I].drawTo(this.defaultDrawRect);
            I++;
            this.uniforms.frame = I%=this.frameTextures.length;
            this.frameTextures[I].use(1);
            this.shaders.splitscreen.textures(x);
            z.call(this, this.shaders.splitscreen, this.uniforms);
            this.mainDraw()
        },
        thermal: function() {
            this.extraTexture.use(1);
            this.shaders.thermal.textures(x);
            z.call(this, this.shaders.thermal);
            this.mainDraw()
        },
        trail: function() {
            this.tempTexture.use(1);
            this.shaders.trail.textures(x);
            z.call(this, this.shaders.trail);
            this.tempTexture.swapWith(this.mainTexture);
            this.mainDraw()
        },
        underwater: function() {
            z.call(this, this.shaders.underwater, this.uniforms);
            z.call(this, this.shaders.underwaterblue, this.uniforms);
            this.mainDraw()
        },
        vintage: function() {
            this.extraTexture.use(1);
            this.shaders.vintage.textures(x);
            z.call(this, this.shaders.vintage, this.uniforms);
            this.mainDraw()
        },
        watercolor: function() {
            this.extraTexture.use(1);
            this.shaders.watercolor.textures(x);
            z.call(this, this.shaders.watercolor, this.uniforms);
            this.mainDraw()
        },
        xpro: function() {
            z.call(this, this.shaders.xpro);
            if (!u) {
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur1);
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur2)
            }
            z.call(this, this.shaders.xproborder, this.uniforms.xproborder);
            this.mainDraw()
        },
        zinc: function() {
            if (!u) {
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur1);
                z.call(this, this.shaders.radialblur, this.uniforms.radialblur2)
            }
            z.call(this, this.shaders.zinc, this.uniforms.zinc);
            this.mainDraw()
        }
    }, b = {
        snow: function() {
            var R = this.context2D, U = this.tempContext2D, T = R.canvas.width, N = R.canvas.height, O = U.canvas.width, J = U.canvas.height, K, I, P, L, V, Q = Math.max(1200, Math.floor(2400 / j * N)), S = Math.max(6, Math.floor(12 / j * N));
            try {
                R.drawImage(this.source, 0, 0, T, N)
            } catch (M) {
                return 
            }
            try {
                U.drawImage(R.canvas, 0, 0, O, J)
            } catch (M) {
                return 
            }
            I = U.getImageData(0, 0, O, J).data;
            K = g(I, F, O, J);
            while (this.assets.snowflakes.length < Q && S) {
                S--;
                V = (Math.random() + 0.2) * N / j * 10 + 1;
                this.assets.snowflakes.push(new m(Math.random() * T, 4 - V * 2, V, Math.random() - 0.5))
            }
            for (L = 0; L < this.assets.snowflakes.length; L++) {
                P = this.assets.snowflakes[L];
                if (P.y < J / 16 || P.y > J - J / 16 || K[Math.floor(P.x) + Math.floor(P.y) * O] < 204) {
                    P.vx*=0.997;
                    P.vy*=0.997;
                    P.x += P.vx;
                    P.y += P.vy;
                    if (P.melt < 1) {
                        P.melt += 1 / 16
                    } else {
                        P.melt = 1
                    }
                    if (P.x > T + P.width) {
                        P.x -= T + P.width
                    }
                    if (P.x<-P.width) {
                        P.x += T + P.width
                    }
                    if (P.y > J + P.height) {
                        this.assets.snowflakes.splice(L++, 1)
                    }
                } else {
                    if (P.melt > 0) {
                        P.melt -= 1 / 128;
                        P.vy = P.height * 0.3
                    } else {
                        this.assets.snowflakes.splice(L++, 1)
                    }
                }
                R.save();
                R.globalAlpha = Math.min(1, P.melt * 4);
                R.drawImage(q.snowflake, P.x * T / O - P.width / 2, P.y * N / J - P.height / 2, P.width, P.height);
                R.restore()
            }
            this.sourceTexture.loadContentsOf(R.canvas)
        },
        sparkle: function() {
            var X = this.context2D, R = this.tempContext2D, Z = q.sparkle, Q = X.canvas.width, W = X.canvas.height, Y = R.canvas.width, M = R.canvas.height, L, N, I, S, K, P, O, T, V, U = 0;
            this.sourceTexture.loadContentsOf(this.source);
            X.fillRect(0, 0, this.width, this.height);
            try {
                R.drawImage(this.source, 0, 0, Y, M)
            } catch (J) {
                return 
            }
            N = R.getImageData(0, 0, Y, M).data;
            L = g(N, o, Y, M);
            do {
                U++;
                P = Math.floor(Y * Math.random());
                O = Math.floor(M * Math.random());
                if (L[P + O * Y] > 32) {
                    this.assets.sparkles.push(new d(P, O, Math.random() < 0.05))
                }
            }
            while (this.assets.sparkles.length < 128 && U < 32);
            for (V = 0; V < this.assets.sparkles.length; V++) {
                T = this.assets.sparkles[V];
                if (T.big) {
                    T.big = false;
                    K = 512
                } else {
                    K = N[(T.x + T.y * Y) * 4] + (Math.random() - 0.5) * 16
                }
                if (K < 4 || L[T.x + T.y * Y] < 32) {
                    this.assets.sparkles.splice(V++, 1)
                } else {
                    K*=W / 122880;
                    I = Z.width * K;
                    S = Z.height * K;
                    X.drawImage(Z, T.x * Q / Y - I / 2, T.y * W / M - S / 2, I, S)
                }
            }
        },
        underwater: function() {
            var P = this.context2D, L = q.bubbles, K = P.canvas.width, N = P.canvas.height, O = this.assets.bubbles.length, M, I;
            P.save();
            try {
                P.drawImage(this.source, 0, 0, K, N)
            } catch (J) {
                P.restore();
                return 
            }
            for (M = O; M--;) {
                I = this.assets.bubbles[M] = this.assets.bubbles[M] || new e(Math.random() * K, Math.random() * N, (this.height < j / 2 ? M + 5 : M), O);
                I.x += Math.sin(I.y / 12) * 2;
                I.y -= I.size * 0.15;
                if (I.y<-I.size) {
                    I.x = Math.random() * K;
                    I.y = N + I.size
                }
                P.drawImage(L, I.offset, 0, I.size, I.size, Math.floor(I.x), Math.floor(I.y), I.size, I.size)
            }
            P.restore();
            this.sourceTexture.loadContentsOf(P.canvas)
        }
    }, q, u = $("body").hasClass("mobile"), h = false, w = false, D = 2, G = 253, C;
    function g(I, S, U, P) {
        var Q = new Float32Array(U * P);
        for (var O = I.length - 4; O >= 0; O -= 4) {
            I[O] = I[O] * 0.3 + I[O + 1] * 0.59 + I[O + 2] * 0.11
        }
        for (var T = U; T--;) {
            for (var R = P; R--;) {
                var N = 0;
                for (var M = 3; M--;) {
                    for (var K = 3; K--;) {
                        var L = T + M - 1;
                        var J = R + K - 1;
                        if (J >= 0 && J < P && L >= 0 && L < U) {
                            N += I[(L + J * U) * 4] * S[M + K * 3]
                        }
                    }
                }
                Q[T + R * U] = N
            }
        }
        return Q
    }
    function t(I, K, J) {
        this.p = [I, K, J];
        this.dx = 0;
        this.dy = 0;
        this.reset()
    }
    t.prototype.reset = function() {
        this.dx = Math.pow(this.p[2], 4) / 100000000;
        this.dy = this.dx / 3 - Math.random()
    };
    t.prototype.move = function() {
        this.p[0] += this.dx;
        if (this.p[0] > y) {
            this.reset();
            this.p[0] -= y + this.p[2]
        }
        this.p[1] += this.dy;
        if (this.p[1] > j) {
            this.reset();
            this.p[1] -= j + this.p[2]
        } else {
            if (this.p[1]<-this.p[2]) {
                this.p[1] += j + this.p[2];
                this.reset()
            }
        }
        return this.p
    };
    function e(I, L, J, K) {
        this.x = I;
        this.y = L;
        if (J === 0) {
            this.size = 64;
            this.offset = 0
        } else {
            if (J < K * 2 / 4) {
                this.size = 48;
                this.offset = 64
            } else {
                if (J < K * 3 / 4) {
                    this.size = 32;
                    this.offset = 64 + 48
                } else {
                    this.size = 16;
                    this.offset = 64 + 48 + 32
                }
            }
        }
    }
    function p(J, I, L, K) {
        this.fx = J;
        this.fy = I;
        this.sx = L;
        this.sy = K;
        this.pos = new Array(2)
    }
    p.prototype.getPos = function(I) {
        this.pos[0] = Math.cos(this.fx * I) * this.sx + 0.5;
        this.pos[1] = Math.sin(this.fy * I) * this.sy + 0.5;
        return this.pos
    };
    function d(J, K, I) {
        this.x = J;
        this.y = K;
        this.big = I
    }
    function m(I, L, J, K) {
        this.x = I;
        this.y = L;
        this.width = J * 1.5;
        this.height = J;
        this.vx = K;
        this.vy = this.height * 0.3;
        this.melt = 1
    }
    function c(K, I, J, R) {
        if (this.gl ||!K ||!I) {
            return 
        }
        this.source = I;
        this.width = J || y;
        this.height = R || j;
        K.width = this.width;
        K.height = this.height;
        this.size = [this.width, this.height];
        this.center = [this.width / 2, this.height / 2];
        this.context2D = c.getContext2D(Math.max(200, Math.floor(this.width / 2)), Math.max(200 * this.height / this.width, Math.floor(this.height / 2)));
        if (!C) {
            C = c.getContext2D(Math.max(160, Math.floor(this.width / 4)), Math.max(160 * this.height / this.width, Math.floor(this.height / 4)))
        }
        try {
            this.gl = K.getContext("experimental-webgl", {
                premultipliedAlpha: false
            })
        } catch (P) {
            this.gl = null;
            throw P
        }
        if (!this.gl) {
            throw "WebGL error"
        }
        var O = this, N = this.gl, M = N.getExtension("OES_texture_float"), L = N.getExtension("OES_texture_float_linear"), Q = M || L ? N.FLOAT: N.UNSIGNED_BYTE;
        this.sourceTexture = new n.Texture(N, 0, 0, N.RGB, N.UNSIGNED_BYTE, null, N.LINEAR);
        this.mainTexture = new n.Texture(N, this.width, this.height, N.RGB, Q);
        this.swapTexture = new n.Texture(N, this.width, this.height, N.RGB, Q);
        this.tempTexture = new n.Texture(N, this.width, this.height, N.RGB, Q);
        this.defaultShader = new n.Shader(N);
        this.mainShader = n.Shader.getMainShader(N);
        this.blackShader = n.Shader.getBlackShader(N);
        this.whiteShader = n.Shader.getWhiteShader(N);
        this.defaultDrawRect = function() {
            O.defaultShader.drawRect()
        };
        this.mainDrawRect = function() {
            O.mainShader.drawRect();
            O.mainShader.uniforms(O.mainUniforms).drawRect()
        };
        this.shaders = {};
        this.mainUniforms = {
            mult: 1,
            offset: 0,
            mirror: 1
        };
        this.mirror = true;
        this.square = false;
        this.setEffect()
    }
    c.getContext2D = function(L, I) {
        var J = document.createElement("canvas");
        J.width = L;
        J.height = I;
        var K = J.getContext("2d");
        if (K) {
            K.clearRect(0, 0, L, I)
        }
        return K
    };
    function v(I) {
        return I.replace(/[a-zA-Z]/g, function(J) {
            return String.fromCharCode((J <= "Z" ? 90 : 122) >= (J = J.charCodeAt(0) + 13) ? J : J - 26)
        })
    }
    function B(L, J, K) {
        if (n.getImages) {
            try {
                q = n.getImages(u);
                delete n.getImages;
                if (L) {
                    L()
                }
            } catch (I) {
                if (J) {
                    J(I || K)
                }
            }
        } else {
            if (J) {
                J(K)
            }
        }
    }
    c.loadImages = function(K, J) {
        var I = n.Services.assetsURL + "js/app-images." + ($("#toy").attr("data-app-images") || 1) + ".js";
        $.ajax({
            url: I,
            dataType: "script",
            cache: true,
            timeout: 30000,
            error: function(N, M, L) {
                n.addScript(I);
                setTimeout(B, 10000, K, J, L || M)
            },
            success: function(L) {
                setTimeout(function() {
                    B(K, J, "Parse error")
                }, 100)
            }
        })
    };
    function E(J, I) {
        if (!w) {
            w = true;
            c.loadEffects(J, I, "/assets/fs/fs." + ($("#toy").attr("data-fs") || 1) + ".txt")
        }
    }
    c.loadEffects = function(K, J, I) {
        $.ajax({
            url: I || (n.Services.assetsURL + "fs/fs." + ($("#toy").attr("data-fs") || 1) + ".txt"),
            cache: true,
            timeout: 20000,
            error: function(N, M, L) {
                if (!I) {
                    E(K, J)
                } else {
                    J(L || M)
                }
            },
            complete: function(N) {
                if (N && N.statusText === "OK" && N.responseText) {
                    var P;
                    try {
                        P = window.atob(v(N.responseText))
                    } catch (O) {
                        if (!I) {
                            E(K, J)
                        } else {
                            J(O)
                        }
                        return 
                    }
                    var M = P.split("/*:*/\n"), L = M.length - 1, Q;
                    while (L > 0) {
                        L--;
                        Q = M[L].substr(3, M[L].indexOf(":*/") - 3);
                        if (Q) {
                            H[Q] = M[L]
                        }
                    }
                    if (K) {
                        K()
                    }
                } else {
                    if (J) {
                        if (!I) {
                            E(K, J)
                        } else {
                            J(N && N.statusText)
                        }
                    }
                }
            }
        })
    };
    function f(J) {
        for (var I = 2; I < 256; I++) {
            if (J[I] > 4) {
                return I
            }
        }
        return 2
    }
    function i(J) {
        for (var I = 253; I > 0; I--) {
            if (J[I] > 4) {
                return I
            }
        }
        return 253
    }
    c.autoEnhance = function(J) {
        var Q = 4, R = C.canvas.width, N = C.canvas.height;
        try {
            C.drawImage(J, - Q, - Q, R + Q * 2, N + Q * 2)
        } catch (O) {
            return {
                mult: 1,
                offset: 0
            }
        }
        var I = C.getImageData(0, 0, R, N).data, K = R * N, L = K * 4, P = [], M;
        for (M = 0; M < 256; M++) {
            P[M] = 0
        }
        while (K--) {
            P[(0.5 + I[L -= 4] * 0.3 + I[L + 1] * 0.59 + I[L + 2] * 0.11) | 0]++
        }
        for (M = 2; M < 254; M++) {
            if (P[M] < 8) {
                P[M] = 0
            }
            P[M] = P[M - 2] * 0.1 + P[M - 1] * 0.2 + P[M] * 0.4 + P[M + 1] * 0.2 + P[M + 2] + 0.1;
            if (P[M] < 8) {
                P[M] = 0
            }
        }
        D += (f(P) - D) / 8;
        G += (i(P) - G) / 8;
        return {
            mult: Math.min(2.5, 253 / (G - D)),
            offset: Math.min(60, D - 2)/-255
        }
    };
    function z(J, I) {
        this.mainTexture.use(0);
        this.swapTexture.drawTo(function() {
            J.uniforms(I).drawRect()
        }).swapWith(this.mainTexture)
    }
    function l() {
        z.call(this, this.shaders[this.id], this.uniforms);
        this.mainDraw()
    }
    c.prototype.mainDraw = function() {
        this.mainTexture.use(0);
        this.defaultShader.drawRect()
    };
    c.prototype.initShader = function(K) {
        if (this.shaders[K]) {
            return true
        }
        if (this.gl.isContextLost()) {
            return false
        }
        try {
            this.shaders[K] = new n.Shader(this.gl, null, H[K] ? "uniform sampler2D texture; uniform float square; uniform vec2 texSize; varying vec2 texCoord;" + H[K] : null);
            return true
        } catch (I) {
            var J = K;
            if (I) {
                J += ": " + I;
                J = J.replace(/(\r\n|\n|\r)/gm, "")
            }
            this.shaders[K] = this.defaultShader;
            if (J && /Compilation/.test(J)) {
                r++;
                if (r > s) {
                    n.UI.destroy("Effects not compiled");
                    return false
                }
            } else {
                if (!this.gl.isContextLost() && r <= s) {
                    n.trackEvent("Error", "Shader", J, true);
                    n.log("*ERROR*", "Shader", K)
                }
            }
            return false
        }
    };
    c.prototype.getTexture = function(I) {
        return new n.Texture(this.gl, 0, 0, this.gl.RGBA, this.gl.UNSIGNED_BYTE, I && I.width && I.height ? I : null)
    };
    c.prototype.initFrameTextures = function(L, K, I) {
        var J;
        if (this.frameTextures) {
            for (J = this.frameTextures.length; J--;) {
                if (this.frameTextures[J]) {
                    this.frameTextures[J].destroy();
                    this.frameTextures[J] = null
                }
            }
        }
        if (L && K && I) {
            this.frameTextures = new Array(L);
            for (J = 0; J < L; J++) {
                this.frameTextures[J] = new n.Texture(this.gl, K, I, this.gl.RGB, this.gl.UNSIGNED_BYTE)
            }
            this.sourceTexture.loadContentsOf(this.source);
            for (J = 0; J < L; J++) {
                this.frameTextures[J].drawTo(this.mainDrawRect)
            }
        } else {
            this.frameTextures = null
        }
    };
    c.prototype.setEffect = function(J) {
        if (this.gl) {
            this.gl.viewport(0, 0, this.width, this.height);
            this.gl.clearColor(0, 0, 0, 1);
            this.gl.clear(this.gl.COLOR_BUFFER_BIT | this.gl.DEPTH_BUFFER_BIT)
        } else {
            throw "WebGL error"
        }
        if (this.mainTexture) {
            this.mainTexture.use(0)
        } else {
            throw "Effects error"
        }
        if (this.extraTexture) {
            this.extraTexture.destroy()
        }
        this.extraTexture = null;
        this.tempContext2D = null;
        this.initFrameTextures();
        this.startTime = Date.now() - Math.round(300000 * Math.random());
        this.id = J || "normal";
        this.fps = 30;
        this.fpsGrid = 0;
        this.quality = 0.8;
        this.quadPos = 0;
        this.isQuad = false;
        this.assets = {};
        this.uniforms = {};
        var I = a[this.id];
        if (I) {
            I.call(this)
        }
        this.uniforms.square = this.square ? 1 : 0;
        this.uniforms.texSize = this.size;
        this.uniforms.time = 0;
        this.effect = A[this.id];
        if (!this.effect) {
            this.initShader(this.id);
            this.effect = l
        }
        this.canvasEffect = b[this.id];
        this.effectNum = k.indexOf(this.id) + 1;
        this.draw()
    };
    c.prototype.getEffectID = function(I) {
        return k[I - 1] || "normal"
    };
    c.prototype.previousEffect = function() {
        var I = this.effectNum - 1;
        if (I < 0) {
            I = k.length
        }
        try {
            this.setEffect(this.getEffectID(I))
        } catch (J) {}
    };
    c.prototype.nextEffect = function() {
        var I = this.effectNum + 1;
        I%=k.length + 1;
        try {
            this.setEffect(this.getEffectID(I))
        } catch (J) {}
    };
    c.prototype.useMirror = function(I) {
        this.mirror = I;
        this.mainUniforms.mirror = I ? 1 : 0;
        try {
            this.setEffect(this.id)
        } catch (J) {}
        return this
    };
    c.prototype.useSquare = function(I) {
        this.square = I;
        try {
            this.setEffect(this.id)
        } catch (J) {}
        return this
    };
    c.prototype.getRect = function(J) {
        var I = J || 0, L = I, K = I * this.height / this.width;
        if (this.square) {
            K += (this.width - this.height) / 2 / this.width
        }
        return [L, K, 1 - L, 1 - K]
    };
    c.prototype.autoEnhance = function() {
        var I = n.Effect.autoEnhance(this.source);
        this.mainUniforms.mult = I.mult;
        this.mainUniforms.offset = I.offset
    };
    c.prototype.draw = function() {
        this.uniforms.time = (Date.now() - this.startTime) / 1000;
        if (this.canvasEffect) {
            this.canvasEffect()
        } else {
            this.sourceTexture.loadContentsOf(this.source)
        }
        this.mainTexture.drawTo(this.mainDrawRect);
        if (this.effect) {
            this.effect()
        }
    };
    c.prototype.getImage = function(J, I) {
        var K = new Image();
        this.defaultShader.drawRect();
        K.src = this.mainTexture.toImage(this.square, this.quality, J, I);
        return K
    };
    c.prototype.destroyShaders = function() {
        for (var I = this.shaders.length; I--;) {
            this.shaders[I].destroy()
        }
        this.shaders = {}
    };
    c.prototype.destroy = function() {
        this.destroyShaders();
        this.initFrameTextures();
        if (this.sourceTexture) {
            this.sourceTexture.destroy()
        }
        this.sourceTexture = null;
        if (this.mainTexture) {
            this.mainTexture.destroy()
        }
        this.mainTexture = null;
        if (this.swapTexture) {
            this.swapTexture.destroy()
        }
        this.swapTexture = null;
        if (this.tempTexture) {
            this.tempTexture.destroy()
        }
        this.tempTexture = null;
        if (this.extraTexture) {
            this.extraTexture.destroy()
        }
        this.extraTexture = null;
        if (this.defaultShader) {
            this.defaultShader.destroy()
        }
        this.defaultShader = null;
        if (this.mainShader) {
            this.mainShader.destroy()
        }
        this.mainShader = null;
        this.assets = null;
        this.uniforms = null;
        this.effect = null;
        this.canvasEffect = null;
        this.context2D = null;
        this.tempContext2D = null;
        this.isQuad = false;
        this.width = this.height = this.quadPos = this.startTime = this.quality = this.fpsGrid = this.fps = 0;
        this.size = null;
        this.center = null;
        this.id = null;
        this.source = null;
        this.gl = null
    };
    return c
}(WebcamToy));
WebcamToy.Grid = (function(b) {
    function c(f, e, d) {
        return Math.min(d, Math.max(e, f))
    }
    function a(e, g, f, h) {
        this.source = g;
        this.page = 0;
        this.totalPages = 9;
        this.itemWidth = f;
        this.itemHeight = h;
        this.gridContext2D = b.Effect.getContext2D(f, h);
        this.effects = new Array(9);
        for (var d = 0; d < 9; d++) {
            this.effects[d] = new b.Effect(e[d], this.gridContext2D.canvas, f, h)
        }
    }
    a.prototype.initPages = function(g, e, d) {
        var f = this;
        this.setPage(g, function() {
            if (e) {
                e(g)
            }
            if (g > 0) {
                setTimeout(function() {
                    f.initPages(g - 1, e, d)
                }, 0)
            } else {
                if (d) {
                    b.log("Grid complete");
                    d()
                }
            }
        })
    };
    a.prototype.draw = function() {
        var f = b.Effect.autoEnhance(this.source), h, g;
        try {
            this.gridContext2D.drawImage(this.source, 0, 0, this.itemWidth, this.itemHeight)
        } catch (d) {}
        for (g = 9; g--;) {
            h = this.effects[g];
            if (!h.fpsGrid) {
                h.mainUniforms.mult = f.mult;
                h.mainUniforms.offset = f.offset;
                h.draw()
            }
            h.fpsGrid++;
            h.fpsGrid%=Math.ceil(30 / h.fps)
        }
    };
    a.prototype.getEffectID = function(d) {
        return this.effects[c(Math.floor(d), 0, 9)].id
    };
    a.prototype.setPage = function(f, h) {
        var g, d;
        this.page = c(Math.floor(f), 0, this.totalPages);
        for (d = 9; d--;) {
            g = this.effects[d];
            if (g) {
                g.setEffect(g.getEffectID(this.page * 9 + d))
            }
        }
        if (h) {
            h(f)
        }
        b.log("Grid page", f)
    };
    a.prototype.previousPage = function() {
        this.page--;
        if (this.page < 0) {
            this.page = this.totalPages - 1
        }
        this.setPage(this.page)
    };
    a.prototype.nextPage = function() {
        this.page++;
        this.page%=this.totalPages;
        this.setPage(this.page)
    };
    a.prototype.useMirror = function(e) {
        for (var d = 0; d < 9; d++) {
            this.effects[d].useMirror(e)
        }
    };
    a.prototype.useSquare = function(e) {
        for (var d = 0; d < 9; d++) {
            this.effects[d].useSquare(e)
        }
    };
    a.prototype.destroy = function() {
        if (this.effects) {
            for (var d = this.effects.length; d--;) {
                if (this.effects[d]) {
                    this.effects[d].destroy();
                    this.effects[d] = null
                }
            }
        }
        this.effects = null;
        this.gridContext2D = null
    };
    return a
}(WebcamToy));
WebcamToy.Audio = (function(c) {
    var b = {}, d = {}, e = ["countdown", "capture"];
    function a(f) {
        var g = new window.Audio();
        g.src = c.Services.assetsURL + "audio/" + f + ".ogg";
        d[f] = g
    }
    b.playTrack = function(g, f) {
        if (!!window.Audio) {
            setTimeout(function() {
                if (d[g]) {
                    d[g].play()
                }
            }, f || 0)
        }
    };
    b.loadAudio = function() {
        if (!!window.Audio) {
            for (var f = e.length; f--;) {
                a(e[f])
            }
        }
    };
    return b
}(WebcamToy));
WebcamToy.Camera = (function() {
    var f = {}, c = document.createElement("video"), j, b, d;
    navigator.getUserMedia_ = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    f.hasGetUserMedia = (function() {
        return !!navigator.getUserMedia_
    })();
    function i(k) {
        WebcamToy.log("Infobar shown");
        h()
    }
    function h() {
        $(window).off("resize", i);
        clearTimeout(d)
    }
    function e(k) {
        h();
        if (c.src) {
            c.src = undefined
        }
        if (c.mozSrcObject) {
            c.mozSrcObject = undefined
        }
        if (j) {
            j(c, "", k || "Error")
        }
    }
    function a(k) {
        h();
        if (typeof k === "object") {
            if (k.name) {
                k = k.name
            } else {
                if (k.code === 1 || k.PERMISSION_DENIED) {
                    k = "PermissionDeniedError"
                } else {
                    k = JSON.stringify(k)
                }
            }
        }
        switch (k) {
        case"PermissionDeniedError":
        case"PERMISSION_DENIED":
        case"PermissionDismissedError":
            k = "Camera access denied";
            break;
        case"DevicesNotFoundError":
        case"NO_DEVICES_FOUND":
            k = "Camera not found";
            break;
        case"ConstraintNotSatisfiedError":
        case"CONSTRAINT_NOT_SATISFIED":
        case"NOT_SUPPORTED_ERROR":
        case"MANDATORY_UNSATISFIED_ERROR":
        case"HARDWARE_UNAVAILABLE":
        case"TrackStartError":
        case"InvalidStateError":
        case"InvalidSecurityOriginError":
        case"TabCaptureError":
            k = "Camera unavailable";
            break
        }
        if (b) {
            b(k)
        } else {
            e(k)
        }
    }
    function g(n) {
        h();
        var l;
        try {
            if (n && n.getVideoTracks) {
                var k = n.getVideoTracks();
                if (k && k.length > 0) {
                    l = k[0].label
                }
            }
        } catch (m) {}
        if (navigator.mozGetUserMedia) {
            try {
                c.mozSrcObject = n;
                c.play()
            } catch (m) {
                e(m || "Video error")
            }
            if (j) {
                setTimeout(j, 100, c, l)
            }
        } else {
            var o = window.URL || window.webkitURL;
            $(c).on("canplay", function() {
                $(this).off("canplay");
                if (j) {
                    setTimeout(j, 100, c, l)
                }
            });
            try {
                if (!c.src) {
                    c.src = o ? o.createObjectURL(n) : n;
                    c.loop = c.muted = true;
                    c.load()
                }
            } catch (m) {
                e(m || "Video error")
            }
        }
    }
    f.getCamera = function(n, l) {
        if (c.src || c.mozSrcObject) {
            return 
        }
        j = n;
        b = l;
        c.onerror = function(o) {
            c.onerror = null;
            e(o || "Video error")
        };
        if (WebcamToy.ua.chrome) {
            h();
            $(window).resize(i)
        }
        d = setTimeout(function() {
            a({
                name: "Camera timeout"
            })
        }, WebcamToy.ua.chrome ? 7000 : 10000);
        if (f.hasGetUserMedia) {
            try {
                navigator.getUserMedia_({
                    video: WebcamToy.ua.chrome ? {
                        mandatory: {
                            minAspectRatio: 1.25,
                            maxAspectRatio: 1.6
                        },
                        optional: [{
                            minWidth: 960
                        }, {
                            minHeight: 720
                        }, {
                            maxWidth: 960
                        }, {
                            maxHeight: 720
                        }
                        ]
                    }
                    : true,
                    audio: false
                }, g, a)
            } catch (m) {
                try {
                    navigator.getUserMedia_("video", g, a)
                } catch (k) {
                    e(k || "Camera not accessible")
                }
            }
            WebcamToy.log("getUserMedia")
        } else {
            e("Camera not accessible")
        }
    };
    return f
}());
(function() {
    var a = 0, b = 0, c = ["ms", "moz", "webkit", "o"];
    while (a < c.length&&!window.requestAnimationFrame) {
        window.requestAnimationFrame = window[c[a] + "RequestAnimationFrame"];
        window.cancelAnimationFrame = window[c[a] + "CancelAnimationFrame"] || window[c[a] + "CancelRequestAnimationFrame"];
        a++
    }
    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = function(h, e) {
            var d = new Date().getTime(), f = Math.max(0, 1000 / 60 - d + b), g = setTimeout(function() {
                h(d + f)
            }, f);
            b = d + f;
            return g
        }
    }
    if (!window.cancelAnimationFrame) {
        window.cancelAnimationFrame = function(d) {
            clearTimeout(d)
        }
    }
}());
$.extend($.easing, {
    easeInQuad: function(e, f, a, h, g) {
        return h * (f/=g) * f + a
    },
    easeOutQuad: function(e, f, a, h, g) {
        return - h * (f/=g) * (f - 2) + a
    },
    easeInOutQuad: function(e, f, a, h, g) {
        if ((f/=g / 2) < 1) {
            return h / 2 * f * f + a
        }
        return - h / 2 * ((--f) * (f - 2) - 1) + a
    }
});
(function(a) {
    a.fn.noisy = function(o) {
        o = a.extend({}, a.fn.noisy.defaults, o);
        var g, m = false;
        if (!!window.JSON && WebcamToy.Capabilities.localStorage) {
            try {
                m = localStorage.getItem(JSON.stringify(o))
            } catch (i) {}
        }
        if (m) {
            g = m
        } else {
            var f = document.createElement("canvas");
            if (f.getContext) {
                f.width = o.width;
                f.height = o.height;
                var n = f.getContext("2d"), c = n.createImageData(f.width, f.height), d = o.intensity * f.width * f.height, b = 255 * o.opacity;
                while (d--) {
                    var l=~~(Math.random() * f.width), k=~~(Math.random() * f.height), h = (l + k * c.width) * 4;
                    var j = d%255;
                    c.data[h] = j;
                    c.data[h + 1] = o.monochrome ? j : ~~(Math.random() * 255);
                    c.data[h + 2] = o.monochrome ? j : ~~(Math.random() * 255);
                    c.data[h + 3]=~~(Math.random() * b)
                }
                n.putImageData(c, 0, 0);
                g = f.toDataURL("image/png");
                if (g && g.indexOf("data:image/png") !== 0) {
                    return 
                }
            }
            try {
                if (g && window.JSON && WebcamToy.Capabilities.localStorage) {
                    localStorage.setItem(JSON.stringify(o), g)
                }
            } catch (i) {}
        }
        return this.each(function() {
            a(this).css("background-image", 'url("' + g + '"),' + a(this).css("background-image"))
        })
    };
    a.fn.noisy.defaults = {
        intensity: 1,
        width: 200,
        height: 200,
        opacity: 0.06,
        monochrome: false
    }
})(jQuery);
$.fn.buttonClick = function(a) {
    if (WebcamToy.Capabilities.touch) {
        return this.each(function() {
            $(this).bind("touchend", function() {
                if (a) {
                    a()
                }
            })
        })
    } else {
        return this.each(function() {
            var b = $(this);
            b.mousedown(function() {
                b.data("pressed", true)
            }).mouseup(function() {
                if (b.data("pressed")) {
                    b.data("pressed", false);
                    if (a) {
                        a()
                    }
                }
            }).mouseout(function() {
                b.data("pressed", false)
            });
            this.onselectstart = function(c) {
                if (c) {
                    c.preventDefault()
                }
            };
            this.oncontextmenu = function(c) {
                if (c) {
                    c.preventDefault()
                }
            }
        })
    }
};
$.fn.removeButtonClick = function(a) {
    return this.each(function() {
        $(this).unbind("mousedown mouseup mouseout touchend");
        this.onselectstart = null
    })
};
WebcamToy.UI = (function(R) {
    var bY = {}, b3 = {
        capturing: false,
        sharing: false,
        grid: false,
        gridLoaded: false,
        zooming: false,
        useCameraFlash: true,
        useCountdown: true,
        photoSaved: false,
        albumLoaded: false,
        destroyed: false,
        shareService: "",
        saveCount: 1,
        saveFilename: "",
        photoTextNum: 0,
        photoCommentNum: 0,
        postAttempt: 0,
        countdown: 0,
        quadCountdown: 0,
        restoreCount: 0
    }, a6, U = 0, v, a1, aP, g, aZ, ak, bk, J, bq, bA, V = 106, bv = false, aD = $("#toy"), b7 = $("#toy-intro"), b9 = $("#toy-ui"), av = $("#toy-view"), ab = $("#toy-grid"), N = $("#toy-main"), b1 = $("#toy-view canvas"), af = $("#grid-ui"), a9 = $("#grid-view canvas"), bM = $("#grid-view p"), bZ = $("#settings form"), bc = $("#setting-mirror"), n = $("#setting-square"), a7 = $("#setting-countdown"), l = $("#setting-flash"), F = $("#setting-full-screen"), be = $("#button-settings"), aK = $("#button-previous"), bV = $("#button-next"), aY = $("#button-up"), bs = $("#button-down"), K = $("#button-effects"), i = $("#button-effects .loading"), au = $("#button-effects .loading span"), aE = $("#button-capture"), r = $("#button-back"), Q = $("#button-save"), w = $("div.button.facebook"), bO = $("a.button.facebook"), T = $("div.button.twitter"), aT = $("a.button.twitter"), aH = $("div.button.tumblr"), cc = $("a.button.tumblr"), a0 = $("div.button.vk"), b8 = $("a.button.vk"), aB = $("div.button.logout"), b6 = $("#capture-text"), y = $("#capture-quad-text"), ax = $("#toy-countdown"), bl = $("#prompt-back"), Y = $("#prompt-discard"), bU = $("#prompt-save"), s = $("#toy-share-ui footer"), c = $("#prompt-login"), b5 = $("#prompt-login span"), bP = $("#prompt-facebook-logout"), o = $("#prompt-facebook-post"), bF = $(".button.facebook .share-posting"), aW = bP.text(), z = o.text(), bE = bF.text(), ae = $("#prompt-twitter-logout"), bh = $("#prompt-twitter-post"), bd = $(".button.twitter .share-posting"), B = ae.text(), aF = bh.text(), aX = bd.text(), H = $("#prompt-tumblr-logout"), aC = $("#prompt-tumblr-post"), am = $(".button.tumblr .share-posting"), aA = H.text(), ca = aC.text(), aI = am.text(), A = $("#prompt-vk-logout"), bJ = $("#prompt-vk-post"), ar = $(".button.vk .share-posting"), ag = A.text(), aM = bJ.text(), W = ar.text(), p = $("#photo"), M = $("#photo img"), aV = $("#photo form"), a4 = $('#photo input[type="text"]'), bK = a4[0], bz = bK && a4.attr("data-alt").split("|"), bn = $("#photo p"), X = $('#photo input[type="hidden"]'), ah = $("body").hasClass("mobile");
    function al(ci, cj, ch, ck, cg) {
        var cf = cg ? "fade-fast": "fade-slow";
        cj.show().addClass(cf);
        bq = setTimeout(function() {
            cj.css("opacity", ci);
            bq = setTimeout(function() {
                cj.removeClass(cf);
                if (!ci) {
                    cj.hide()
                }
                if (ck) {
                    ck()
                }
            }, cg ? 210 : 410)
        }, ch || 0)
    }
    function aa() {
        J = requestAnimationFrame(I)
    }
    function I() {
        if (!v.paused) {
            if (b3.grid) {
                bk = setTimeout(aa, 1000 / 30);
                aP.draw()
            } else {
                bk = setTimeout(aa, 1000 / a1.fps);
                a1.autoEnhance();
                a1.draw()
            }
        }
    }
    function a5() {
        a1.quadPos = b3.quadCountdown = a1.isQuad ? 4 : 0;
        if (b3.quadCountdown) {
            b6.hide();
            y.show();
            aE.addClass("quad")
        } else {
            y.hide();
            b6.show();
            aE.removeClass("quad")
        }
        try {
            a1.draw()
        } catch (cf) {}
        bZ.hide();
        $("#button-effects .effect").hide();
        $("#button-effects .effect-" + a1.id).show();
        R.log("Effect", a1.id)
    }
    function bB() {
        if (!b1 ||!v) {
            return 
        }
        var cf = aD.width(), ck = aD.height(), cj = a1.square, ci = Math.ceil;
        if (b3.grid && a9) {
            var cl = false, ch = parseInt(af.css("bottom"), 10) < 26 ? 50: 75, cm = Math.floor(cf / 3 - 25), cg = a1.square ? cm: cm / ak;
            a9.stop(true, false).each(function() {
                var co = (ck - ch - (ck < 711 ? 85 : 92)) / 3, cn = a1.square ? co - 2: co * ak;
                if (cn > cm) {
                    cn = cm;
                    co = cg;
                    cl = true
                }
                $(this).css({
                    "margin-left": a1.square ? ci((co - 2 - (co * ak)) / 2): 0,
                    width: ci(co * ak),
                    height: ci(co)
                }).parent().stop(true, false).css({
                    "margin-left": 0,
                    "margin-bottom": 0,
                    width: ci(cn),
                    height: ci(co)
                })
            });
            $("#grid-view>div").css("margin-top", cl ? Math.max(2, (ck - ch - cg * 3 - 82) / 2) : "")
        } else {
            if (cf / ck > (cj ? 1 : ak)) {
                av.css({
                    width: cj ? ck - 2: ck * ak,
                    height: ck,
                    "margin-left": cj ? (ck - 2)/-2: ck * ak/-2,
                    "margin-top": ck/-2
                });
                b1.css({
                    width: ck * ak,
                    height: ck,
                    "margin-left": cj ? (ck - ck * ak - 2) / 2: 0
                })
            } else {
                av.css({
                    width: cf,
                    height: cj ? cf: cf / ak,
                    "margin-left": cf/-2,
                    "margin-top": cj ? cf/-2: cf / ak/-2
                });
                b1.css({
                    width: cj ? cf * ak: cf,
                    height: cj ? cf: cf / ak,
                    "margin-left": cj ? (cf - cf * ak) / 2: 0
                })
            }
        }
    }
    function bg() {
        if (b3.capturing || b3.sharing || b3.grid) {
            return 
        }
        a1.previousEffect();
        a5()
    }
    function bf() {
        if (b3.capturing || b3.sharing || b3.grid) {
            return 
        }
        a1.nextEffect();
        a5()
    }
    function bQ() {
        if (b3.grid) {
            aP.previousPage();
            ba()
        }
    }
    function ao() {
        if (b3.grid) {
            aP.nextPage();
            ba()
        }
    }
    function aG() {
        if (!b3.sharing) {
            v.play();
            if (a1) {
                a1.draw()
            }
            clearTimeout(bk);
            cancelAnimationFrame(J);
            I()
        }
    }
    function P() {
        if (b3.capturing || b3.sharing) {
            return 
        }
        a1.useMirror(!a1.mirror);
        if (aP) {
            aP.useMirror(a1.mirror)
        }
        if (!b3.grid) {
            a1.draw()
        }
    }
    function a2() {
        if (b3.capturing || b3.sharing) {
            return 
        }
        a1.useSquare(!a1.square);
        aP.useSquare(a1.square);
        if (!b3.grid) {
            a1.draw()
        }
        bB()
    }
    function bw() {
        if (b3.capturing || b3.sharing || b3.grid) {
            return 
        }
        b3.useCountdown=!b3.useCountdown
    }
    function bD() {
        if (b3.capturing || b3.sharing || b3.grid) {
            return 
        }
        b3.useCameraFlash=!b3.useCameraFlash
    }
    function az() {
        var ch, cf, cg = a9.parent().eq(a1.effectNum - aP.page * 9);
        if (!cg.length) {
            cg = a9.parent().eq(4)
        }
        if (!cg.length) {
            return null
        }
        ch = aD.offset();
        cf = cg.offset();
        return {
            left: cf.left - ch.left,
            top: cf.top - ch.top,
            width: cg.width(),
            height: cg.height()
        }
    }
    function O() {
        var cg = Math.floor(a1.effectNum / 9);
        aG();
        if (b3.grid) {
            aD.removeClass("wait");
            bB();
            bZ.hide();
            al(0, b9, 0, null, true);
            setTimeout(function() {
                if (aP.page !== cg) {
                    aP.setPage(cg)
                }
                ba();
                ab.show();
                var ci = az();
                if (!ci) {
                    av.hide();
                    af.show();
                    return 
                }
                af.hide().css("opacity", 0);
                av.removeClass("toy-shadow").addClass("toy-zoom-out");
                b1.addClass("toy-zoom-out");
                setTimeout(function() {
                    av.css({
                        width: ci.width,
                        height: ci.height,
                        "margin-left": ci.left - aD.width() / 2,
                        "margin-top": ci.top - aD.height() / 2
                    });
                    b1.css({
                        width: a1.square ? ci.width * ak: ci.width,
                        height: ci.height,
                        "margin-left": a1.square ? (ci.width - ci.width * ak) / 2: 0
                    });
                    setTimeout(function() {
                        av.removeClass("toy-zoom-out");
                        b1.removeClass("toy-zoom-out");
                        al(0, av, 0, null, true);
                        al(1, af, 210, function() {
                            if (!b3.gridLoaded) {
                                b3.gridLoaded = true;
                                i.hide();
                                $("#button-effects .more").show()
                            }
                            b3.zooming = false
                        }, true)
                    }, 510)
                }, 0)
            }, 10)
        } else {
            if (aP.page !== cg) {
                aP.setPage(cg)
            }
            var cf = az();
            if (!cf) {
                b9.show();
                av.show();
                af.hide();
                ab.hide();
                bB();
                a5();
                return 
            }
            bB();
            var ch = {
                width: av.width(),
                height: av.height(),
                "margin-left": av.css("margin-left"),
                "margin-top": av.css("margin-top")
            };
            av.show().css({
                opacity: 1,
                width: cf.width,
                height: cf.height,
                "margin-left": cf.left - aD.width() / 2,
                "margin-top": cf.top - aD.height() / 2
            });
            b1.css({
                width: a1.square ? cf.width * ak: cf.width,
                height: cf.height,
                "margin-left": a1.square ? (cf.width - cf.width * ak) / 2: 0
            });
            al(0, af, 0, null, true);
            setTimeout(function() {
                av.addClass("toy-zoom-in").css(ch);
                b1.addClass("toy-zoom-in").css({
                    width: a1.square ? (ch.width * ak): ch.width,
                    height: ch.height,
                    "margin-left": a1.square ? ((ch.width - ch.width * ak - 2) / 2): 0
                });
                setTimeout(function() {
                    av.removeClass("toy-zoom-in").addClass("toy-shadow-fade toy-shadow");
                    b1.removeClass("toy-zoom-in");
                    ab.hide();
                    bB();
                    al(1, b9, 0, null, true);
                    setTimeout(function() {
                        av.removeClass("toy-shadow-fade");
                        b3.zooming = false
                    }, 210)
                }, 410)
            }, 0);
            a5()
        }
    }
    function Z() {
        if (b3.capturing || b3.sharing || b3.zooming) {
            return 
        }
        b3.grid=!b3.grid;
        b3.zooming = true;
        R.log("Grid", b3.grid ? "show" : "hide");
        if (b3.gridLoaded) {
            O()
        } else {
            v.pause();
            aD.addClass("wait");
            if (aP) {
                $("#button-effects p").hide();
                au.text("0%");
                i.show();
                R.log("Grid init");
                setTimeout(function() {
                    aP.initPages(aP.totalPages, function(cf) {
                        au.text((Math.round(Math.max(0, Math.min(1, (aP.totalPages - cf) / aP.totalPages)) * 90 + 10)) + "%")
                    }, O)
                }, 0)
            } else {
                O()
            }
        }
    }
    function h() {
        if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen()
        } else {
            if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen()
            } else {
                if (document.mozExitFullScreen) {
                    document.mozExitFullScreen()
                } else {
                    if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen()
                    } else {
                        if (document.exitFullScreen) {
                            document.exitFullScreen()
                        } else {
                            if (document.exitFullscreen) {
                                document.exitFullscreen()
                            }
                        }
                    }
                }
            }
        }
    }
    function bT() {
        var cf = aD[0];
        if (cf.webkitRequestFullScreen) {
            cf.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
        } else {
            if (cf.mozRequestFullScreen) {
                cf.mozRequestFullScreen()
            } else {
                if (cf.requestFullScreen) {
                    cf.requestFullScreen()
                } else {
                    if (cf.requestFullscreen) {
                        cf.requestFullscreen()
                    }
                }
            }
        }
    }
    function ce() {
        return document.webkitIsFullScreen || document.mozFullScreen || document.webkitFullscreenElement || document.mozFullScreenElement || document.fullScreenElement || document.fullscreenElement
    }
    function bi() {
        if (ce()) {
            h()
        } else {
            bT()
        }
    }
    function bG() {
        return b3.saveFilename + b3.saveCount + ".jpg"
    }
    function bo() {
        setTimeout(function() {
            Q.removeAttr("href")
        }, 50)
    }
    function bt() {
        b3.sharing = false;
        bo();
        R.log("Back");
        if (aV.is(":visible")) {
            al(0, aV, 0, function() {
                aV.hide()[0].reset()
            }, true)
        }
        aG();
        M.fadeOut(150, function() {
            p.hide().css({
                opacity: 1
            }).removeClass("photo-bottom photo-tweet");
            M.removeClass("rotate-two photo-drop photo-img-tweet photo-shadow").attr("src", "");
            al(0, $("#toy-share-ui"), 50, function() {
                R.Services.cancelPost();
                aN();
                bO.hide();
                aT.hide();
                cc.hide();
                b8.hide();
                aB.hide();
                G();
                bP.hide();
                ae.hide();
                H.hide();
                A.hide();
                bl.hide();
                Y.hide();
                bU.hide();
                g = null;
                aZ = null;
                al(0, aD, 0, function() {
                    aD.removeClass("bg-share").addClass("bg-toy");
                    N.css("opacity", 0);
                    al(1, aD, 0, function() {
                        a1.setEffect(a1.id);
                        a5();
                        b1.show();
                        av.show();
                        al(1, N, 0, function() {
                            al(1, b9)
                        }, true)
                    }, true)
                }, true)
            }, true)
        })
    }
    function t() {
        if (b3.countdown) {
            var cf = b3.quadCountdown, ci = 50, ch = 50, cg = a1.id === "comicstrip", cj = (a1.width - a1.height / 2) / a1.width * 100;
            switch (cf) {
            case 4:
                ch = cg ? cj / 2 : 25;
                ci = 25;
                break;
            case 3:
                ch = cg ? cj + (100 - cj) / 2 : 75;
                ci = 25;
                break;
            case 2:
                ch = cg ? (100 - cj) / 2 : 25;
                ci = 75;
                break;
            case 1:
                ch = cg ? 100 - cj / 2 : 75;
                ci = 75;
                break
            }
            if (cf) {
                ax.addClass("quad")
            } else {
                ax.removeClass("quad")
            }
            ax.css({
                left: ch + "%",
                top: ci + "%",
                visibility: "visible"
            }).html("<p>" + b3.countdown--+"</p>").show().delay(cf ? 300 : 400).fadeOut(cf ? 100 : 150);
            R.Audio.playTrack("countdown");
            setTimeout(t, cf ? 700 : 900)
        } else {
            if (b3.quadCountdown) {
                b3.quadCountdown--
            }
            setTimeout(at, b3.useCountdown || a1.isQuad ? 200 : 0)
        }
    }
    function ap() {
        b3.photoSaved = true;
        if (Y.is(":visible")) {
            Y.hide();
            bl.show()
        }
    }
    function q() {
        if (w.is(":visible")) {
            w.fadeOut(200)
        } else {
            w.hide()
        }
        if (T.is(":visible")) {
            T.fadeOut(200)
        } else {
            T.hide()
        }
        if (aH.is(":visible")) {
            aH.fadeOut(200)
        } else {
            aH.hide()
        }
        if (a0.is(":visible")) {
            a0.fadeOut(200)
        } else {
            a0.hide()
        }
    }
    function b0() {
        b3.photoTextNum = Math.floor(Math.random() * bz.length);
        b3.photoCommentNum = Math.floor(Math.random() * X.length);
        b3.postAttempt = 0;
        b3.photoSaved = false;
        al(1, $("#toy-share-ui"), 300)
    }
    function bN(cg) {
        var cf = cg || 600, ch = Math.round(cf / ak);
        aZ = aZ || a1.getImage(cf, ch)
    }
    function at() {
        b3.capturing = false;
        if (b3.quadCountdown) {
            R.Audio.playTrack("capture", 125);
            if (b3.useCameraFlash) {
                $("#camera-flash").show().delay(250).fadeOut(250, S)
            } else {
                setTimeout(S, 250)
            }
            return 
        }
        b3.sharing = true;
        ax.hide();
        switch (b3.shareService) {
        case"facebook":
            w.removeButtonClick().buttonClick(ay).removeClass("button-inactive").show();
            by("post");
            bp("facebook-post");
            C();
            break;
        case"twitter":
            T.removeButtonClick().buttonClick(bC).removeClass("button-inactive").show();
            by("compose");
            bp("twitter-compose");
            C();
            break;
        case"tumblr":
            aH.removeButtonClick().buttonClick(aq).removeClass("button-inactive").show();
            by("post");
            bp("tumblr-compose");
            C();
            break;
        case"vk":
            a0.removeButtonClick().buttonClick(a3).removeClass("button-inactive").show();
            by("post");
            bp("vk-post");
            C();
            break;
        default:
            ad();
            by("login");
            bp("disclaimer");
            break
        }
        R.Audio.playTrack("capture", 125);
        if (b3.useCameraFlash) {
            $("#camera-flash").show()
        }
        setTimeout(function() {
            if (b3.useCameraFlash) {
                $("#camera-flash").fadeOut(250, b0)
            } else {
                b0()
            }
            v.pause();
            g = a1.getImage();
            aZ = null;
            b9.hide();
            b1.hide();
            av.hide();
            aD.removeClass("bg-toy").addClass("bg-share");
            if (!b3.useCameraFlash) {
                aD.hide().fadeIn(100)
            }
            M.attr({
                src: g.src,
                width: a1.width,
                height: a1.height
            });
            switch (a1.id) {
            case"cocoa":
            case"danger":
            case"retro":
            case"rose":
            case"xpro":
            case"zinc":
                M.removeClass("photo-white photo-thick");
                M.addClass("photo-black photo-thin");
                break;
            case"fire":
            case"lsd":
            case"nightvision":
                M.removeClass("photo-white photo-thin");
                M.addClass("photo-black photo-thick");
                break;
            case"cocktail":
            case"comicbook":
            case"comicstrip":
            case"envy":
            case"hazydays":
            case"magazine":
            case"rainbow":
                M.removeClass("photo-black photo-thick");
                M.addClass("photo-white photo-thin");
                break;
            case"glaze":
            case"watercolor":
                M.removeClass("photo-black photo-thick photo-thin");
                break;
            default:
                M.removeClass("photo-black photo-thin");
                M.addClass("photo-white photo-thick")
            }
        }, b3.useCameraFlash ? 250 : 0);
        setTimeout(function() {
            if (b3.useCameraFlash) {
                p.show()
            } else {
                p.fadeIn(100)
            }
            M.show().css("margin-top", - 60);
            setTimeout(function() {
                M.addClass("rotate-two photo-drop").css("margin-top", 0);
                setTimeout(function() {
                    M.addClass("photo-shadow");
                    R.trackEvent("Photo", "Capture", a1.id);
                    R.log("Photo", "Capture", a1.id)
                }, 250)
            }, b3.useCameraFlash ? 100 : 0)
        }, 200)
    }
    function S() {
        if (b3.capturing || b3.sharing || b3.grid) {
            return 
        }
        bZ.hide();
        al(0, b9, 0, null, true);
        if (b3.quadCountdown) {
            a1.quadPos = b3.quadCountdown
        }
        b3.countdown = b3.useCountdown ? 3 : 0;
        b3.capturing = true;
        setTimeout(t, b3.countdown ? 250 : 0)
    }
    function x(cf) {
        return $("#button-effects .effect-" + cf).text()
    }
    function bj(cf) {
        cf = cf.replace(/(^|[-\u2014\s(\["])'/g, "$1\u2018");
        cf = cf.replace(/'/g, "\u2019");
        cf = cf.replace(/(^|[-\u2014\[(\u2018\s])"/g, "$1\u201c");
        cf = cf.replace(/"/g, "\u201d");
        cf = cf.replace(/<3/g, "\u2665");
        cf = cf.replace(/\.\.\./g, "\u2026");
        cf = cf.replace(/(:\)|:\-\)|\=\)|:D|\=D|:3|\(:)/g, "\u263a");
        cf = cf.replace(/(:\(|:\-\(|\=\()/g, "\u2639");
        cf = cf.replace(/WE(B|D)? ?CA(M(E)?|N) ?TOY/g, "WEBCAM TOY");
        cf = cf.replace(/(W|w)(E|e)(b|d)? ?(C|c)(A|a)(m(e)?|n)/g, "$1ebcam");
        return cf.substr(0, V)
    }
    function aw() {
        if (a1.id === "normal") {
            return bz[b3.photoTextNum || 0]
        }
        var cf = x(a1.id), cg = cf ? X[b3.photoCommentNum || 0].value.replace("%s", cf): photoText;
        return bj(cg)
    }
    function ba() {
        bM.each(function(cf) {
            $(this).text(x(aP.getEffectID(cf)))
        })
    }
    function bu(cf, cg, ch) {
        if (ch.length === 3) {
            ch = ""
        } else {
            ch += "."
        }
        cf.text(cg + ch);
        bA = setTimeout(bu, 400, cf, cg, ch)
    }
    function bI() {
        al(0, c, 0, null, true)
    }
    function G() {
        $("#toy-share-ui footer p").hide()
    }
    function bp(cf) {
        G();
        if (cf) {
            $("#prompt-" + cf).show()
        }
    }
    function aN() {
        clearTimeout(bA);
        w.find("p").hide();
        T.find("p").hide();
        aH.find("p").hide();
        a0.find("p").hide()
    }
    function by(ch) {
        var cg, cf;
        aN();
        switch (b3.shareService) {
        case"facebook":
            cg = w;
            cf = bO;
            break;
        case"twitter":
            cg = T;
            cf = aT;
            break;
        case"tumblr":
            cg = aH;
            cf = cc;
            break;
        case"vk":
            cg = a0;
            cf = b8;
            break;
        default:
            $(".button .share-login").show();
            return 
        }
        if (ch === "posted") {
            cg.hide();
            cf.show()
        } else {
            cf.hide();
            cg.show();
            if (ch) {
                cg.find(".share-" + ch).show()
            }
        }
    }
    function ad() {
        $(b5.hide()[Math.floor(Math.random() * b5.length)]).show()
    }
    function br() {
        b3.shareService = "";
        b3.postAttempt = 0;
        w.fadeOut(200);
        bO.fadeOut(200);
        T.fadeOut(200);
        aT.fadeOut(200);
        aH.fadeOut(200);
        cc.fadeOut(200);
        a0.fadeOut(200);
        b8.fadeOut(200);
        aB.fadeOut(200);
        bP.fadeOut(100);
        ae.fadeOut(100);
        H.fadeOut(100);
        A.fadeOut(100);
        G();
        al(0, s, 0, function() {
            aN();
            w.removeClass("share-center button-inactive").addClass("share").removeButtonClick().delay(250).fadeIn(400).buttonClick(b);
            T.removeClass("share-center button-inactive").addClass("share").removeButtonClick().delay(250).fadeIn(400).buttonClick(cb);
            aH.removeClass("share-center button-inactive").addClass("share").removeButtonClick().delay(250).fadeIn(400).buttonClick(bm);
            a0.removeClass("share-center button-inactive").addClass("share").removeButtonClick().delay(250).fadeIn(400).buttonClick(u);
            ad();
            by("login");
            bp("disclaimer");
            al(1, s, 250, null, true);
            al(1, c, 250, null, true)
        }, true)
    }
    function C() {
        aB.removeClass("button-inactive").addClass("active").show()
    }
    function bW(ch) {
        var cg = "", cf = "";
        if (ch && ch.error) {
            cg = ch.error.message;
            cf = ch.error.type
        } else {
            cg = ch
        }
        if (cg === "OK") {
            return 
        }
        if (b3.postAttempt < 1) {
            b3.postAttempt++
        } else {
            if (/oauth/i.test(cf) || /oauth/i.test(cg)) {
                R.Services.facebookLogout();
                br();
                return 
            } else {
                bp("facebook-error");
                f()
            }
        }
        by("error");
        C();
        w.removeClass("button-inactive").buttonClick(ay);
        R.error("Facebook post error" + (cf ? ": " + cf : "") + (cg ? ": " + cg : ""))
    }
    function aU() {
        by("posted");
        bp("facebook-posted");
        C();
        R.trackEvent("Photo", "Facebook", a1.id);
        R.log("Photo", "Facebook", a1.id);
        b3.postAttempt = 0;
        ap()
    }
    function ay() {
        by("posting");
        G();
        w.removeButtonClick().addClass("button-inactive");
        aB.removeClass("active").addClass("button-inactive");
        bu(bF, bE, "...");
        R.log("Photo", "Facebook post", a1.id);
        R.Services.facebookPost({
            image: g,
            message: aw()
        }, aU, bW)
    }
    function ac() {
        if (!b3.sharing || b3.shareService !== "facebook") {
            return 
        }
        if (b3.albumLoaded) {
            by("post");
            w.removeButtonClick().buttonClick(ay).removeClass("button-inactive")
        } else {
            by("loading");
            w.removeButtonClick().addClass("button-inactive")
        }
    }
    function bS() {
        if (b3.shareService === "facebook") {
            return 
        }
        b3.shareService = "facebook";
        bI();
        G();
        q();
        al(0, s, 0, function() {
            b3.albumLoaded = false;
            ac();
            w.hide().delay(250).fadeIn(400, f);
            bp("facebook-post");
            w.removeClass("share").addClass("share-center");
            aB.removeClass("twitter tumblr vk button-inactive").addClass("facebook active").delay(250).fadeIn(400);
            if (s.data("hover")) {
                al(1, s, 250, null, true)
            }
        }, true)
    }
    function aj(cg, cf, ch) {
        if (cg) {
            bO.attr("href", cg);
            if (cf === "everyone") {
                R.trackEvent("Photo", "Facebook album", cg);
                R.log("Photo", "Facebook album", cg)
            }
        }
        b3.albumLoaded=!!ch;
        ac()
    }
    function f() {
        R.Services.facebookAlbum(aj, aD.attr("data-fb-album-name"))
    }
    function aO(cf) {
        if (cf && b3.sharing) {
            bS()
        }
    }
    function b() {
        R.Services.onFacebookAuth = aO;
        R.Services.facebookAuth()
    }
    function m(cf) {
        if (cf && cf.fullName) {
            o.text(z.replace("%s", cf.fullName));
            bP.text(aW.replace("%s", cf.fullName));
            $("#prompt-facebook-post span,#prompt-facebook-logout span").show()
        }
    }
    function bH(cf) {
        if (cf && typeof cf === "object") {
            cf = cf.statusText || JSON.stringify(cf)
        }
        if (/blacklist/i.test(cf)) {
            R.Services.twitterLogout();
            br();
            return 
        }
        if (b3.postAttempt < 2) {
            b3.postAttempt++
        } else {
            if (/oauth/i.test(cf)) {
                R.Services.twitterLogout();
                br();
                return 
            } else {
                bp("twitter-error")
            }
        }
        by("error");
        C();
        T.removeClass("button-inactive").buttonClick(k);
        bK.disabled = false;
        R.error("Twitter post error" + (cf ? ": " + cf : ""))
    }
    function bR(cf) {
        aZ = null;
        by("posted");
        bp("twitter-posted");
        C();
        if (cf) {
            $("a.twitter").attr("href", cf)
        }
        R.trackEvent("Photo", "Twitter", a1.id);
        R.log("Photo", "Twitter", a1.id);
        b3.postAttempt = 0;
        ap()
    }
    function k() {
        bK.blur();
        bK.disabled = true;
        by("posting");
        G();
        T.removeButtonClick().addClass("button-inactive");
        aB.removeClass("active").addClass("button-inactive");
        bu(bd, aX, "...");
        R.log("Photo", "Twitter post", a1.id);
        R.Services.twitterPost({
            image: g,
            message: bj(a4.val()) || aw()
        }, bR, bH)
    }
    function b2() {
        if (b3.shareService === "twitter") {
            return 
        }
        b3.shareService = "twitter";
        bI();
        G();
        q();
        al(0, s, 0, function() {
            by("compose");
            T.hide().delay(250).fadeIn(400);
            bp("twitter-compose");
            T.removeClass("share").addClass("share-center");
            aB.removeClass("facebook tumblr vk button-inactive").addClass("twitter active").delay(250).fadeIn(400);
            if (s.data("hover")) {
                al(1, s, 250, null, true)
            }
            T.removeButtonClick().buttonClick(bC)
        }, true)
    }
    function ai() {
        var ch = bj(a4.val());
        if (a4.val() !== ch) {
            var cg = bK.selectionStart + ch.length - a4.val().length + 1;
            bK.focus();
            a4.val("");
            a4.val(ch);
            if (bK.setSelectionRange && cg) {
                bK.setSelectionRange(cg, cg)
            }
        }
        var cf = V - ch.length;
        bn.text(cf).removeClass("short long blur").addClass(a4.is(":focus") ? (cf < 20 ? "short" : "long") : "blur")
    }
    function a8() {
        if (aV.is(":visible")) {
            al(0, aV, 100, function() {
                M.addClass("rotate-two");
                p.removeClass("photo-bottom");
                bK.blur();
                a4.val("")
            }, true)
        }
    }
    function bC() {
        M.removeClass("rotate-two photo-drop").addClass("photo-img-tweet");
        p.addClass("photo-bottom photo-tweet");
        a4.attr("placeholder", aw());
        bK.disabled = false;
        aV.css("opacity", 0);
        al(1, aV, 100, function() {
            bK.focus();
            ai()
        }, true);
        T.removeButtonClick().buttonClick(k);
        by("post");
        bp("twitter-post")
    }
    function b4(cf) {
        if (cf) {
            bh.text(aF.replace("@", "@" + cf));
            ae.text(B.replace("@", "@" + cf));
            if (b3.sharing) {
                b2()
            }
        }
    }
    function cb() {
        R.Services.onTwitterAuth = b4;
        R.Services.twitterAuth()
    }
    function an(cf) {
        if (cf && typeof cf === "object") {
            cf = cf.statusText || JSON.stringify(cf)
        }
        if (b3.postAttempt < 2) {
            b3.postAttempt++
        } else {
            if (/oauth/i.test(cf)) {
                R.Services.tumblrLogout();
                br();
                return 
            } else {
                bp("tumblr-error")
            }
        }
        by("error");
        C();
        aH.removeClass("button-inactive").buttonClick(aq);
        R.error("Tumblr post error" + (cf ? ": " + cf : ""))
    }
    function aQ(cf) {
        aZ = null;
        by("posted");
        bp("tumblr-posted");
        C();
        if (cf) {
            $("a.tumblr").attr("href", cf)
        }
        R.trackEvent("Photo", "Tumblr", a1.id);
        R.log("Photo", "Tumblr", a1.id);
        b3.postAttempt = 0;
        ap()
    }
    function aq() {
        bN(a1.square ? 500 * ak : 500);
        by("posting");
        G();
        aH.removeButtonClick().addClass("button-inactive");
        aB.removeClass("active").addClass("button-inactive");
        bu(am, aI, "...");
        R.log("Photo", "Tumblr post", a1.id);
        R.Services.tumblrPost({
            image: aZ,
            message: aw(),
            effect: a1.id
        }, aQ, an)
    }
    function j() {
        if (b3.shareService === "tumblr") {
            return 
        }
        b3.shareService = "tumblr";
        bI();
        G();
        q();
        al(0, s, 0, function() {
            by("post");
            aH.hide().delay(250).fadeIn(400);
            bp("tumblr-post");
            aH.removeClass("share").addClass("share-center");
            aB.removeClass("facebook twitter vk button-inactive").addClass("tumblr active").delay(250).fadeIn(400);
            if (s.data("hover")) {
                al(1, s, 250, null, true)
            }
            aH.removeButtonClick().buttonClick(aq)
        }, true)
    }
    function E(cf) {
        if (cf && b3.sharing) {
            j()
        }
    }
    function bm() {
        R.Services.onTumblrAuth = E;
        R.Services.tumblrAuth()
    }
    function aS(ch) {
        var cg = "", cf = "";
        if (ch && ch.error) {
            cg = ch.error.message;
            cf = ch.error.type
        } else {
            cg = ch
        }
        if (b3.postAttempt < 2) {
            b3.postAttempt++
        } else {
            if (/oauth/i.test(cf) || /oauth/i.test(cg)) {
                R.Services.vkLogout();
                br();
                return 
            } else {
                bp("vk-error")
            }
        }
        by("error");
        C();
        a0.removeClass("button-inactive").buttonClick(a3);
        R.error("VK post error" + (cf ? ": " + cf : "") + (cg ? ": " + cg : ""))
    }
    function cd(cf) {
        aZ = null;
        by("posted");
        bp("vk-posted");
        C();
        if (cf) {
            $("a.vk").attr("href", cf)
        }
        R.trackEvent("Photo", "VK", a1.id);
        R.log("Photo", "VK", a1.id);
        b3.postAttempt = 0;
        ap()
    }
    function a3() {
        bN();
        by("posting");
        G();
        a0.removeButtonClick().addClass("button-inactive");
        aB.removeClass("active").addClass("button-inactive");
        bu(ar, W, "...");
        R.log("Photo", "VK post", a1.id);
        R.Services.vkPost({
            image: aZ,
            message: aw()
        }, cd, aS)
    }
    function aJ() {
        if (b3.shareService === "vk") {
            return 
        }
        b3.shareService = "vk";
        bI();
        G();
        q();
        al(0, s, 0, function() {
            by("post");
            a0.hide().delay(250).fadeIn(400);
            bp("vk-post");
            a0.removeClass("share").addClass("share-center");
            aB.removeClass("facebook twitter tumblr button-inactive").addClass("vk active").delay(250).fadeIn(400);
            if (s.data("hover")) {
                al(1, s, 250, null, true)
            }
            a0.removeButtonClick().buttonClick(a3)
        }, true)
    }
    function bx(cf) {
        if (cf && b3.sharing) {
            aJ()
        }
    }
    function u() {
        R.Services.onVKAuth = bx;
        R.Services.vkAuth()
    }
    function aL(cf) {
        if (cf.css("opacity") === "0") {
            cf.css("opacity", "")
        }
    }
    function aR() {
        aK.buttonClick(bg);
        bV.buttonClick(bf);
        if (ah) {
            return 
        }
        b1.click(function() {
            bZ.hide()
        });
        aY.buttonClick(bQ);
        bs.buttonClick(ao);
        K.buttonClick(Z);
        aE.buttonClick(S);
        be.buttonClick(function() {
            bZ.toggle()
        });
        r.buttonClick(bt).hover(function() {
            var cg = b3.photoSaved ? bl: Y;
            if (cg) {
                aL(cg);
                cg.stop(true, true).fadeIn(150)
            }
        }, function() {
            var cg = b3.photoSaved ? bl: Y;
            if (cg) {
                cg.stop(true, true).delay(100).fadeOut(150)
            }
        });
        w.buttonClick(b);
        T.buttonClick(cb);
        aH.buttonClick(bm);
        a0.buttonClick(u);
        $(".button.share,.button.share-center").hover(function() {
            aL(s);
            s.data("hover", true).stop(true, true).fadeIn(150)
        }, function() {
            s.data("hover", false).stop(true, true).delay(50).fadeOut(150)
        });
        aB.buttonClick(function() {
            if (aB.hasClass("active")) {
                switch (b3.shareService) {
                case"facebook":
                    R.Services.onFacebookAuth = null;
                    R.Services.facebookLogout();
                    break;
                case"twitter":
                    R.Services.onTwitterAuth = null;
                    R.Services.twitterLogout();
                    a8();
                    break;
                case"tumblr":
                    R.Services.onTumblrAuth = null;
                    R.Services.tumblrLogout();
                    break;
                case"vk":
                    R.Services.onVKAuth = null;
                    R.Services.vkLogout();
                    break
                }
                br()
            }
        }).hover(function() {
            if (aB.hasClass("active")) {
                var cg;
                switch (b3.shareService) {
                case"facebook":
                    cg = bP;
                    break;
                case"twitter":
                    cg = ae;
                    break;
                case"tumblr":
                    cg = H;
                    break;
                case"vk":
                    cg = A;
                    break
                }
                if (cg) {
                    cg.stop(true, true).fadeIn(150, function() {
                        cg.css("opacity", 1)
                    })
                }
            }
        }, function() {
            if (aB.hasClass("active")) {
                var cg;
                switch (b3.shareService) {
                case"facebook":
                    cg = bP;
                    break;
                case"twitter":
                    cg = ae;
                    break;
                case"tumblr":
                    cg = H;
                    break;
                case"vk":
                    cg = A;
                    break
                }
                if (cg) {
                    cg.stop(true, true).delay(50).fadeOut(150)
                }
            }
        });
        aV.submit(function(cg) {
            if (cg) {
                cg.preventDefault()
            }
        });
        bp("disclaimer");
        bc.click(P);
        n.click(a2);
        a7.click(bw);
        l.click(bD);
        F.click(bi);
        a9.parent().each(function(cg) {
            $(this).mousedown(function() {
                var cl = 0.92, ck = $(this).find("canvas"), cj = parseFloat(ck.css("height")), ci = a1.square ? cj: parseFloat(ck.css("width")), cm = Math.floor;
                $(this).data("pressed", true).css({
                    width: (ci - (a1.square ? 2 : 0)),
                    height: cj
                }).animate({
                    "margin-left": cm((ci - (ci - (a1.square ? 2 : 0)) * cl) / 2),
                    "margin-bottom": cm((cj - cj * cl) / 2),
                    width: (ci - (a1.square ? 2 : 0)) * cl,
                    height: cj * cl
                }, 100, "easeOutQuad");
                ck.css({
                    width: cj * ak,
                    height: cj
                }).animate({
                    "margin-left": a1.square ? cm((cj - cj * ak) * cl / 2): 0,
                    width: cj * ak * cl,
                    height: cj * cl
                }, 100, "easeOutQuad")
            }).mouseup(function(ch) {
                if ($(this).data("pressed")) {
                    ch.stopPropagation();
                    $(this).data("pressed", false);
                    a1.setEffect(aP.getEffectID(cg));
                    if (b3.zooming) {
                        bB()
                    } else {
                        Z()
                    }
                } else {
                    bB()
                }
            }).mouseout(function() {
                if ($(this).data("pressed")) {
                    $(this).data("pressed", false);
                    bB()
                }
            });
            this.onselectstart = function(ch) {
                if (ch) {
                    ch.preventDefault()
                }
            }
        });
        ab.mouseup(function() {
            var cg = false;
            a9.parent().each(function() {
                if ($(this).data("pressed")) {
                    cg = true;
                    $(this).trigger("mouseup")
                }
            });
            if (!cg) {
                bB()
            }
        });
        try {
            bZ[0].oncontextmenu = ab[0].oncontextmenu = av[0].oncontextmenu = function(cg) {
                if (cg) {
                    cg.preventDefault();
                    return false
                }
            }
        } catch (cf) {}
        Q.click(function() {
            $(this).attr("download", bG());
            b3.saveCount++;
            try {
                localStorage.setItem("saveCount", b3.saveCount)
            } catch (cg) {}
            R.trackEvent("Photo", "Save", a1.id);
            R.log("Photo", "Save", a1.id);
            ap()
        }).mousedown(function() {
            if (R.ua.chromeVersion > 34) {
                try {
                    var ck = window.atob(g.src.substring("data:image/jpeg;base64,".length));
                    var ch = new Uint8Array(ck.length);
                    for (var cj = 0, cg = ck.length; cj < cg; cj++) {
                        ch[cj] = ck.charCodeAt(cj)
                    }
                    var ci = new Blob([ch.buffer], {
                        type: "image/jpeg"
                    });
                    $(this).attr("href", URL.createObjectURL(ci))
                } catch (cl) {
                    $(this).attr("href", g.src)
                }
            } else {
                $(this).attr("href", g.src)
            }
        }).mouseup(bo).mouseout(bo).mouseleave(bo).hover(function() {
            aL(bU);
            bU.stop(true, true).fadeIn(150)
        }, function() {
            bU.stop(true, true).delay(100).fadeOut(150)
        })
    }
    function bL() {
        if (ah) {
            return 
        }
        a4.on("change input focus blur mousedown mouseup", ai);
        jQuery(document).keydown(function(cf) {
            if (b3.sharing) {
                if (a4.is(":focus")) {
                    return 
                }
                if (cf.metaKey && cf.keyCode === 8) {
                    bt();
                    return 
                }
            }
            if (cf.altKey || cf.ctrlKey || cf.shiftKey || cf.metaKey || b3.zooming) {
                return 
            }
            switch (cf.keyCode) {
            case 8:
                cf.preventDefault();
                break;
            case 32:
                if (!b3.grid) {
                    aE.addClass("button-active")
                }
                break;
            case 37:
                if (b3.grid) {
                    aY.addClass("button-active")
                } else {
                    aK.addClass("button-active")
                }
                break;
            case 38:
                if (b3.grid) {
                    aY.addClass("button-active")
                }
                break;
            case 39:
                if (b3.grid) {
                    bs.addClass("button-active")
                } else {
                    bV.addClass("button-active")
                }
                break;
            case 40:
                if (b3.grid) {
                    bs.addClass("button-active")
                }
                break;
            case 67:
                if (!b3.grid) {
                    a7.parent().addClass("settings-active")
                }
                break;
            case 70:
                if (!b3.grid) {
                    l.parent().addClass("settings-active")
                }
                break;
            case 71:
                if (!b3.grid) {
                    K.addClass("button-active")
                }
                break;
            case 73:
                if (!b3.grid) {
                    be.addClass("button-active")
                }
                break;
            case 77:
                if (!b3.grid) {
                    bc.parent().addClass("settings-active")
                }
                break;
            case 83:
                if (!b3.grid) {
                    n.parent().addClass("settings-active")
                }
                break
            }
        }).keyup(function(cf) {
            if (b3.sharing && a4.is(":focus")) {
                if (cf.keyCode === 13) {
                    k()
                }
                return 
            }
            if (cf.altKey || cf.ctrlKey || cf.shiftKey || cf.metaKey || b3.zooming) {
                return 
            }
            switch (cf.keyCode) {
            case 8:
                cf.preventDefault();
                break;
            case 27:
                h();
                break;
            case 32:
                if (b3.grid) {
                    Z()
                } else {
                    aE.removeClass("button-active");
                    S()
                }
                break;
            case 37:
                if (b3.grid) {
                    aY.removeClass("button-active");
                    bQ()
                } else {
                    aK.removeClass("button-active");
                    bg()
                }
                break;
            case 38:
                if (b3.grid) {
                    aY.removeClass("button-active");
                    bQ()
                }
                break;
            case 39:
                if (b3.grid) {
                    bs.removeClass("button-active");
                    ao()
                } else {
                    bV.removeClass("button-active");
                    bf()
                }
                break;
            case 40:
                if (b3.grid) {
                    bs.removeClass("button-active");
                    ao()
                }
                break;
            case 67:
                if (!b3.grid) {
                    bw();
                    a7.parent().removeClass("settings-active");
                    a7[0].checked = b3.useCountdown
                }
                break;
            case 70:
                if (!b3.grid) {
                    bD();
                    l.parent().removeClass("settings-active");
                    l[0].checked = b3.useCameraFlash
                }
                break;
            case 71:
                K.removeClass("button-active");
                Z();
                break;
            case 73:
                if (!b3.grid) {
                    be.removeClass("button-active");
                    !b3.capturing&&!b3.sharing&&!b3.grid && bZ.toggle()
                }
                break;
            case 77:
                if (!b3.grid) {
                    bc.parent().removeClass("settings-active")
                }
                P();
                bc[0].checked = a1.mirror;
                break;
            case 83:
                if (!b3.grid) {
                    n.parent().removeClass("settings-active")
                }
                a2();
                n[0].checked = a1.square;
                break
            }
        })
    }
    function a() {
        if (!ah) {
            if (aP) {
                aP.destroy()
            }
            aP = new R.Grid(a9, v, 320, Math.floor(320 / ak))
        }
    }
    function bX(ci) {
        if (v && v.videoWidth && v.videoHeight && v.videoWidth > 2 && v.videoHeight > 2) {
            var cf = v.videoWidth + "x" + v.videoHeight;
            R.trackEvent("Capabilities", "Resolution", cf);
            R.log("Resolution", cf);
            ak = v.videoWidth / v.videoHeight
        } else {
            R.trackEvent("Capabilities", "Resolution", "None");
            R.log("Resolution", "None");
            ak = ah ? 3 / 4 : 4 / 3
        }
        try {
            var ch;
            if (a1) {
                ch = a1.id;
                a1.destroy();
                b1.remove();
                av.prepend("<canvas/>");
                b1 = $("#toy-view canvas")
            }
            a1 = new R.Effect(b1[0], v, 800, Math.floor(800 / ak));
            a1.setEffect(ch);
            a()
        } catch (cg) {
            R.error(cg);
            return 
        }
        if (ci) {
            ci()
        }
    }
    function e() {
        clearTimeout(bk);
        cancelAnimationFrame(J);
        if (v) {
            v.pause()
        }
        if (a1) {
            a1.destroyShaders()
        }
        if (b3.grid) {
            if (b3.zooming) {
                b3.zooming = false;
                aD.removeClass("wait");
                $("#button-effects p").show();
                i.hide()
            }
            b3.grid = false;
            O()
        }
        if (b3.gridLoaded) {
            b3.gridLoaded = false;
            a()
        }
        R.log("Effects destroyed")
    }
    bY.destroy = function(cf) {
        if (b3.destroyed) {
            return 
        }
        e();
        jQuery(document).off("keydown keyup");
        b7.css("opacity", 1).show();
        N.hide();
        b9.hide();
        b3.destroyed = true;
        R.error(cf)
    };
    function d(cf) {
        cf.preventDefault();
        bY.destroy("WebGL context lost")
    }
    function D() {
        if (!b3.destroyed || b3.restoreCount > 3) {
            return 
        }
        bX();
        bL();
        a5();
        bB();
        aG();
        b7.hide();
        N.show();
        b9.show();
        b3.destroyed = false;
        b3.restoreCount++;
        var cf = "WebGL context restored";
        R.trackEvent("Error", cf, "", true);
        R.log(cf)
    }
    function L(cg) {
        var cf = new Image();
        cf.src = R.Services.assetsURL + "images/" + cg
    }
    bY.loadImages = function() {
        var cf = ["bg-wood-light.jpg", "video.svg", "camera.svg", "camera4.svg", "gear.svg", "check.svg", "twitter.svg", "facebook.svg", "power.svg", "bg-linen.jpg"];
        if (R.ua.locale === "ru") {
            cf.push("vk.svg")
        } else {
            cf.push("tumblr.svg")
        }
        for (var cg = 0; cg < cf.length; cg++) {
            L(cf[cg])
        }
    };
    function bb() {
        if (!a1) {
            R.error("Effects not found");
            return 
        }
        if (ah) {
            P()
        } else {
            b3.saveFilename = Q.attr("data-save") || "webcam-toy-photo.jpg";
            b3.saveFilename = b3.saveFilename.substr(0, b3.saveFilename.indexOf("."));
            try {
                b3.saveCount = (parseInt(localStorage.getItem("saveCount"), 10) || 1)
            } catch (cf) {}
            $("#button-effects .effect span").remove();
            bc[0].checked = a1.mirror;
            n[0].checked = a1.square;
            a7[0].checked = b3.useCountdown;
            l[0].checked = b3.useCameraFlash;
            F[0].checked = ce();
            jQuery(document).on("webkitfullscreenchange mozfullscreenchange mozfullscreenerror", function() {
                F[0].checked = ce();
                bB()
            }).on("visibilitychange webkitvisibilitychange mozvisibilitychange", function() {
                if (v && a1) {
                    if (document.hidden || document.webkitHidden || document.mozHidden) {
                        if (!bv) {
                            bv = true;
                            R.log("App hidden")
                        }
                    } else {
                        if (bv) {
                            bv = false;
                            R.log("App visible");
                            a1.setEffect(a1.id);
                            bB();
                            aG()
                        }
                    }
                }
                try {
                    localStorage.setItem("log", R.log())
                } catch (cg) {}
            });
            av.addClass("toy-shadow");
            R.Services.onFacebookUser = m;
            R.Services.facebookUser()
        }
        a5();
        aR();
        $(window).resize(bB);
        bB();
        aG();
        b7.removeClass("wait");
        al(0, b7, 100, function() {
            al(1, N, 0, function() {
                al(1, b9, 0, bL, true)
            }, true)
        }, true)
    }
    bY.init = function(cf) {
        if (v) {
            return 
        }
        v = cf;
        if (window.$) {
            $("#toy-main canvas").on("webglcontextlost", d).on("webglcontextrestored", D)
        }
        if (v && v.videoWidth) {
            bX(bb)
        } else {
            setTimeout(bX, 1000, bb)
        }
    };
    return bY
}(WebcamToy));
WebcamToy.Home = (function(e) {
    var a = {}, o, j = 0, b = 4, d, c;
    function l() {
        b++;
        b%=o.length
    }
    function i(q) {
        return e.Services.assetsURL + "photos/" + q + ".jpg"
    }
    function n(r, q) {
        if (r && q && q.img && q.id) {
            r.css("background-image", "url(" + i(q.img) + ")");
            r.attr("href", "http://pic.twitter.com/" + q.id)
        }
    }
    function h(q) {
        if (q && window.$) {
            var r = $("#photo" + (j + 1)), s;
            try {
                if (r) {
                    s = r.find("div");
                    if (s&&!!s[0]) {
                        if (e.ua.ie || e.ua.firefox) {
                            s.animate({
                                opacity: 1
                            }, 200)
                        } else {
                            s.css("opacity", 1)
                        }
                    }
                }
            } catch (t) {}
            d = setTimeout(function() {
                n(r, q);
                j++;
                j%=4;
                l();
                d = setTimeout(function() {
                    try {
                        if (s&&!!s[0]) {
                            if (e.ua.ie || e.ua.firefox) {
                                s.animate({
                                    opacity: 0
                                }, 200)
                            } else {
                                s.css("opacity", 0)
                            }
                        }
                    } catch (u) {}
                    p()
                }, 150)
            }, 210)
        }
    }
    function k() {
        var q = o[b];
        if (!q ||!q.img ||!q.id || q.img.length !== 15) {
            p();
            return 
        }
        var r = new Image();
        r.onload = function() {
            if (e.ua.ie) {
                d = setTimeout(function() {
                    h(q)
                }, 1400)
            } else {
                d = setTimeout(h, 1400, q)
            }
        };
        r.onerror = function() {
            l();
            d = setTimeout(p, 100)
        };
        r.src = i(q.img)
    }
    function p(q) {
        try {
            if (!$("#app").is(":visible")) {
                if ($("#home-photos").is(":visible") && $(window).width() > 700) {
                    k()
                } else {
                    d = setTimeout(p, 3000)
                }
            }
        } catch (r) {}
    }
    function f() {
        return (Math.round(Math.random()) - 0.5)
    }
    function g() {
        var q = $("#home-photos").attr("data-json");
        c = $.ajax({
            url: "/assets/photos/" + (q || "photos") + ".json",
            dataType: "json",
            timeout: 20000,
            error: function() {},
            success: function(t) {
                if (t && t.photos) {
                    o = t.photos.sort(f);
                    for (var s = 0; s < 4; s++) {
                        var r = $("#photo" + (s + 1));
                        n(r, t.photos[s])
                    }
                    setTimeout(function() {
                        try {
                            var u = $("#home-photos div");
                            if (u&&!!u[0]) {
                                if (e.ua.ie || e.ua.firefox) {
                                    u.animate({
                                        opacity: 0
                                    }, 200)
                                } else {
                                    u.addClass("photo-fade").css("opacity", 0)
                                }
                            }
                        } catch (v) {}
                    }, 200);
                    d = setTimeout(p, 500)
                }
            }
        })
    }
    a.setFacebookUser = function(q) {
        if (window.$) {
            var r = $("#home-fb").html();
            if (r && q.firstName) {
                $("#home-main").animate({
                    opacity: 0
                }, 150, function() {
                    if (window.$) {
                        $("#home-main").html(r.replace("%s", q.firstName)).delay(150).animate({
                            opacity: 1
                        }, 150);
                        if (q.id && q.url) {
                            setTimeout(function() {
                                $("#home-main .fb-pic").attr("href", q.url).css("background-image", "url(https://graph.facebook.com/v" + e.Services.facebookVersion + "/" + q.id + "/picture)")
                            }, 0)
                        } else {
                            $("#home-main .fb-pic").hide()
                        }
                    }
                })
            }
        }
    };
    function m() {
        if (e.init && window.$) {
            var s = $("#home"), q = $("#home-cws,#home-sponsor"), r = $("#home-photos div");
            clearTimeout(d);
            if (c) {
                c.abort()
            }
            if (q) {
                q.fadeOut(200)
            }
            if (r) {
                r.stop()
            }
            if (s) {
                s.delay(50).fadeOut(250, function() {
                    setTimeout(function() {
                        if (q) {
                            if (e.ua.ie) {
                                q.hide()
                            } else {
                                q.remove()
                            }
                        }
                        setTimeout(function() {
                            if (e.init) {
                                e.init()
                            }
                        }, 30)
                    }, 30)
                })
            } else {
                if (q) {
                    q.hide()
                }
                e.init()
            }
        }
    }
    a.init = function() {
        if ($.fn.noisy) {
            $("#home-bg").noisy()
        }
        if ($.fn.buttonClick) {
            $("#button-init").buttonClick(m)
        } else {
            $("#button-init").click(m)
        }
        $("#home-photos a,#home-body a,#home footer a").click(function(q) {
            e.trackEvent("Outbound", q.target.href || q.currentTarget.href)
        });
        $("#home-photos a").click(function(q) {
            e.popup(q, "http://t.co/" + (q.target.href || q.currentTarget.href).substr(23), Math.min(screen.availWidth, 703), Math.min(screen.availHeight - 100, 660), "photowindow")
        });
        if (e.ua.chrome && e.Services.isHosted) {
            $("#home-cws").attr("onclick", "try{chrome.webstore.install();return false;}catch(e){}")
        }
        if (!e.ua.mobile) {
            g()
        }
    };
    return a
}(WebcamToy));


</script>
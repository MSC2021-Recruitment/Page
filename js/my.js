var $document = mdui.$(document);
var log1 = new mdui.Dialog('#login');
var DEFAULT_PRIMARY = 'light-blue';
var DEFAULT_ACCENT = 'deep-orange';
var DEFAULT_LAYOUT = 'auto';
editor = new Array()
inst = new mdui.Drawer('#draw');

function login() {
    if (mdui.$('#user_name').val() == "" || mdui.$('#pass_word').val() == "") {
        mdui.snackbar({
            message: '信息不能为空'
        });
        return;
    }
    if (!mdui.$('#user_name').val().match(/^\w+@\w+\.\w+$/i)) {
        mdui.snackbar({
            message: '邮箱格式不正确'
        });
        return;
    }
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            q: mdui.$('#user_name').val(),
            p: mdui.$('#pass_word').val(),
            stat: 1
        },
        success: function(data) {
            if (data) {
                var d = new Date();
                d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = "username=" + mdui.$('#user_name').val() + ";" + expires;
                setTimeout(() => {
                    mdui.snackbar({
                        message: "欢迎 " + cook(',username')
                    });
                }, 100)
                mdui.$('#user_name').val('')
                mdui.$('#pass_word').val('')
                closex()
                load()
            } else {
                mdui.snackbar({
                    message: "用户名或密码错误"
                });
            }
        }
    });
}

function send() {
    if (!mdui.$('#reg_user_name').val().match(/^\w+@\w+\.\w+$/i)) {
        mdui.snackbar({
            message: '邮箱格式不正确'
        });
        return;
    }
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            username: mdui.$('#reg_user_name').val(),
            stat: 7
        },
        success: function(data) {
            if (data == 1)
                mdui.snackbar({
                    message: "验证码已发送"
                });
            else {
                mdui.snackbar({
                    message: "请等待" + data + "秒"
                });
            }
        }
    });
}

function register() {
    if (mdui.$('#name').val() == "" || mdui.$('#school_number').val() == "" || mdui.$('#reg_user_name').val() == "" || mdui.$('#reg_pass_word').val() == "") {
        mdui.snackbar({
            message: '信息格式不正确'
        });
        return;
    } else
    if (!mdui.$('#reg_user_name').val().match(/^\w+@\w+\.\w+$/i)) {
        mdui.snackbar({
            message: '邮箱格式不正确'
        });
        return;
    } else if (mdui.$('#verify').val() == "") {
        mdui.snackbar({
            message: '请输入验证码'
        });
        return;
    }
    mdui.$.ajax({
        method: 'POST',
        url: '2.php',
        data: {
            username: mdui.$('#reg_user_name').val(),
            password: mdui.$('#reg_pass_word').val(),
            name: mdui.$('#name').val(),
            school_number: mdui.$('#school_number').val(),
            verify: mdui.$('#verify').val()
        },
        success: function(data) {
            if (data) {
                mdui.snackbar({
                    message: "注册成功，请重新登陆！"
                });
            } else {
                mdui.snackbar({
                    message: "NOT OK !!!"
                });
            }
        }
    });
}


function i() {
    for (let [m, index] of editor.entries()) {
        mdui.$.ajax({
            method: 'POST',
            url: '1.php',
            data: {
                stat: 5,
                num: m
            },
            success: function(dat) {
                var s = dat.indexOf('{')
                var e = dat.indexOf('}')
                dat = dat.substr(s, e + 1)
                dat = JSON.parse(dat)
                index.setValue(dat.ans);
                index.setOption("mode", dat.mode);
                var st = dat.mode;
                var c = Number(m) + 1
                st = "o" + c + st.slice(7);
                if (st == "o" + c + "c++src")
                    st = "o" + c + "csrc";
                mdui.$('.' + st).attr('selected', 'true')
                if (!mdui.$('#s' + c).siblings().is('.mdui-select-position-bottom'))
                    new mdui.Select('#s' + c, {
                        position: 'bottom'
                    });
            }
        });
    }
}

function cook(cname) {
    if (document.cookie != "") {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }
}
var setDocsTheme = function(theme) {
    if (typeof theme.primary === 'undefined') {
        theme.primary = false;
    }
    if (typeof theme.accent === 'undefined') {
        theme.accent = false;
    }
    if (typeof theme.layout === 'undefined') {
        theme.layout = false;
    }

    var i, len;
    var $body = mdui.$('body');
    var classStr = $body.attr('class');
    var classs = classStr.split(' ');

    // 设置主色
    if (theme.primary !== false) {
        for (i = 0, len = classs.length; i < len; i++) {
            if (classs[i].indexOf('mdui-theme-primary-') === 0) {
                $body.removeClass(classs[i])
            }
        }
        $body.addClass('mdui-theme-primary-' + theme.primary);
        setCookie('docs-theme-primary', theme.primary);
        mdui.$('input[name="doc-theme-primary"][value="' + theme.primary + '"]').prop('checked', true);
    }

    // 设置强调色
    if (theme.accent !== false) {
        for (i = 0, len = classs.length; i < len; i++) {
            if (classs[i].indexOf('mdui-theme-accent-') === 0) {
                $body.removeClass(classs[i]);
            }
        }
        $body.addClass('mdui-theme-accent-' + theme.accent);
        setCookie('docs-theme-accent', theme.accent);
        mdui.$('input[name="doc-theme-accent"][value="' + theme.accent + '"]').prop('checked', true);
    }

    // 设置主题色
    if (theme.layout !== false) {
        for (i = 0, len = classs.length; i < len; i++) {
            if (classs[i].indexOf('mdui-theme-layout-') === 0) {
                $body.removeClass(classs[i]);
            }
        }
        $body.addClass('mdui-theme-layout-' + theme.layout);
        setCookie('docs-theme-layout', theme.layout);
        mdui.$('input[name="doc-theme-layout"][value="' + theme.layout + '"]').prop('checked', true);
    }
};

function logout() {
    document.cookie = "username=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            stat: 2
        },
        success: function() {
            mdui.snackbar({
                message: "已注销"
            });
            mdui.$('.more').css('display', 'none')
        },
        error: function() {

        }
    });
    setTimeout(() => {
        location.reload()
    }, 500)
}

function save(dest) {
    mdui.$.ajax({

        method: 'POST',
        url: '1.php',
        data: {
            stat: 4,
            text: editor[dest - 1].getValue(),
            num: dest - 1,
            mode: editor[dest - 1].getOption('mode')
        },
        success: function(x) {
            if (x)
                mdui.snackbar({
                    message: "已保存"
                });
        },
        error: function() {

        }
    });
}

function a(x, y) {
    mdui.$('.tab').css('display', 'none')
    mdui.$('.q').css('font-weight', 'normal')
    mdui.$(document.getElementById(x)).css('display', 'inherit')
    mdui.$(y).css('font-weight', 'bold')
}

function changelang(lan, n) {
    editor[n - 1].setOption("mode", lan)
}

function openx() {
    inst.close()
    setTimeout(() => {
        $('#main').css('display', 'none');
        $('.gmailStyle').css('display', '');
    }, 400)
}

function closex() {
    if ($('#fformTitle').html != "登录") {
        $(".formTitle").html("登录");
        /* Show Login Form */
        $("#formContainer").removeClass("goLeft").addClass("goRight")
    }
    $('#main').css('display', '');
    $('.gmailStyle').css('display', 'none');
    if (document.body.clientWidth > 599) {
        inst.open()
    }
}

function changedraw() {
    inst.toggle();
}


function refresh(n) {
    setTimeout(() => {
        editor[n - 1].refresh()
    }, 100)
}

function create() {
    $(".formTitle").html("注册")
    showProgress()
        /* Show Signup Form */
    $("#formContainer").removeClass("goRight").addClass("goLeft")
}

function rcreate() {
    $(".formTitle").html("登录")
    showProgress()
        /* Show Signup Form */
    $("#formContainer").removeClass("goLeft").addClass("goRight")
}

function load() {
    mdui.$('#ans1').prop('onclick', 'refresh()')
    if (document.body.clientWidth > 599) {
        inst.open()
    }
    if (cook("docs-theme-primary") == undefined) {
        setCookie('docs-theme-primary', DEFAULT_PRIMARY);
    }
    if (cook("docs-theme-accent") == undefined) {
        setCookie('docs-theme-accent', DEFAULT_ACCENT);
    }
    if (cook("docs-theme-layout") == undefined) {
        setCookie('docs-theme-layout', DEFAULT_LAYOUT);
    }
    setDocsTheme({
        primary: cook("docs-theme-primary")
    });
    setDocsTheme({
        accent: cook("docs-theme-accent")
    });
    setDocsTheme({
        layout: cook("docs-theme-layout")
    });
    var x = 0
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            stat: 3
        },
        success: function(data) {
            if (data) {
                mdui.$('#intro').empty()
                mdui.$('#intro').append(cook('username') + ",欢迎来到MSC")
                mdui.$('#log').css('display', 'none')
                mdui.$('.more').css('display', '')
                mdui.$('.word').empty()
                mdui.$('.ans').css('display', '')
                for (var i = 1;; i++) {
                    if (document.getElementById("code" + i)) {
                        if (typeof(editor[i - 1]) == "undefined") {
                            editor.push(CodeMirror.fromTextArea(document.getElementById("code" + i), {
                                lineNumbers: true,
                                lineWrapping: true,
                                matchBrackets: true,
                                foldGutter: true,
                                autorefresh: true,
                                theme: "panda-syntax",
                                gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                                autoCloseBrackets: true
                            }));
                            editor[i - 1].setOption("mode", "text/x-c++src")

                        }

                    } else {
                        break;
                    }
                }
            } else {
                mdui.$('#intro').empty()
                mdui.$('#intro').append("欢迎来到MSC")
                mdui.$('#log').css('display', '')
                mdui.$('.ans').css('display', 'none')
                mdui.$('.word').empty()
                mdui.$('.word').append("<div class='mdui-divider'></div>")
                mdui.$('.word').append("<br/><div class='mdui-text-color-deep-orange' style='margin-left:5%'>答题请登录</div><br/>")
            }
        },
        error: function() {

        }
    });
    setTimeout(() => {
        i()
    }, 500)
}
var setCookie = function(key, value) {
    // cookie 有效期为 1 年
    var date = new Date();
    date.setTime(date.getTime() + 365 * 24 * 3600 * 1000);
    document.cookie = key + '=' + value + '; expires=' + date.toGMTString() + '; path=/';
};

document.DOMContentLoaded = load()
mdui.$(function() {
    /**
     * 设置文档主题
     */

    // 设置 cookie
    // 切换主色
    $document.on('change', 'input[name="doc-theme-primary"]', function() {
        setDocsTheme({
            primary: mdui.$(this).val()
        });
    });

    // 切换强调色
    $document.on('change', 'input[name="doc-theme-accent"]', function() {
        setDocsTheme({
            accent: mdui.$(this).val()
        });
    });

    // 切换主题色
    $document.on('change', 'input[name="doc-theme-layout"]', function() {
        setDocsTheme({
            layout: mdui.$(this).val()
        });
    });

    // 恢复默认主题
    $document.on('cancel.mdui.dialog', '#dialog-docs-theme', function() {
        setDocsTheme({
            primary: DEFAULT_PRIMARY,
            accent: DEFAULT_ACCENT,
            layout: DEFAULT_LAYOUT
        });
    });

    // 如果抽屉栏当前激活项不在视野中，则滚动抽屉栏，使激活项位于垂直居中
    (function() {
        var $drawer = mdui.$('#main-drawer');
        var $activeItem = $drawer.find('.mdui-list-item-active');

        if (!$activeItem.length) {
            return;
        }

        var activeItemOffsetTop = $activeItem.offset().top;
        var drawerHeight = $drawer.innerHeight();

        if (activeItemOffsetTop - 64 < 0 || activeItemOffsetTop - 64 + 238 > drawerHeight) {
            $drawer[0].scrollTop = activeItemOffsetTop + $drawer[0].scrollTop - drawerHeight / 2;
        }
    })();
});
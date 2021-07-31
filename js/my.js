var $document = $(document);
var log1 = new mdui.Dialog('#login');
var DEFAULT_PRIMARY = 'light-blue';
var DEFAULT_ACCENT = 'deep-orange';
var DEFAULT_LAYOUT = 'auto';
editor = new Array()

mdui.$('#mainpage').css('font-weight', 'bold')
$('#me').on('mouseover', function() {
    console.log(1)
    clearInterval(wap)
    $('#me').removeClass('mdui-fab-hide')
})

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
            if (data == 1) {
                var d = new Date();
                d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = "username=" + mdui.$('#user_name').val() + ";" + expires;
                setTimeout(() => {
                    mdui.snackbar({
                        message: "欢迎 " + cook(',username')
                    });
                }, 100)
                closex()
                load()
                var a = new mdui.Dialog('#tips')
                a.open()
            } else {
                mdui.snackbar({
                    message: "用户名或密码错误"
                });
            }
        }
    });
}

function send(type) {
    if (type == "reg") {
        $("#progress-bar").removeClass("hidden")
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
                console.log(data)
                if (data == 0) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "验证码已发送"
                    });
                } else if (data == -1) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "发送失败"
                    });
                } else if (data == -2) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "账号已存在"
                    });
                } else if (data > 0) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "请等待" + data + "秒"
                    });
                }
            }
        });
    } else if (type == "forget") {
        $("#progress-bar").removeClass("hidden")
        mdui.$.ajax({
            method: 'POST',
            url: '1.php',
            data: {
                username: mdui.$('#forget_username').val(),
                stat: 12
            },
            success: function(data) {
                console.log(data)
                if (data == 0) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "验证码已发送"
                    });
                } else if (data == -1) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "发送失败"
                    });
                } else if (data > 0) {
                    $("#progress-bar").addClass("hidden")
                    mdui.snackbar({
                        message: "请等待" + data + "秒"
                    });
                }
            }
        });
    }

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
            if (data == 1) {
                mdui.snackbar({
                    message: "注册成功，请登录！"
                });
                $(".formTitle").html("登录")
                showProgress()
                    /* Show Signup Form */
                $("#formContainer").removeClass("goLeft").addClass("goRight")
            } else if (data == 2) {
                mdui.snackbar({
                    message: "注册失败，请重试"
                });
            } else if (data == 4) {
                mdui.snackbar({
                    message: "注册失败，账号已存在"
                });
            } else if (data == 0) {
                mdui.snackbar({
                    message: "验证码错误"
                });
            }
        }
    });
}

function check() {
    if (mdui.$('#forget_username').val() == "") {
        mdui.snackbar({
            message: "请输入邮箱"
        });
        return;
    } else if (mdui.$('#forget_verify').val() == "") {
        mdui.snackbar({
            message: "请输入验证码"
        });
        return;
    }
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        stat: 8,
        data: {
            username: mdui.$('#forget_username').val(),
            verify: mdui.$('#forget_verify').val(),
            stat: 8
        },
        success: function(data) {
            if (data == 1)
                create('2')
            else {
                mdui.snackbar({
                    message: "请检查验证码"
                });
            }
        }

    });
}

function forget() {
    if (mdui.$('#forget_password').val() == mdui.$('#re_forget_password').val() && mdui.$('#forget_password').val() != "") {
        mdui.$.ajax({
            method: 'POST',
            url: '1.php',
            data: {
                stat: 9,
                password: mdui.$('#forget_password').val()
            },
            success: function(data) {
                if (data) {
                    mdui.snackbar({
                        message: "修改成功"
                    });
                    closef();
                } else {
                    mdui.snackbar({
                        message: "出现错误"
                    });
                }

            }
        });
    } else {
        mdui.snackbar({
            message: "请检查信息是否正确"
        });
    }
}

function change() {
    if (mdui.$('#old_password').val() == "" || mdui.$('#new_password').val() == "") {
        mdui.snackbar({
            message: "请确保信息完整"
        });
        return;
    }
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            stat: 10,
            old_password: mdui.$('#old_password').val(),
            new_password: mdui.$('#new_password').val()
        },
        success: function(data) {
            if (data == 1) {
                mdui.snackbar({
                    message: "修改成功"
                });
                closec();
            } else if (data == 0) {
                mdui.snackbar({
                    message: "旧密码错误"
                });
            } else {
                mdui.snackbar({
                    message: "未知错误"
                });
            }

        }
    });

}

function sub() {
    if (mdui.$('#major').val() == "" && mdui.$('#will').val() == "" && mdui.$('#self').val() == "") {
        mdui.snackbar({
            message: "请填满哦"
        });
        return;
    }
    mdui.$.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            stat: 11,
            major: mdui.$('#major').val(),
            will: mdui.$('#will').val(),
            self: mdui.$('#self').val()
        },
        success: function(data) {
            if (data == 1) {
                mdui.snackbar({
                    message: "提交成功"
                });
                closei();
            } else {
                mdui.snackbar({
                    message: "提交失败"
                });
            }

        }
    });

}
i = function() {
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
        HTMLElement.prototype.__defineGetter__("currentStyle", function() {
            return this.ownerDocument.defaultView.getComputedStyle(this, null);
        });
        var color = document.body.currentStyle.backgroundColor;
        mdui.$('.sp').css('background-color', color)
        if (color == "rgb(255, 255, 255)")
            mdui.$('.overflowHidden').css('background-color', '');
        else {
            mdui.$('.overflowHidden').css('background-color', '#212121');
        }
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

function save(dest, group) {
    mdui.$.ajax({

        method: 'POST',
        url: '1.php',
        data: {
            stat: 4,
            text: editor[dest - 1].getValue(),
            num: dest - 1,
            mode: editor[dest - 1].getOption('mode'),
            group: group
        },
        success: function(x) {
            console.log(x)
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
    mdui.$(y).children().children().css('font-weight', 'bold')
}

function changelang(lan, n) {
    editor[n - 1].setOption("mode", lan)
}

function openx() {
    inst.close()
    setTimeout(() => {
        $('#main').css('display', 'none');
        $('#login').css('display', '');
    }, 400)
    setTimeout(function() {
        $(".progress-bar").addClass("hidden")
    }, 500)
}

function closex() {
    if ($('#fformTitle').html != "登录") {
        $(".formTitle").html("登录");
        /* Show Login Form */
        $("#formContainer").removeClass("goLeft").addClass("goRight")
    }
    $('#main').css('display', '');
    $('#login').css('display', 'none');
    if (document.body.clientWidth >= 1024) {
        inst.open()
    }
}

function openi() {
    inst.close()
    setTimeout(() => {
        $('#main').css('display', 'none');
        $('#info').css('display', '');
    }, 400)
    setTimeout(function() {
        $(".progress-bar").addClass("hidden")
    }, 500)
}

function closei() {
    $('#main').css('display', '');
    $('#info').css('display', 'none');
    if (document.body.clientWidth >= 1024) {
        inst.open()
    }
}

function openc() {
    inst.close()
    setTimeout(() => {
        $('#main').css('display', 'none');
        $('#change').css('display', '');
    }, 400)
    setTimeout(function() {
        $(".progress-bar").addClass("hidden")
    }, 500)
}

function closec() {
    $('#main').css('display', '');
    $('#change').css('display', 'none');
    if (document.body.clientWidth >= 1024) {
        inst.open()
    }
}

function openf() {
    $('#forget').css('display', '');
    $('#login').css('display', 'none');
    $(".progress-bar").removeClass("hidden")
    setTimeout(function() {
        $(".progress-bar").addClass("hidden")
    }, 500)
}

function closef() {
    $('#forget').css('display', 'none');
    $('#login').css('display', '');
    $(".progress-bar").removeClass("hidden")
    setTimeout(function() {
        $(".progress-bar").addClass("hidden")
    }, 500)
}

function changedraw() {
    inst.toggle();
}

function refresh(n) {
    setTimeout(() => {
        editor[n - 1].refresh()
    }, 100)
}

function create(a = "1") {
    if (a == "1")
        mdui.$("#tit").text("注册")
    showProgress()
        /* Show Signup Form */
    mdui.$("#formContainer" + a).removeClass("goRight").addClass("goLeft")
}

function rcreate(a = "1") {
    if (a == "1")
        mdui.$("#tit").text("登录")
    showProgress()
        /* Show Signup Form */
    mdui.$("#formContainer" + a).removeClass("goLeft").addClass("goRight")
}

function load() {
    inst = new mdui.Drawer('#draw');
    mdui.$('#ans1').prop('onclick', 'refresh()')
    if (document.body.clientWidth >= 1024) {
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
                mdui.$('#intro').append(data + ",欢迎来到MSC")
                mdui.$('#log').css('display', 'none')
                mdui.$('.more').css('display', '')
                mdui.$('.word').empty()
                mdui.$('.mdui-divider').css('display', '')
                mdui.$('.ans').css('display', '')
                setInterval(function() {
                    mdui.$.ajax({
                        url: "talk.php",
                        method: "POST",
                        data: {
                            stat: 1
                        },
                        success: function(a) {
                            if (a) {
                                clearInterval(wap)
                                wap = setInterval(function() {
                                    if ($('#me').hasClass('mdui-fab-hide'))
                                        $('#me').removeClass('mdui-fab-hide')
                                    else
                                        $('#me').addClass('mdui-fab-hide')
                                }, 600)
                            }
                        }
                    })
                }, 600000)
                mdui.$.ajax({
                    url: "talk.php",
                    method: "POST",
                    data: {
                        stat: 1
                    },
                    success: function(a) {
                        if (a) {
                            wap = setInterval(function() {
                                if ($('#me').hasClass('mdui-fab-hide'))
                                    $('#me').removeClass('mdui-fab-hide')
                                else
                                    $('#me').addClass('mdui-fab-hide')
                            }, 600)
                            mdui.snackbar({
                                message: "新消息"
                            });

                        }
                    }
                })
                for (var m = 1;; m++) {
                    if (document.getElementById("code" + m)) {
                        if (typeof(editor[i - 1]) == "undefined") {
                            editor.push(CodeMirror.fromTextArea(document.getElementById("code" + m), {
                                lineNumbers: true,
                                lineWrapping: true,
                                matchBrackets: true,
                                foldGutter: true,
                                autorefresh: true,
                                theme: "panda-syntax",
                                gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                                autoCloseBrackets: true
                            }));
                            editor[m - 1].setOption("mode", "text/x-c++src")

                        }

                    } else {
                        break;
                    }
                    i()
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

}
var setCookie = function(key, value) {
    // cookie 有效期为 1 年
    var date = new Date();
    date.setTime(date.getTime() + 365 * 24 * 3600 * 1000);
    document.cookie = key + '=' + value + '; expires=' + date.toGMTString() + '; path=/';
};
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
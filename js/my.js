var $ = mdui.$;
var $document = $(document);
var DEFAULT_PRIMARY = 'light-blue';
var DEFAULT_ACCENT = 'deep-orange';
var DEFAULT_LAYOUT = 'auto';

function a(x, y) {
    $('.tab').css('display', 'none')
    $('.q').css('font-weight', 'normal')
    $(document.getElementById(x)).css('display', 'inherit')
    $(y).css('font-weight', 'bold')
}

function login() {
    if ($('#log1').val() == "" || $('#log2').val() == "") {
        mdui.snackbar({
            message: '信息格式不正确'
        });
        return;
    }
    $.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            q: $('#log1').val(),
            p: $('#log2').val(),
            stat: 1
        },
        success: function(data) {
            if (data) {
                var d = new Date();
                d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = "username=" + $('#log1').val() + ";" + expires;
                mdui.snackbar({
                    message: "欢迎 " + cook(',username')
                });
                setTimeout(() => location.reload(), 500)
            } else {
                mdui.snackbar({
                    message: "用户名或密码错误"
                });
            }
        }
    });
}

function load() {
    if (document.body.clientWidth > 599) {
        var inst = new mdui.Drawer('#draw');
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
    $.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            stat: 3
        },
        success: function(data) {
            if (data) {
                $('#intro').append(cook('username') + ",欢迎来到MSC")
                $('#log').css('display', 'none')
                $('.more').css('display', '')
                var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                    lineNumbers: true,
                    lineWrapping: true,
                    matchBrackets: true,
                    foldGutter: true,
                    mode: "text/javascript",
                    mode: "text/x-c++src",
                    theme: "panda-syntax",
                    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"]
                });
                setTimeout(() => {
                    editor.refresh()
                }, 1)

            } else {
                $('#intro').append("欢迎来到MSC")
                $('#log').css('display', '')
                $('.ans').css('display', 'none')
                $('.ans').parent().parent().append("<div class='mdui-divider'></div>")
                $('.ans').parent().parent().append("<br/><div class='mdui-text-color-deep-orange' style='margin-left:5%'>答题请登录</div><br/>")
            }
        },
        error: function() {

        }
    });
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
    var $body = $('body');
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
        $('input[name="doc-theme-primary"][value="' + theme.primary + '"]').prop('checked', true);
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
        $('input[name="doc-theme-accent"][value="' + theme.accent + '"]').prop('checked', true);
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
        $('input[name="doc-theme-layout"][value="' + theme.layout + '"]').prop('checked', true);
    }
};

function logout() {
    document.cookie = "username=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    $.ajax({
        method: 'POST',
        url: '1.php',
        data: {
            stat: 2
        },
        success: function() {
            mdui.snackbar({
                message: "已注销"
            });
        },
        error: function() {

        }
    });
    setTimeout(() => location.reload(), 500)
}
var setCookie = function(key, value) {
    // cookie 有效期为 1 年
    var date = new Date();
    date.setTime(date.getTime() + 365 * 24 * 3600 * 1000);
    document.cookie = key + '=' + value + '; expires=' + date.toGMTString() + '; path=/';
};

document.DOMContentLoaded = load()
$(function() {
    /**
     * 设置文档主题
     */

    // 设置 cookie
    // 切换主色
    $document.on('change', 'input[name="doc-theme-primary"]', function() {
        setDocsTheme({
            primary: $(this).val()
        });
    });

    // 切换强调色
    $document.on('change', 'input[name="doc-theme-accent"]', function() {
        setDocsTheme({
            accent: $(this).val()
        });
    });

    // 切换主题色
    $document.on('change', 'input[name="doc-theme-layout"]', function() {
        setDocsTheme({
            layout: $(this).val()
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
        var $drawer = $('#main-drawer');
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
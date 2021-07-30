var DEFAULT_PRIMARY = 'light-blue';
var DEFAULT_ACCENT = 'deep-orange';
var DEFAULT_LAYOUT = 'auto';
var $document = mdui.$(document);
var setCookie = function(key, value) {
    // cookie 有效期为 1 年
    var date = new Date();
    date.setTime(date.getTime() + 365 * 24 * 3600 * 1000);
    document.cookie = key + '=' + value + '; expires=' + date.toGMTString() + '; path=/';
};
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
});

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
var $ = mdui.$
$(function() {
    $.ajax({
        url: 'test.json',
        method: 'POST',
        success: function(data) {
            data = JSON.parse(data, true)
            for (var i of data) {
                r = Math.floor(Math.random() * 255)
                g = Math.floor(Math.random() * 255)
                b = Math.floor(Math.random() * 255)
                $('#entry').append('\
                    <div class="mdui-col-md-4 mdui-col-xs-12 mdui-col-lg-3 mdui-col-sm-6" style="margin-top:16px">\
                        <div class="mdui-card">\
                            <div class="mdui-card-primary" style="background-color:rgba(' + r + ',' + g + ',' + b + ',0.2">\
                                <div class="mdui-card-primary-title"><m>' + i.name + '</m></div>\
                                <div class="mdui-card-primary-subtitle"><m>' + i.email + '</m></div>\
                            </div>\
                            <div class="mdui-card-content" ><p class="mdui-col-xs-12"><m>学号:' + i.number + '</m></p><p class="mdui-col-xs-12"><m>意向:' + i.will + '</m></p></div>\
                            <div class="mdui-card-actions">\
                                <a class="mdui-btn mdui-ripple mdui-ripple-white" onclick="details(&apos;' + i.email + '&apos;)">详细信息</a>\
                                <a class="mdui-btn mdui-ripple mdui-ripple-white" onclick="chat()">留言</a>\
                            </div>\
                        </div>\
                    </div>')
            }
        }
    })
})
$('#search').on('input', function() {
    var a = $('#search').val()
    console.log(a)
    if (a == "") {
        $('.mdui-col-md-4').css('display', '')
        return
    }
    a = a.replace(/\s+/ig, " ")
    a = a.split(" ")
    $('.mdui-col-md-4').css('display', 'none')
    for (var a of a) {
        $('m').each(function(index, m) {
            if ($(this).text().indexOf(a) >= 0) {
                $(this).parents('.mdui-col-md-4').css('display', '')
                console.log($(this).text())
            }
        })
    }
})

function details(email) {
    $.ajax({
        url: 'details.php',
        method: 'POST',
        data: {
            email: email,

        },
        success: function(data) {
            $('#deten').empty();
            $('#p3').css('display', 'inherit')
            $('#p1').css('display', 'none')


        }
    })
}

function logout() {
    $.ajax({
        url: 'alogout.php',
        method: 'POST',
        data: {},
        success: function(data) {
            open("admin.html")
            window.opener = null;
            window.open('', '_self');
            window.close();
        }
    })
}
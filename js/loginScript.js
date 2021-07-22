var allPasswordInp = [];

(function() {

    $("input[type=password]").each(function(idx, ele) {
        allPasswordInp.push(ele)
    })

    routie({
        '': function() {
            showProgress()

            $(".formTitle").html("登录")
                /* Show Login Form */
            $("#formContainer").removeClass("goLeft").addClass("goRight")

        },



        'createAccountNow': function() {

        }
    });

})()

function showProgress() {
    $("#progress-bar").removeClass("hidden")
    setTimeout(function() {
        $("#progress-bar").addClass("hidden")
    }, 500)
}

function showPassword() {
    var iconText = $(".showPassword i").text();
    var input_type = (iconText == "visibility") ? "text" : "password";

    if (input_type == "text") {
        $(".showPassword i").text("visibility_off");
    } else {
        $(".showPassword i").text("visibility");
    }

    $.each(allPasswordInp, function(idx, ele) {
        $(ele).attr("type", input_type);
    })
}
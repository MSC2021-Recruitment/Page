<!DOCTYPE html>
<html lang="zh" style="font-family:Roboto,微软雅黑; height: 100%;">
<?php
$json = file_get_contents("1.json");
$json = json_decode($json, true);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/mdui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/lib/codemirror.css">
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/lib/codemirror.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/addon/fold/foldgutter.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/theme/panda-syntax.css" />
    <script src="https://v-cn.vaptcha.com/v3.js"></script>
    <script type="text/javascript" src="js/output.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/mode/clike/clike.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/mode/go/go.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/mode/python/python.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/mode/perl/perl.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/addon/fold/foldcode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/addon/fold/foldgutter.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/addon/fold/brace-fold.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/addon/fold/comment-fold.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.3/addon/display/autorefresh.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css">
    <title>Hello, world!</title>
    <style>
        .vaptcha-init-main {
            display: table;
            width: 100%;
            height: 100%;
            background-color: #eeeeee;
        }

        .vaptcha-init-loading {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .vaptcha-init-loading>a {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: none;
        }

        .vaptcha-init-loading .vaptcha-text {
            font-family: sans-serif;
            font-size: 12px;
            color: #cccccc;
            vertical-align: middle;
        }

        .tab {
            padding-top: 96px !important;
            z-index: 0;
            margin-left: 0%;
            display: none;
        }

        #bot {
            justify-content: center;
        }

        @media (min-width: 1024px) {
            .mdui-drawer {
                top: 64px;
            }


            .img {
                height: 25%;
                width: 25%
            }

        }

        @media (max-width: 1023.9px) {
            .img {
                height: 50%;
                width: 50%
            }

            body {
                padding-left: 0 !important;
            }
        }


        .forms {
            position: relative;
            width: 50%;
            float: left;
        }
    </style>
</head>

<body class="mdui-container-fluid mdui-drawer-body-left mdui-theme-layout-auto mdui-color-theme mdui-theme-primary-light-blue" style="font-family:Roboto,微软雅黑;height:100%;padding-right:0;padding-left:0px  " id="body" onload="load()">
    <div class="row gmailStyle" id="login" style="display:none;height:100%">
        <div class="container-fluid" style="height:100%">
            <div class="valign-wrapper screenHeight">
                <div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden">
                    <div class="mdui-progress progress-bar" id="">
                        <div class="mdui-progress-indeterminate"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                    <img src="images/msc.png" style="margin: 10px auto; display:block;max-height:50px"/>
                    <h5 class="center-align mar-top mar-bottom formTitle1" id="tit">登录</h5>
                    <p class="center-align pad-no mar-no"></p>
                    <div class="clearfix mar-all pad-all"></div>
                    <div id="formContainer1" class="goRight">
                        <form class="loginForm">
                            <div class="input-fields-div autoMargin">
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">邮箱</label>
                                    <input id="user_name" type="account" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">密码</label>
                                    <input id="pass_word" type="password" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div style="display:inline-block;width:40%;" class="">
                                    没有账户？&nbsp;<a href="javascript:;" onclick="create()" class="backToLogin">创建账户</a></div>
                                <div class="mdui-text-right" style="text-align:right;display:inline-block;right:10%;width:50%"> <a href="javascript:;" onclick="openf()">忘记密码</a>
                                </div>
                                <div id="v1" style="width: 100%;height: 36px;margin-top:2.5%;margin-bottom:4%"></div>
                                
                                </a>
                                </p>
                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div onclick="closex();" class="mdui-btn mdui-btn-ripple">返回</div>
                                <div onclick="login()" id="lo" class=" mdui-btn mdui-btn-ripple">登录</div>
                            </div>
                        </form>
                        <form class="signUpForm">
                            <div class="input-fields-div autoMargin">
                                <div class=" ">
                                    <div class="mdui-textfield  mdui-textfield-floating-label" style="display:inline-block;width:48%">
                                        <label class="mdui-textfield-label">姓名</label>
                                        <input id="name" type="txt" class="mdui-textfield-input" required>
                                    </div>
                                    <div class="mdui-textfield mdui-textfield-floating-label" style="display:inline-block;width:48%;right:0">
                                        <label class="mdui-textfield-label">学号</label>
                                        <input id="school_number" type="txt" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                    </div>
                                </div>
                                <div class="mdui-textfield mdui-textfield-floating-label" style="width:96%">
                                    <label class="mdui-textfield-label">邮箱</label>
                                    <input id="reg_user_name" type="txt" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>

                                </div>
                                <div class="">
                                    <div class="mdui-textfield mdui-textfield-floating-label" style="display:inline-block;width:48%">
                                        <label class="mdui-textfield-label">密码</label>
                                        <input id="reg_pass_word" type="txt" class="mdui-textfield-input" required>
                                    </div>
                                    <div class="mdui-textfield  mdui-textfield-floating-label" style="display:inline-block;width:48%;right:0">
                                        <label class="mdui-textfield-label">验证码</label>
                                        <input id="verify" type="txt" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                    </div>
                                </div>
                                <div>
                                    <div style="display:inline-block;width:40%;" class="">
                                        我有账户&nbsp;<a href="javascript:;" onclick="rcreate()" class="backToLogin">现在登录</a></div>
                                    <div class="mdui-text-right" style="text-align:right;display:inline-block;right:10%;width:50%"> <a href="javascript:;" onclick="send('reg')">发送验证码</a></div>
                                </div>
                                <div id="v2" style="width: 100%;height: 36px;margin-top:2.5%;margin-bottom:4%"></div>
                                <div class="mdui-invisible">sd</div>
                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div onclick="closex()" class=" mdui-btn mdui-btn-ripple">返回</div>
                                <div onclick="register()" class=" mdui-btn mdui-btn-ripple">注册</div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gmailStyle" id="forget" style="display:none;height:100%">
        <div class="container-fluid" style="height:100%">
            <div class="valign-wrapper screenHeight">
                <div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden ">
                    <div class="mdui-progress progress-bar" id="">
                        <div class="mdui-progress-indeterminate"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                    <img src="images/msc.png" style="margin: 10px auto; display:block;max-height:50px"/>
                    <h5 class="center-align mar-top mar-bottom formTitle">忘记密码</h5>
                    <p class="center-align pad-no mar-no"></p>
                    <div class="clearfix mar-all pad-all"></div>
                    <div id="formContainer2" class="goRight">
                        <form class="forms">
                            <div class="input-fields-div autoMargin">
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">邮箱</label>
                                    <input id="forget_username" type="account" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">验证码</label>
                                    <input id="forget_verify" type="txt" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div style="display:inline-block;width:40%;" class="">
                                </div>
                                <div class="mdui-text-right" style="text-align:right;display:inline-block;right:10%;width:50%"> <a href="javascript:;" onclick="send('forget')">获取验证码</a>
                                </div>
                                
                                
                                </a>

                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div onclick="closef();" class="mdui-btn mdui-btn-ripple">返回</div>
                                <div onclick="check();" class="mdui-btn mdui-btn-ripple">下一步</div>
                            </div>
                        </form>
                        <form class="forms">
                            <div class="input-fields-div autoMargin">
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">密码</label>
                                    <input id="forget_password" type="password" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">确认密码</label>
                                    <input id="re_forget_password" type="password" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div style="display:inline-block;width:40%;" class="">
                                </div>
                                <div class="mdui-text-right mdui-invisible" style="text-align:right;display:inline-block;right:10%;width:50%"> <a href="javascript:;" onclick="send('forget')">获取验证码</a>
                                </div>
                                <div id="v3" style="width: 100%;height: 36px;margin-top:2.5%;margin-bottom:4%"></div>
                                </a>
                                </p>
                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div onclick="rcreate('2');" class="mdui-btn mdui-btn-ripple">返回</div>
                                <div onclick="forget();" class=" mdui-btn mdui-btn-ripple">完成</div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gmailStyle" id="change" style="display:none;height:100%">
        <div class="container-fluid" style="height:100%">
            <div class="valign-wrapper screenHeight">
                <div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden ">
                    <div class="mdui-progress progress-bar" id="">
                        <div class="mdui-progress-indeterminate"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                    <img src="images/msc.png" style="margin: 10px auto; display:block;max-height:50px"/>
                    <h5 class="center-align mar-top mar-bottom ">修改密码</h5>
                    <p class="center-align pad-no mar-no"></p>
                    <div class="clearfix mar-all pad-all"></div>
                    <div id="formContainer3" class="goRight">
                        <form class="forms">
                            <div class="input-fields-div autoMargin">
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">旧密码</label>
                                    <input id="old_password" type="password" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">新密码</label>
                                    <input id="new_password" type="password" class="mdui-textfield-input" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required>
                                </div>
                                <div style="display:inline-block;width:40%;" class="">
                                </div>
                                <div class="mdui-invisible" style="text-align:right;display:inline-block;right:10%;width:50%">
                                </div>
                                <div id="v4" style="width: 100%;height: 36px;margin-top:2.5%;margin-bottom:4%"></div>
                                
                                </a>
                                
                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div onclick="closec()" class="mdui-btn mdui-btn-ripple">返回</div>
                                <div onclick="change()" class="mdui-btn mdui-btn-ripple">提交</div>
                            </div>
                        </form>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gmailStyle" id="info" style="display:none;height:100%">
        <div class="container-fluid" style="height:100%">
            <div class="valign-wrapper screenHeight">
                <div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden ">
                    <div class="mdui-progress progress-bar" id="">
                        <div class="mdui-progress-indeterminate"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                    <img src="images/msc.png" style="margin: 10px auto; display:block;max-height:50px"/>
                    <h5 class="center-align mar-top mar-bottom ">完善信息</h5>
                    <p class="center-align pad-no mar-no"></p>
                    <div class="clearfix mar-all pad-all"></div>
                    <div id="formContainer4" class="goRight">
                        <form class="forms">
                            <div class="input-fields-div autoMargin">
                                <div class=" ">
                                    <div class="mdui-textfield  mdui-textfield-floating-label" style="display:inline-block;width:48%">
                                        <label class="mdui-textfield-label">你的专业</label>
                                        <input id="major" type="txt" class="mdui-textfield-input" required>
                                    </div>
                                    <div class="mdui-textfield mdui-textfield-floating-label" style="display:inline-block;width:48%;right:0">
                                        <label class="mdui-textfield-label">意向组</label>
                                        <input id="will" type="txt" class="mdui-textfield-input" required>
                                    </div>
                                </div>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <textarea class="mdui-textfield-input" placeholder="个人介绍" id="self" style="width:96%"></textarea>
                                </div>
                                <div style="display:inline-block;width:40%;" class="">
                                </div>
                                <div class="mdui-invisible" style="text-align:right;display:inline-block;right:10%;width:50%">
                                </div>
                                <p class="mdui-invisible">x</p>
                                </a>
                                </p>
                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div onclick="closei()" class="mdui-btn mdui-btn-ripple">返回</div>
                                <div class="mdui-btn mdui-btn-ripple" mdui-dialog="{target: '#sub'}">提交</div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-dialog" id="sub">
        <div class="mdui-dialog-content">是否提交?提交后不可修改</div>
        <div class="mdui-dialog-actions">
            <div class="mdui-btn mdui-ripple " mdui-dialog-close>返回</div>
            <div class="mdui-btn mdui-ripple " mdui-dialog-confirm onclick="sub()">提交</div>
        </div>
    </div>
    <main id="main" style="height:100%">
        <header class=" mdui-appbar mdui-appbar-fixed ">
            <div class="mdui-toolbar full mdui-toolbar-spacer mdui-color-theme">
                <a href="javascript:;" class="mdui-btn mdui-btn-icon" onclick="changedraw();"><i class="mdui-icon material-icons">menu</i></a>
                <span class="mdui-typo-title" id="intro">欢迎来到MSC</span>
                <div class="mdui-toolbar-spacer"></div>
                <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-dialog="{target: '#dialog-docs-theme'}" mdui-tooltip="{content: '设置主题'}"><i class="mdui-icon material-icons">color_lens</i></span>
                <a href="javascript:;" class=" mdui-typo-title" onclick="openx()" style="display:none" id="log">登录</a>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon " mdui-menu="{target: '#example-1'}" mdui-tooltip="{content: '更多'}"><i class="mdui-icon material-icons ">more_vert</i></a>
                <ul class="mdui-menu " id="example-1">
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple" onclick="load()">刷新</a>
                    </li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple more" style="display:none" onclick="openc()">修改密码</a>
                    </li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple more" style="display:none" onclick="openi()">完善信息</a>
                    </li>
                    <li class="mdui-menu-item" disabled>
                        <a href="javascript:;">联系我们</a>
                    </li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple more" style="display:none" mdui-dialog="{target: '#tips'}">帮助</a>
                    </li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple more" onclick="logout()" style="display:none">注销</a>
                    </li>
                </ul>
            </div>
        </header>
        <div class="mdui-dialog" id="tips">
            <div class="mdui-dialog-title">欢迎</div>
            <div class="mdui-dialog-content">恭喜你成功注册，别忘了点击右上角的更多来完善报名信息哦</div>
            <div class="mdui-dialog-actions">
                <div class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</div>
            </div>
        </div>
        <div class="mdui-drawer mdui-drawer-close mdui-shadow-12" id="draw">
            <div class="mdui-collapse mdui-list" mdui-collapse>
                <div class="mdui-collapse-item " onClick="a('example1-tab0',this)">
                    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                        <a class="mdui-typo-subheading q" id="mainpage">简介</a>
                    </div>
                    <div class="mdui-collapse-item-body">
                        <a></a>
                    </div>
                </div>
                <?php
                $count = 1;
                foreach ($json as $json) {
                    echo
                    '<div class="mdui-collapse-item">
                    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                        <div class="mdui-typo-subheading">' . $json['name'] . '</div>
                        <i class="mdui-collapse-item-arrow mdui-icon material-icons" style="position: absolute;
                    right: 10%;">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-collapse-item-body">';
                    foreach ($json['body'] as $body) {
                        echo '<a onclick="a' . "('example1-tab" . $count . "',this)" . '" class="mdui-list-item mdui-ripple q">' . $body['title'] . '</a>';
                        $count++;
                    }
                    echo '</div>
                </div>';
                }
                ?>

            </div>
        </div>
        <div id="pages" style="height:100%">
            <div id='example1-tab0' class='mdui-p-a-2 tab' style="display:inherit;height:100%;padding: 0 !important;padding: top 96px !important;height:100%">
                <iframe style="height:100%;width:100%;padding:0;border-width: 0px;"  src="index.html">
                </iframe>
            </div>
            <?php
            $json = file_get_contents("1.json");
            $json = json_decode($json, true);
            $n = 1;
            $count = 1;
            foreach ($json as $group) {
                foreach ($group['body'] as $body) {
                    echo "<div id='example1-tab$count' class='mdui-p-a-2 tab'>";
                    if ($body['type'] == "question") {
                        echo
                        '<div class="mdui-card">
                            <div class="mdui-collapse" mdui-collapse>';
                        foreach ($body['body'] as $content) {
                            echo
                            '<div class="mdui-collapse-item">
                                    <div class="mdui-collapse-item-header">
                                        <div class="mdui-card-primary mdui-btn mdui-btn-block mdui-text-left mdui-ripple" style="height:auto">
                                            <div class="mdui-card-primary-title">' . $content['title'] . '</div>
                                            <div class="mdui-card-primary-subtitle">' . $content['sub-title'] . '</div>
                                        </div>
                                    </div>
                                    <div class="mdui-collapse-item-body">
                                        <div class="mdui-card-content">' . $content['content'] . '</div>
                                        <div class="word"></div>
                                        <div class="mdui-panel  mdui-panel-gapless" mdui-panel>
                                            <div class="mdui-panel-item ans">
                                                <div class="mdui-panel-item-header" onclick="refresh(' . $n . ')">答题</div>
                                                <div class="mdui-panel-item-body">
                                                    <div style="left:2%">选择语言：
                                                        <select class="mdui-select" onchange="changelang(this.value,' . $n . ')" id="s' . $n . '">
                                                        <option value="text/x-c++src" class="o' . $n . 'csrc" >C/C++</option>
                                                        <option value="text/x-python" class="o' . $n . 'python">Python</option>
                                                        <option value="text/x-java" class="o' . $n . 'java">Java</option>
                                                        <option value="text/x-perl" class="o' . $n . 'perl">Perl</option>
                                                        <option value="text/x-go" class="o' . $n . 'go">Go</option>
                                                        </select>
                                                    </div>
                                                    <textarea class="form-control" id="code' . $n . '" name="code"></textarea>
                                                    <div class="mdui-panel-item-actions">
                                                        <div class="mdui-btn mdui-ripple" mdui-panel-item-close>cancel</div>
                                                        <div class="mdui-btn mdui-ripple" onclick="save(' . $n . ',\'' . $group['name'] . '\')">save</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>';
                            $n = $n + 1;
                        }
                        echo
                        '</div>
                        </div>
                        </div>';
                    } else if ($body['type'] == "text") {
                        echo '<div class="mdui-container sp" style="height: auto !important;"> 
                        <h1 class="mdui-text-color-theme">' . $body['a1']['title'] . '</h1>
                        <div class="mdui-typo" style="height: auto !important;">
                            <p>' . $body['a1']['content'] . '</p>
                        </div>';
                        foreach ($body['a1']['next'] as $b) {
                            echo '<div class="" style="height: auto !important;">
                            <div class="mdui-typo" style="height: auto !important;">
                                <h2 class=" mdui-text-color-theme">' . $b['title'] . '
                                    <a class="" id=""></a>
                                </h2>
                                <p>' . $b['content'] . '</p>
                            </div>';
                            foreach ($b['next'] as $c) {
                                echo '<div class="mdui-typo">
                                <h4 class="" style="font-weight:bold">' . $c['title'] . '
                                    <a class="" id="c"></a>
                                </h4>
                                <p>' . $c['content'] . '</p>
                            </div>';
                            }
                            echo '</div>';
                        }
                        echo
                        '</div>
                        </div>';
                    }
                    $count++;
                }
            }
            ?>
        </div>
        <div class="mdui-dialog  mdui-shadow-15" id="mes" style="min-height:70%;min-width:50%">
            <div class="mdui-dialog-title">聊天</div>
            <div class="mdui-divider mdui-center"></div>
            <div class="mdui-dialog-content">
                <div class=" mdui-shadow-5 mdui-center" style="height:80%;width:80%" id="chat"></div>
                <div class="mdui-container-fluid mdui-valign" style="width:82%">
                    <div class="mdui-textfield mdui-center mdui-col-xs-11 mdui-col-md-11"><textarea class="mdui-textfield-input" placeholder="Message"></textarea></div>
                    <div class="mdui-btn mdui-btn-icon mdui-ripple mdui-text-center"><i class="mdui-icon material-icons mdui-col-xs-1 mdui-col-md-1">send</i></div>
                </div>
            </div>
            <div class="mdui-dialog-actions">
                <button class="mdui-btn mdui-ripple" mdui-dialog-close>cancel</button>
            </div>
        </div>
    </main>
    <div class="mdui-dialog" id="dialog-docs-theme" style="top: 175.5px; display: none; height: 970px;">
        <div class="mdui-dialog-title">设置文档主题</div>
        <div class="mdui-dialog-content" style="height: 850px;">

            <p class="mdui-typo-title">主题色</p>
            <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
                <div class="mdui-col">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-layout" value="auto" checked="">
                        <i class="mdui-radio-icon"></i>
                        Auto
                    </label>
                </div>
                <div class="mdui-col">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-layout" value="light">
                        <i class="mdui-radio-icon"></i>
                        Light
                    </label>
                </div>
                <div class="mdui-col">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-layout" value="dark">
                        <i class="mdui-radio-icon"></i>
                        Dark
                    </label>
                </div>
            </div>

            <p class="mdui-typo-title mdui-text-color-theme">主色</p>
            <form class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
                <div class="mdui-col mdui-text-color-amber">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="amber">
                        <i class="mdui-radio-icon"></i>
                        Amber
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="blue">
                        <i class="mdui-radio-icon"></i>
                        Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-blue-grey">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="blue-grey">
                        <i class="mdui-radio-icon"></i>
                        Blue Grey
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-brown">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="brown" checked="">
                        <i class="mdui-radio-icon"></i>
                        Brown
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-cyan">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="cyan">
                        <i class="mdui-radio-icon"></i>
                        Cyan
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="deep-orange">
                        <i class="mdui-radio-icon"></i>
                        Deep Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="deep-purple">
                        <i class="mdui-radio-icon"></i>
                        Deep Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="green">
                        <i class="mdui-radio-icon"></i>
                        Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-grey">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="grey">
                        <i class="mdui-radio-icon"></i>
                        Grey
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-indigo">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="indigo">
                        <i class="mdui-radio-icon"></i>
                        Indigo
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="light-blue">
                        <i class="mdui-radio-icon"></i>
                        Light Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="light-green">
                        <i class="mdui-radio-icon"></i>
                        Light Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-lime">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="lime">
                        <i class="mdui-radio-icon"></i>
                        Lime
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="orange">
                        <i class="mdui-radio-icon"></i>
                        Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-pink">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="pink">
                        <i class="mdui-radio-icon"></i>
                        Pink
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="purple">
                        <i class="mdui-radio-icon"></i>
                        Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-red">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="red">
                        <i class="mdui-radio-icon"></i>
                        Red
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-teal">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="teal">
                        <i class="mdui-radio-icon"></i>
                        Teal
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-yellow">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-primary" value="yellow">
                        <i class="mdui-radio-icon"></i>
                        Yellow
                    </label>
                </div>
            </form>

            <p class="mdui-typo-title mdui-text-color-theme-accent">强调色</p>
            <form class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
                <div class="mdui-col mdui-text-color-amber">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="amber">
                        <i class="mdui-radio-icon"></i>
                        Amber
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="blue">
                        <i class="mdui-radio-icon"></i>
                        Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-cyan">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="cyan">
                        <i class="mdui-radio-icon"></i>
                        Cyan
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="deep-orange">
                        <i class="mdui-radio-icon"></i>
                        Deep Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="deep-purple">
                        <i class="mdui-radio-icon"></i>
                        Deep Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="green">
                        <i class="mdui-radio-icon"></i>
                        Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-indigo">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="indigo">
                        <i class="mdui-radio-icon"></i>
                        Indigo
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="light-blue">
                        <i class="mdui-radio-icon"></i>
                        Light Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="light-green">
                        <i class="mdui-radio-icon"></i>
                        Light Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-lime">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="lime">
                        <i class="mdui-radio-icon"></i>
                        Lime
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="orange">
                        <i class="mdui-radio-icon"></i>
                        Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-pink">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="pink" checked="">
                        <i class="mdui-radio-icon"></i>
                        Pink
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="purple">
                        <i class="mdui-radio-icon"></i>
                        Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-red">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="red">
                        <i class="mdui-radio-icon"></i>
                        Red
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-teal">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="teal">
                        <i class="mdui-radio-icon"></i>
                        Teal
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-yellow">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="doc-theme-accent" value="yellow">
                        <i class="mdui-radio-icon"></i>
                        Yellow
                    </label>
                </div>
            </form>

        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-dialog-actions">
            <div class="mdui-btn mdui-ripple mdui-float-left" mdui-dialog-cancel="">恢复默认主题</div>
            <div class="mdui-btn mdui-ripple" mdui-dialog-confirm="">ok</div>
        </div>
    </div>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="js/my.js?v=21"></script>
    <script>
        obj=new Array()
        vaptcha({
            vid: '6121ff3db849dfa2f02958f4', // 验证单元id
            type: 'click',
            container: '#v1', // 显示类型 隐藏式
            scene: 0, // 场景值 默认0
            //可选参数
            //lang: 'auto', // 语言 默认auto,可选值auto,zh-CN,en,zh-TW,jp
            https: false, // 使用https 默认 true
            //area: 'auto' //验证节点区域,默认 cn,可选值 auto,sea,na,cn
        }).then(function(vaptchaObj) {
            obj.push(vaptchaObj) //将VAPTCHA验证实例保存到局部变量中
            vaptchaObj.render() // 调用验证实例 vpObj 的 render 方法加载验证按钮
            //获取token的方式一：
            //vaptchaObj.renderTokenInput('.login-form')//以form的方式提交数据时，使用此函数向表单添加server,token值
            //获取token的方式二：
            vaptchaObj.listen('pass', function() {

                serverToken = vaptchaObj.getServerToken()

                state = 1
            })
            //关闭验证弹窗时触发
            vaptchaObj.listen('close', function() {
                state = 0
            })
        })
        vaptcha({
            vid: '6121ff3db849dfa2f02958f4', // 验证单元id
            type: 'click',
            container: '#v2', // 显示类型 隐藏式
            scene: 0, // 场景值 默认0
            //可选参数
            //lang: 'auto', // 语言 默认auto,可选值auto,zh-CN,en,zh-TW,jp
            https: false, // 使用https 默认 true
            //area: 'auto' //验证节点区域,默认 cn,可选值 auto,sea,na,cn
        }).then(function(vaptchaObj) {
            obj.push(vaptchaObj) //将VAPTCHA验证实例保存到局部变量中
            vaptchaObj.render() // 调用验证实例 vpObj 的 render 方法加载验证按钮
            //获取token的方式一：
            //vaptchaObj.renderTokenInput('.login-form')//以form的方式提交数据时，使用此函数向表单添加server,token值
            //获取token的方式二：
            vaptchaObj.listen('pass', function() {

                serverToken = vaptchaObj.getServerToken()

                state = 1
            })
            //关闭验证弹窗时触发
            vaptchaObj.listen('close', function() {
                state = 0
            })
        })
        vaptcha({
            vid: '6121ff3db849dfa2f02958f4', // 验证单元id
            type: 'click',
            container: '#v3', // 显示类型 隐藏式
            scene: 0, // 场景值 默认0
            //可选参数
            //lang: 'auto', // 语言 默认auto,可选值auto,zh-CN,en,zh-TW,jp
            https: false, // 使用https 默认 true
            //area: 'auto' //验证节点区域,默认 cn,可选值 auto,sea,na,cn
        }).then(function(vaptchaObj) {
            obj.push(vaptchaObj) //将VAPTCHA验证实例保存到局部变量中
            vaptchaObj.render() // 调用验证实例 vpObj 的 render 方法加载验证按钮
            //获取token的方式一：
            //vaptchaObj.renderTokenInput('.login-form')//以form的方式提交数据时，使用此函数向表单添加server,token值
            //获取token的方式二：
            vaptchaObj.listen('pass', function() {

                serverToken = vaptchaObj.getServerToken()

                state = 1
            })
            //关闭验证弹窗时触发
            vaptchaObj.listen('close', function() {
                state = 0
            })
        })
        vaptcha({
            vid: '6121ff3db849dfa2f02958f4', // 验证单元id
            type: 'click',
            container: '#v4', // 显示类型 隐藏式
            scene: 0, // 场景值 默认0
            //可选参数
            //lang: 'auto', // 语言 默认auto,可选值auto,zh-CN,en,zh-TW,jp
            https: false, // 使用https 默认 true
            //area: 'auto' //验证节点区域,默认 cn,可选值 auto,sea,na,cn
        }).then(function(vaptchaObj) {
            obj.push(vaptchaObj) //将VAPTCHA验证实例保存到局部变量中
            vaptchaObj.render() // 调用验证实例 vpObj 的 render 方法加载验证按钮
            //获取token的方式一：
            //vaptchaObj.renderTokenInput('.login-form')//以form的方式提交数据时，使用此函数向表单添加server,token值
            //获取token的方式二：
            vaptchaObj.listen('pass', function() {

                serverToken = vaptchaObj.getServerToken()

                state = 1
            })
            //关闭验证弹窗时触发
            vaptchaObj.listen('close', function() {
                state = 0
            })
        })
    
    </script>

</body>

</html>
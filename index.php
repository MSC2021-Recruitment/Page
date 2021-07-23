<!DOCTYPE html>
<html lang="zh" style="font-family:Roboto,source,微软雅黑; height: 100%;">
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
    <link rel="stylesheet" href="codemirror/lib/codemirror.css">
    <script src="codemirror/lib/codemirror.js"></script>
    <link rel="stylesheet" href="codemirror/addon/fold/foldgutter.css" />
    <link rel="stylesheet" href="codemirror/theme/panda-syntax.css" />
    <script src="codemirror/mode/clike/clike.js"></script>
    <script src="codemirror/mode/go/go.js"></script>
    <script src="codemirror/mode/python/python.js"></script>
    <script src="codemirror/mode/perl/perl.js"></script>
    <script src="codemirror/addon/fold/foldcode.js"></script>
    <script src="codemirror/addon/fold/foldgutter.js"></script>
    <script src="codemirror/addon/fold/brace-fold.js"></script>
    <script src="codemirror/addon/fold/comment-fold.js"></script>
    <script src="codemirror/addon/display/autorefresh.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css">
    <title>Hello, world!</title>
    <style>
        .tab {
            margin-top: 80px;
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
        }

        @media (max-width: 599.9px) {}

        @font-face {
            font-family: source;
            src: url("fonts/SourceHanSansSC-Regular.ttf");
        }

        @font-face {
            font-family: source;
            src: url("fonts/SourceHanSansSC-Bold.ttf");
            font-weight: bold;
        }
    </style>
</head>

<body class="mdui-container-fluid mdui-drawer-body-leftmdui-theme-layout-auto mdui-bottom-nav-fixed mdui-color-theme" style="font-family:Roboto,source,微软雅黑;height:100% ">
    <div class="row gmailStyle" style="display:none;height:100%">
        <div class="container-fluid" style="height:100%">
            <div class="valign-wrapper screenHeight">
                <div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden ">
                    <div class="row hidden" id="progress-bar">
                        <div class="progress mar-no">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                    <img src="images/Googlelogo.png" class="logoImage" />
                    <h5 class="center-align mar-top mar-bottom formTitle">登录</h5>
                    <p class="center-align pad-no mar-no"></p>
                    <div class="clearfix mar-all pad-all"></div>
                    <div id="formContainer" class="goRight">
                        <form class="loginForm">
                            <div class="input-fields-div autoMargin">
                                <div class="input-field">
                                    <input id="user_name" type="text" class="validate">
                                    <label for="user_name">邮箱</label>
                                </div>
                                <div class="input-field">
                                    <input id="pass_word" type="password" class="validate">
                                    <label for="pass_word">密码</label>
                                    <a href="javascript:void(0)" class="showPassword" onclick="showPassword()"><i class="material-icons md-18">visibility</i></a>
                                </div>
                                <p>没有账户？<a href="javascript:;" onclick="create()" class="createAccountNow">创建账户<br\><p class="mdui-invisible">x</p></a></p>
                            </div>

                            <div class="input-fields-div autoMargin right-align">
                                <div  onclick="closex();" class=" waves-effect waves-light btn">返回</div>
                                <div  onclick="login()" class=" waves-effect waves-light btn">登录</div>
                            </div>
                        </form>
                        <form class="signUpForm">
                            <div class="input-fields-div autoMargin">
                                <div class="row input-inline-field">
                                    <div class="input-field col s6">
                                        <input id="name" type="text" class="validate">
                                        <label for="name">姓名</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="school_number" type="text" class="validate">
                                        <label for="school_number">学号</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <input id="reg_user_name" type="text" class="validate">
                                    <label for="reg_user_name">邮箱</label>
                                </div>
                                <div class="row input-inline-field">
                                    <div id="reg_passwordDiv" class="input-field col s6">
                                        <input id="reg_pass_word" type="password" class="validate">
                                        <label for="reg_pass_word">密码</label>
                                        <a href="javascript:void(0)" class="showPassword" onclick="showPassword()"><i class="material-icons md-18">visibility</i></a>
                                    </div>
                                    <div id="rePasswordDiv" class="input-field col s6">
                                        <input id="verify" type="password" class="validate">
                                        <label for="verify">验证码</label>
                                    </div>
                                </div>
                                <p>我有账户&nbsp;<a href="javascript:;" onclick="rcreate()" class="backToLogin">现在登录</a></p>
                            </div>
                            <div class="input-fields-div autoMargin right-align">
                                <div  onclick="closex()" class=" waves-effect waves-light btn">返回</div>
                                <div  onclick="register()" class=" waves-effect waves-light btn">注册</div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix mar-all pad-all"></div>
                </div>
            </div>
        </div>
    </div>
    <main  id="main">
        <header class=" mdui-appbar mdui-appbar-fixed ">
            <div class="mdui-toolbar full mdui-toolbar-spacer mdui-color-theme">
                <a href="javascript:;" class="mdui-btn mdui-btn-icon" onclick="changedraw()"><i class="mdui-icon material-icons">menu</i></a>
                <span class="mdui-typo-title" id="intro"></span>
                <div class="mdui-toolbar-spacer"></div>
                <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-dialog="{target: '#dialog-docs-theme'}" mdui-tooltip="{content: '设置主题'}"><i class="mdui-icon material-icons">color_lens</i></span>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon " mdui-menu="{target: '#example-1'}" mdui-tooltip="{content: '更多'}"><i class="mdui-icon material-icons ">more_vert</i></a>
                <ul class="mdui-menu " id="example-1">
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple" onclick="load()">刷新</a>
                    </li>
                    <li class="mdui-menu-item" disabled>
                        <a href="javascript:;">联系我们</a>
                    </li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple more" style="display:none">修改密码</a>
                    </li>
                    <li class="mdui-divider"></li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class="mdui-ripple more" onclick="logout()" style="display:none">注销</a>
                    </li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" class=" mdui-ripple" onclick="openx()" style="display:none" id="log">登录/注册</a>
                    </li>
                </ul>
            </div>
        </header>
        <div class="mdui-dialog" id="login">
            <div class="mdui-tab mdui-tab-full-width" id="login-tab" mdui-tab>
                <a href="#login-tab1" class="mdui-ripple ">登录</a>
                <a href="#login-tab2" class="mdui-ripple">注册</a>
            </div>
            <div id="login-tab1" class="mdui-p-a-2">
                <div class="mdui-card">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">登录</div>
                    </div>
                    <div class="mdui-card-content">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">用户名</label>
                            <input class="mdui-textfield-input" id="log1" maxlength="20" type="account" style="ime-mode:disabled;" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required />
                            <div class="mdui-textfield-error">请输入用户名</div>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">密码</label>
                            <input class="mdui-textfield-input" id="log2" maxlength="20" type="password" style="ime-mode:disabled;" onkeyup="value=value.replace(/[\u4e00-\u9fa5]/ig,'')" required />
                            <div class="mdui-textfield-error">请输入密码</div>
                        </div>
                        <div class="mdui-divider"></div>
                    </div>
                    <div class="mdui-dialog-actions ">
                        <div class="mdui-btn mdui-ripple " style="top:20px" onclick="login()">登录</div><br /><br />
                    </div>
                </div>
            </div>
            <div id="login-tab2" class="mdui-p-a-2">
                <div class="mdui-card">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">注册</div>
                    </div>
                    <div class="mdui-card-content">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">用户名</label>
                            <input class="mdui-textfield-input" id="log3" maxlength="20" type="account" required />
                            <div class="mdui-textfield-error">请输入用户名</div>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">密码</label>
                            <input class="mdui-textfield-input" id="log4" maxlength="20" type="password" required />
                            <div class="mdui-textfield-error">请输入密码</div>
                        </div>
                        <div class="mdui-divider"></div>
                    </div>
                    <div class="mdui-dialog-actions">
                        <div class="mdui-btn mdui-ripple" style="top:20px;" onclick="register()">注册</div><br /><br />
                    </div>
                </div>
            </div>
        </div>
        <div class="mdui-drawer mdui-drawer-close mdui-shadow-12" id="draw">
            <div class="mdui-collapse mdui-list" mdui-collapse>
                <?php
                foreach ($json as $json) {
                    echo
                    '<div class="mdui-collapse-item">
                    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                        <div class="mdui-typo-subheading">' . $json['name'] . '</div>
                        <i class="mdui-collapse-item-arrow mdui-icon material-icons" style="position: absolute;
                    right: 10%;">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-collapse-item-body">
                        <a onclick="a' . "('example1-tab" . (2 * $json['rank'] - 1) . "',this)" . '" class="mdui-list-item mdui-ripple q">简介</a>
                        <a onclick="a' . "('example1-tab" . (2 * $json['rank']) . "',this)" . '" class="mdui-list-item mdui-ripple q">福利题</a>
                    </div>
                </div>';
                }
                ?>

            </div>
        </div>
        <div id="pages">
            <?php
            $json = file_get_contents("1.json");
            $json = json_decode($json, true);
            $n = 1;
            foreach ($json as $group) {
                echo "<div id='example1-tab" . (2 * $group['rank'] - 1) . "' class='mdui-p-a-2 tab'>" .
                    $group['intro'] .
                    "</div>";
                echo '<div id="example1-tab' . (2 * $group['rank']) . '"class="mdui-p-a-2 tab">
        <div class="mdui-card">
            <div class="mdui-collapse" mdui-collapse>';
                foreach ($group['body'] as $body) {
                    echo
                    '<div class="mdui-collapse-item">
                    <div class="mdui-collapse-item-header">
                        <div class="mdui-card-primary mdui-btn mdui-btn-block mdui-text-left mdui-ripple" style="height:auto">
                            <div class="mdui-card-primary-title">' . $body['title'] . '</div>
                            <div class="mdui-card-primary-subtitle">' . $body['sub-title'] . '</div>
                        </div>
                    </div>
                    <div class="mdui-collapse-item-body">
                        <div class="mdui-card-content">' . $body['content'] . '</div>
                        <div class="word"></div>
                        <div class="mdui-panel  mdui-panel-gapless" mdui-panel>
                            <div class="mdui-panel-item ans">
                                <div class="mdui-panel-item-header" onclick="refresh(' . $n . ')">答题</div>
                                <div class="mdui-panel-item-body">
                                    <div style="left:2%">选择语言：
                                        <select class="mdui-select" onchange="changelang(this.value,'.$n.')" id="s' . $n . '">
                                        <option value="text/x-c++src" class="o'.$n.'csrc" >C/C++</option>
                                        <option value="text/x-python" class="o'.$n.'python">Python</option>
                                        <option value="text/x-java" class="o'.$n.'java">Java</option>
                                        <option value="text/x-perl" class="o'.$n.'perl">Perl</option>
                                        <option value="text/x-go" class="o'.$n.'go">Go</option>
                                        </select>
                                    </div>
                                    <textarea class="form-control" id="code' . $n . '" name="code"></textarea>
                                    <div class="mdui-panel-item-actions">
                                        <div class="mdui-btn mdui-ripple" mdui-panel-item-close>cancel</div>
                                        <div class="mdui-btn mdui-ripple" onclick="save(' . $n . ')">save</div>
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
            }
            ?>

        </div>
        <div class="mdui-bottom-nav mdui-valign" id="bot" style="z-index:1000;">copyright</div>
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
    <script src="js/mdui.min.js"></script>
    <script src="js/my.js?v=7"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/cash.min.js"></script>
    <script type="text/javascript" src="js/routie.min.js"></script>
    <script type="text/javascript" src="js/loginScript.js"></script>
</body>

</html>
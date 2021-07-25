<?php
//session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$strs = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
$uver = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),5);

function sendMail($to,$title,$content){
    include_once("./PHPMailer-6.5.0/src/PHPMailer.php"); 
    include_once("./PHPMailer-6.5.0/src/SMTP.php");
    //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
    $mail = new PHPMailer();//实例化PHPMailer核心类
    $mail->SMTPDebug = 0;//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->isSMTP();//使用smtp鉴权方式发送邮件
    $mail->SMTPAuth=true;//smtp需要鉴权 这个必须是true
    $mail->Host = 'smtp.qq.com';//链接qq域名邮箱的服务器地址
    $mail->SMTPSecure = 'ssl';//设置使用ssl加密方式登录鉴权
    $mail->Port = 465;//设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
    $mail->CharSet = 'UTF-8';//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
    $mail->FromName = 'MSC 微软学生俱乐部';//设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->Username ='1464837318';//smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Password = 'ggwfbxirzkwtjcfc';//smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）【非常重要：在网页上登陆邮箱后在设置中去获取此授权码】
    $mail->From = '1464837318@qq.com';//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
    $mail->isHTML(true);//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    $mail->addAddress($to);//设置收件人邮箱地址
    $mail->Subject = $title;//添加该邮件的主题
    $mail->Body = $content;//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
    //简单的判断与提示信息
    if($mail->send()) {
        return true;
    }else{
        return false;
    }
}
date_default_timezone_set('PRC');
header("Content-Type:text/html;charset=utf-8");

$text1 = "本次找回密码的验证码是：<br>" . $uver . "<br>请在10分钟内使用";
$flag = sendMail($uemail,'MSC招新网站找回密码',$text1);

if($flag){
    $_SESSION['uveru'] = $uver;
    $_SESSION[$uemail] = date('U');
    $_SESSION[$codetm] = date('U');
    $_SESSION['mid'] = $row['id'];
    echo 0;
} else {
    echo -1;
    exit;
}

?>
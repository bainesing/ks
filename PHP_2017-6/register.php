<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * Date: 2017/6/19
 * Time: 9:06
 */
//声明页面编码格式
header("Content-type: text/html; charset=utf-8");


if (isset($_GET['mode'])) {
    if ($_GET['mode'] == "signin") {
        signin_func();
    } elseif ($_GET['mode'] == "signup") {
        signup_func();
    } elseif ($_GET['mode'] == "signout"){
        signout_func();
    }
    //用户尝试自己输入错误参数时返回提示
    else {
        echo "非法访问！";
    }
} //默认是signin登录
else {
    signin_func();
}

function signin_func()
{
    require "html/signin.html";
}

function signup_func()
{
    require "html/signup.html";
}
function signout_func(){
    session_start();
    unset($_SESSION['user_name']);
//    redirect(0,"success.php?mode=signout");
    echo "退出成功。如曾打开其他窗口，请关闭。<script>window.location.href='common/success.php?mode=signout';</script>";
}
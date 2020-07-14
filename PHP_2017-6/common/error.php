<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * http://localhost/ks/common/error.php
 * Date: 2017/6/20
 * Time: 19:49
 */
//声明页面编码格式
header("Content-type: text/html; charset=utf-8");
require "function.php";
//启动session
session_start();

//判断mode值
if ($_GET["mode"]=="signin"){
    //判断from值
    if ($_GET["from"]=="upswd"){
        $ERROR_PAGE_TITLE = "登录失败";
        $ERROR_PAGE_ART_TITLE = "密码错误，5秒钟后跳转回登陆页面。";
        $ERROR_PAGE_ART_TEXT = "登录失败，请检查您的用户名或密码是否正确。如果长时间没有响应请点击<a href='../register.php?mode=signin' title='登录'>这里</a>。";
        require "../html/error.html";
        redirect(5,"../register.php?mode=signin");
    }
    elseif ($_GET["from"]=="uname"){
        $ERROR_PAGE_TITLE = "登录失败";
        $ERROR_PAGE_ART_TITLE = "用户名不存在。5秒钟后跳转到注册页面。";
        $ERROR_PAGE_ART_TEXT = "我们的数据库中没有这个用户，请注册。如果长时间没有响应请点击<a href='../register.php?mode=signup' title='注册'>这里</a>。";
        require "../html/error.html";
        redirect(5,"../register.php?mode=signup");
    }
    elseif ($_GET['from']=="yzm"){
        $ERROR_PAGE_TITLE = "登录失败";
        $ERROR_PAGE_ART_TITLE = "验证码错误";
        $ERROR_PAGE_ART_TEXT = "请检查您刚才输入的验证码。如果长时间没有响应请点击<a href='../register.php?mode=signin' title='登录'>这里</a>。";
        require "../html/error.html";
        redirect(5,"../register.php?mode=signin");
    }
    //无效from参数
    else{
        stop_func();
    }
}
elseif ($_GET["mode"]=="signup"){
    $ERROR_PAGE_TITLE = "注册失败";
    $ERROR_PAGE_ART_TITLE = "因用户名或用户ID被占用而注册失败。5秒钟后跳转回登陆页面。";
    $ERROR_PAGE_ART_TEXT = "用户通行证创建失败。可能是你的用户名或用户ID被占用。如果长时间没有响应请点击<a href='../register.php?mode=signin' title='登录'>这里</a>。";
    require "../html/error.html";
    redirect(5,"../register.php?mode=signin");
}
//无效的mode参数
else{
    stop_func();
}

function stop_func(){
    $ERROR_PAGE_TITLE = "拒绝的指令";
    $ERROR_PAGE_ART_TITLE = "请不要尝试在地址栏输入无效参数。";
    $ERROR_PAGE_ART_TEXT = "无效的GET参数会让服务器摸不着头脑。5秒钟后回到首页，无响应请点击<a href='../index.php' title='首页'>这里</a>。";
    require "../html/error.html";
    redirect(5,"../index.php");
}
<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * Date: 2017/6/20
 * Time: 19:50
 */
//声明页面编码格式
header("Content-type: text/html; charset=utf-8");
require "function.php";
session_start();
if ($_GET["mode"]=="signin"){
    $SUCCESS_PAGE_TITLE = "登录成功";
    $SUCCESS_PAGE_ART_TITLE = "登录成功。"."欢迎回来，".$_SESSION['user_name']."。";
    $SUCCESS_PAGE_ART_TEXT = "您在 ".date("Y-m-d h:i:sa")." 登录成功。如果不想等待或长时间没有响应请点击<a href='../index.php' title='论坛首页'>这里</a>。";
    require "../html/success.html";
    redirect(5,"../index.php");
}
elseif ($_GET["mode"]=="signup"){
    $SUCCESS_PAGE_TITLE = "注册成功";
    $SUCCESS_PAGE_ART_TITLE = "通行证注册成功，系统将在5秒后跳转到登陆页面。";
    $SUCCESS_PAGE_ART_TEXT = "如果不想等待或者长时间没有响应请点击<a href='../register.php?mode=signin' title='登录'>这里</a>。";
    require "../html/success.html";
    redirect(5,"../register.php?mode=signin");
}elseif ($_GET["mode"]=="signout"){
    $SUCCESS_PAGE_TITLE = "成功退出系统";
    $SUCCESS_PAGE_ART_TITLE = "您已成功退出系统。";
    $SUCCESS_PAGE_ART_TEXT = "如果不想等待或者长时间没有响应请点击<a href='../register.php?mode=signin' title='登录'>这里</a>。";
    require "../html/success.html";
    redirect(5,"../");
}
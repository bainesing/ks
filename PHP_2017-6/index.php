<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * Date: 2017/6/19
 * Time: 9:04
 */
//声明页面编码格式
header("Content-type: text/html; charset=utf-8");
require "common/function.php";
require "common/index_pid_print.php";
//登陆成功后$_session['username']=$username
//判断是否已经登录：
session_start ();
if (isset($_SESSION['user_name'])) {
    if (isset($_GET['pid'])){
        //如果pid存在，判断pid是否合法
        if ($_GET['pid']<=5&&$_GET['pid']>=0){
            index_pid_print_func($_GET['pid']);
        }
        else{
            redirect(0,"common/error.php?mode=stop");
        }
    }
    else{
        //没有传递pid，默认是0
        redirect(0,"index.php?pid=0");
    }
} else {
    //没有登录
    redirect(0,"register.php");
}

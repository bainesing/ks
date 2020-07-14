<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * Date: 2017/6/20
 * Time: 9:27
 */
//声明页面编码格式
header("Content-type: text/html; charset=utf-8");
require 'function.php';
//开启session
session_start();

//==============================================//

$row = selectdata($_POST["user_name"]);
//检查验证码
if (checkyzm2($_POST['yzm'])){
    //检查用户名是否存在
    if(checkuname($row['UserName'])){
        //检查密码是否正确
        if(checkpswd($_POST["user_passwd"],$row['UserPsw'])){
            //密码正确
            //写入session
            $_SESSION['user_name'] = $_POST["user_name"];
            redirect(0,"success.php?mode=signin");
        }
        else{
            //密码错误
            redirect(0,"error.php?mode=signin&from=upswd");
        }
    }
    else{
        //用户名不存在
        redirect(0, "error.php?mode=signin&from=uname");
    }
}
else{
    //验证码错误
    redirect(0, "error.php?mode=signin&from=yzm");
}
//==============================================//

function selectdata($user_name){
    //获取数据库连接
    $conn = getConnect();
    //定义查询语句
    $sql = "select * from userinfo where UserName = '$user_name'";
    //提交查询，并接受返回值
    $link = mysqli_query($conn, $sql);
    //将得到的结果集取出并作为关联数组。关联数组相当于键值对。
    $row = mysqli_fetch_assoc($link);
    return $row;
}

function checkuname($user_name){
    if (isset($user_name)){
        return true;
    }
    else{
        return false;
    }
}

function checkpswd($user_passwd,$row_UserPsw){
    if (md5($user_passwd) != $row_UserPsw) {
        //密码错误
        return false;
    } elseif (md5($user_passwd) == $row_UserPsw) {
        //密码正确
        return true;
    }
}


function checkyzm2($yzm){
    //判断是否有表单提交
    if(empty($_POST)){
        die('没有表单提交，程序退出');
    }
    //获取用户输入的验证码字符串
    $code = $yzm;
    //判断SESSION中是否存在验证码
    if(empty($_SESSION['captcha_code'])){
        die('验证码已过期，请重新登录。');
    }
    //将字符串都转成小写然后再进行比较
    if (strtolower($code) == strtolower($_SESSION['captcha_code'])){
        unset($_SESSION['captcha_code']); //清除SESSION数据
        return true;
    } else{
        unset($_SESSION['captcha_code']); //清除SESSION数据
        return false;
    }

}

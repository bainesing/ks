<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * Date: 2017/6/20
 * Time: 9:31
 */
//声明页面编码格式
header("Content-type: text/html; charset=utf-8");
require "function.php";

//用户创建函数
if (isset($_POST["user_name"])) {
    $rs = addUser($_POST["user_id"], $_POST["user_name"], $_POST["user_passwd"]);
    if ($rs) {
        //注册成功
        redirect(0,"success.php?mode=signup");
    } else {
        //用户名被占用，注册失败
        redirect(0,"error.php?mode=signup");
    }
}

function addUser($user_id, $user_name, $user_passwd)
{
    $md5_passwd = md5($user_passwd);
    //调用正则表达式进行判断是否含有奇怪的字符串
    $id = replace_html($user_id);
    $name = replace_html($user_name);
    //定义sql语句
    $insert_sql_str = "INSERT INTO `ks`.`userinfo` (`UserId`, `UserName`, `UserPsw`, `Userregtime`) VALUES ('$id', '$name', '$md5_passwd', NOW());";
    $conn = getConnect();
    //提交执行
    $rs = mysqli_query($conn, $insert_sql_str);
    //返回执行状态结果
    return $rs;
}

function replace_html($document){
    // $document 应包含一个 HTML 文档。
    // 本例将去掉 HTML 标记，# 代码
    // 和空白字符。还会将一些通用的
    // HTML 实体转换成相应的文本。
    $search = array ("'<script[^>]*?>.*?</script>'si", // 去掉 #
        "'<[\/\!]*?[^<>]*?>'si", // 去掉 HTML 标记
        "'([\r\n])[\s]+'", // 去掉空白字符
        "'&(quot|#34);'i", // 替换 HTML 实体
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i",
        "'&(iexcl|#161);'i",
        "'&(cent|#162);'i",
        "'&(pound|#163);'i",
        "'&(copy|#169);'i",
        "'&#(\d+);'e"); // 作为 PHP 代码运行
    $replace = array ("",
        "",
        "\\1",
        "\"",
        "&",
        "<",
        ">",
        " ",
        chr(161),
        chr(162),
        chr(163),
        chr(169),
        "chr(\\1)");
    $text = preg_replace ($search, $replace, $document);
    return $text;
}
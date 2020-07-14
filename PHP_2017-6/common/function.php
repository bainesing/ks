<?php
/**
 * 这里定义了常用的公共函数。
 */

//重定向函数。调用该函数可以实现在当前窗口进行页面重定向。
function redirect($time, $url)
{
    //使用header实现
    header("Refresh:$time;url=$url");
    //用完及时退出
    exit;
}


//数据库连接函数,'ks'
function getConnect()
{
    $connect = mysqli_connect('localhost', 'root', '******') or exit("数据库在连接时出现问题，可能是密码不正确。");
    mysqli_set_charset($connect,'utf8');
    $db = mysqli_select_db($connect, 'ks') or exit("数据库在连接时出现问题，可能是设定的数据库不存在。");
    return $connect;
}

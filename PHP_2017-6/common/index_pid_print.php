<?php
/**
 * Created by PhpStorm.
 * User: Abstergo
 * Date: 2017/6/20
 * Time: 11:38
 */

function index_pid_print_func($pid){
    require "html/index_mb.html";
}

function pageTitle($pid){
    if ($pid == 0){
        return "论坛主页/班级简介";
    }
    elseif ($pid == 1){
        return "查看学生信息";
    }
    elseif ($pid == 2){
        return "新增学生信息";
    }
    elseif ($pid == 3){
        return "查看留言板";
    }
    elseif ($pid == 4){
        return "发布留言";
    }
    elseif ($pid == 5){
        return "SCP基金会数据库（Beta）";
    }
}
function exitForum(){
    $msg = $_SESSION["user_name"];
    return $msg;
}

function pageContect($pid){
    if ($pid == 0){
        require "html/scp.html";
    }
    elseif ($pid == 1){
        require "print_pid_1.php";
    }
    elseif ($pid == 2){
        require "print_pid_2.php";
    }
    elseif ($pid == 3){
        require "print_pid_3.php";
    }
    elseif ($pid == 4){
        require "print_pid_4.php";
    }
    elseif ($pid == 5){
        require "print_pid_5.php";
    }
}
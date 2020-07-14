<?php
/**
 * 新增留言
 * User: Abstergo
 * Date: 2017/6/23
 * Time: 15:17
 */
require "html/new_words.html";
if (isset($_POST["title"])){
    $path = "db/";                                   		//留言目录
    $filename = "s" . date("YmdHis") . ".dat";       	//获得以时间命名的文件名
    $fp = fopen($path . $filename, "w");      //创建文件
    fwrite($fp, $_POST["title"] . "\n");             	//写入标题
    fwrite($fp, $_POST["author"] . "\n");            	//写入作者
    fwrite($fp, $_POST["content"] . "\n");           	//写入内容
    fclose($fp);
    echo "留言发表成功！";
}


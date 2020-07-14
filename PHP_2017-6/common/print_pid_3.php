<?php
/**
 * 查看留言
 * User: Abstergo
 * Date: 2017/6/23
 * Time: 15:14
 */

//定义留言保存路径
$path = "db/";
//判断目录是否存在
if (!file_exists($path)) {
    //不存在，创建目录
    mkdir($path,0777);
}
//打开目录
$dr = opendir($path);

//循环读取目录中的文件
while ($filen = readdir($dr)) {
    if ($filen != "." and $filen != "..") { 	//排除当前目录和父目录
        $fs = fopen($path . $filen, "r");    	//打开文件
        echo "<B>标题：</B>" . fgets($fs) . "<BR>";//读出标题
        echo "<B>作者：</B>" . fgets($fs) . "<BR>";//读出作者
        echo "<B>内容：</B><PRE>" . fread($fs, filesize($path . $filen)) . "</PRE>";//读出全部内容
        echo "<HR>";    //显示分隔线
        fclose($fs);    //关闭文件
    }
}

//关闭目录
closedir($dr);

<?php
/**
 * 新增学生信息
 * User: Abstergo
 * Date: 2017/6/22
 * Time: 23:14
 */
require "html/add_student.html";
//    学号:StdXH
//    姓名:StdXM
//    性别:StdXB
//    出生年月:StdCSRQ
//    班级:StdBJ
//    专业:StdZY
//    籍贯:StdJG
//    电话:StdTEL
if (isset($_POST["StdXH"])){
    $rs = add_student($_POST["StdXH"],$_POST["StdXM"],$_POST["StdXB"],$_POST["StdCSRQ"],$_POST["StdBJ"],$_POST["StdZY"],$_POST["StdJG"],$_POST["StdTEL"]);

    if($rs){
        echo "OK.";
    }else{
        echo "NONE。";
    }
}




function add_student($StdXH,$StdXM,$StdXB,$StdCSRQ,$StdBJ,$StdZY,$StdJG,$StdTEL){
    $select_all_student_sql = "INSERT INTO `ks`.`studentinfo` (`StdXH`, `StdXM`, `StdXB`, `StdCSRQ`, `StdBJ`, `StdZY`, `StdJG`, `StdTEL`) VALUES ('$StdXH', '$StdXM', '$StdXB', '$StdCSRQ', '$StdBJ', '$StdZY', '$StdJG', '$StdTEL');";
    $conn = getConnect();
    $rs = mysqli_query($conn, $select_all_student_sql);
    return $rs;
}
<?php
/**
 * 显示所有学生信息
 * User: Abstergo
 * Date: 2017/6/22
 * Time: 21:45
 */


//输出搜索框
require "html/search_box.html";

echo "<table width='100%' border='1' style='border-color: #1f1d1d;'><tr><th>学号</th><th>姓名</th><th>性别</th><th>出生年月</th><th>班级</th><th>专业</th><th>籍贯</th><th>电话</th></tr>";
$student_info = select_all_student();
while ($row = mysqli_fetch_assoc($student_info)){
    echo "<tr><td>";
    echo $row["StdXH"];
    echo "</td><td>";
    echo $row["StdXM"];
    echo "</td><td>";
    echo $row["StdXB"];
    echo "</td><td>";
    echo $row["StdCSRQ"];
    echo "</td><td>";
    echo $row["StdBJ"];
    echo "</td><td>";
    echo $row["StdZY"];
    echo "</td><td>";
    echo $row["StdJG"];
    echo "</td><td>";
    echo $row["StdTEL"];
    echo "</td></tr>";
}
echo "</table>";

function select_all_student(){
    if (isset($_POST["stuid"])){
        $id = $_POST["stuid"];
        $select_all_student_sql = "select * from studentinfo where StdXH = '$id'";
    }else{
        $select_all_student_sql = "select * from studentinfo";
    }

    $conn = getConnect();
    $rs = mysqli_query($conn, $select_all_student_sql);
    return $rs;
}
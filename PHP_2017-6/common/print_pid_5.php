<?php
/**
 * 输出所有SCP信息
 * User: Abstergo
 * Date: 2017/6/22
 * Time: 21:45
 */

$scp_info = select_all_scp();
$row_num = mysqli_num_rows($scp_info);
echo "<h3>目前系统中共收录了 ".$row_num." 条SCP记录。</h3></center>";
echo "<table width='100%' border='1' style='border-color: #1f1d1d;'><tr><th style='width: 80px;'>SCP ID</th><th style='width: 120px;'>SCP 编号</th><th style='width: 380px;'>SCP 描述</th><th style='width: 180px;'>收容状况</th></tr>";
while ($row = mysqli_fetch_assoc($scp_info)){
    echo "<tr><td>";
    echo $row["id"];
    echo "</td><td>";
    echo $row["num"];
    echo "</td><td>";
    echo "<a href='http://scp-wiki-cn.wikidot.com/";
    echo $row["num"];
    echo "' target='_blank'>";
    echo $row["name"];
    echo "</a></td>";
    if ($row["favorite"]==0){
        echo "<td style='color: green;'>&nbsp●&nbsp收容正常</td>";
    }elseif ($row["favorite"]==1){
        echo "<td style='color: red;'>&nbsp●&nbsp收容失效</td>";
    }

}
echo "</tr></table>";

function select_all_scp(){
    $select_all_scp_sql = "select * from scpmenu";
    $conn = getConnect();
    $rs = mysqli_query($conn, $select_all_scp_sql);
    return $rs;
}
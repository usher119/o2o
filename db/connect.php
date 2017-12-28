<?php
$host = 'localhost';
$db_user = 'usher';
$db_pass = '1';
$db_name = 'mytest';
 
$mysqli=new mysqli($host,$db_user,$db_pass);
 
if($mysqli->connect_error)
{
    die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
}
else
{
    //echo '数据库连接成功'."<br>"."<br>";
    //连接数据库
    $mysqli->select_db('workstation');     
    //设置字符集
    $mysqli->query("SET NAMES utf8");
}       
 
?>
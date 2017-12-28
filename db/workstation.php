<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>机房工作站使用统计</title>
<style type="text/css" media="all">
@import url("css/style.css");
 
</style>
<script type="text/javascript" src="js/jquery-1.2.2.js"></script> 
<script type="text/javascript" src="js/jquery.jeditable.js"></script> 
  
<script type="text/javascript">
$(function(){
    $('.edit').editable('save.php',
     {        
         width     :120,
         height    :18,         
         cancel    : '取消',
         submit    : '确定',
         indicator : '<img src="css/loader.gif">',
         tooltip   : '单击可以编辑...',
     });
      
      
})
 
</script>
</head>
 
 
 
<body>
 
<p><strong>机房工作站使用统计 </strong></p>
<p>&nbsp;</p>
<p>
  更改记录后，请按F5进行更新！
</p>
<p>目前机房工作站总核数为100核，当前已使用*核，还有*核可用。</p>
 
<?php         
        $mysqli=new mysqli('127.0.0.1','root','ngvjai','workstation');
        if($mysqli->connect_error)
        {
            die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
        }
        /*else
        {
            echo '数据库连接成功'."<br>"."<br>";
        }*/
        $mysqli->query("SET NAMES utf8");       
         
         
        //操作数据库   
        $sql="select * from threadstatistics";
        $res=$mysqli->query($sql);
         
        //使用表格格式化数据
        echo "<table width=800 border=1>"; 
        echo "<tr align=center><td>编号</td><td>机器IP</td><td>总核数</td><td>姓名</td>><td>占用核数</td>><td>何时占用</td></tr>";
         
        while($row=$res->fetch_row())  //遍历SQL语句执行结果把值赋给数组
        {            
            ?>           
            <tr>
            <td  align="center" > <?php echo $row[0];?></td>
            <td  align="center" class="edit" id="IP"><?php echo $row[1];?></td> 
            <td  align="center" class="edit" id="TotalThreads"><?php echo $row[2];?></td> 
            <td  align="center" class="edit" id="name"><?php echo $row[3];?></td> 
            <td  align="center" class="edit" id="threadsUsed"><?php echo $row[4];?></td> 
            <td  align="center" id="beginTime"><?php echo $row[5];?></td>      
            </tr>               
           <?php 
        }
        echo "</table><br/>";   
         
        //关闭资源
       $res->free();//释放内存
       $mysqli->close();//关闭连接             
    ?>                  
</body>
</html>           
             
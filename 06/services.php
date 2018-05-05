<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/4/17
 * Time: 下午2:41
 */
require ("page.php");
class ServicesPage extends Page
{
    private $row2buttons = array(
        "Re-engineering" => "reengineering.php",
        "Standards Compliance" => "standards.php",
        "Buzzword Compliance" => "buzzword.php",
        "Mission Statements" => "mission.php"
    );

    public function Display()
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeyword();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        $this->DisplayMenu($this->row2buttons);
        echo $this->content;
        $this->DisplayFooter();
        echo "</body>\n</html>\n";
    }

}
 $services=new ServicesPage();
 $services->content="<p>患难见真亲啊！</p>";
$services->Display();
<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/4/17
 * Time: 下午3:28
 */
require ("page.php");

class Content extends Page
{
    function Display()
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeyword();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo $this->content;
        $this->DisplayFooter();
        echo "</body>\n</html>\n";
    }
}

$c= new Content();
$c->content="<p>还有38年退休，好好规划吧</p>";
$c->Display();
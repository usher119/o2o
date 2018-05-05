<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/4/17
 * Time: 下午1:38
 */
class Page
{
    //声明Page类属性
    public $content;
    public $title="usher 的公司";
    public $keywords="usher 的公司你最好的商业伙伴";
    public $buttons=array("Home"=>"home.php",
        "Content"=>"content.php",
        "Services"=>"services.php",
    "Site Map"=>"map.php",

    );

    //类操作器
    public function __set($name,$value)
    {
        return $this->$name=$value;
     }
     //
    public function Display()
    {
        echo "<html>\n<head>\n";
    $this -> DisplayTitle();
    $this -> DisplayKeyword();
    $this -> DisplayStyles();
    echo "</head>\n<body>\n";
    $this -> DisplayHeader();
    $this -> DisplayMenu($this->buttons);
    echo $this->content;
    $this -> DisplayFooter();
    echo "</body>\n</html>\n";
    }

    public function  DisplayTitle()
    {
        echo "<title>".$this->title."</title>";
    }

    public function DisplayKeyword()
    {
        echo "<meta name='keywords' content='".$this->keywords."'/>";
    }
    public function DisplayStyles()
    {
        ?>
     <link href="styles.css" type="text/css" rel="stylesheet">
     <?php
    }

    public function DisplayHeader()
    {
        ?>
        <!--页面头部 -->
        <header>
            <img src="logo.gif" alt="logo" height="70" width="70">
            <h1>usher</h1>
        </header>
       <?php
    }
    public function DisplayMenu($buttons)
    {
         echo "<!-- menu -->
    <nav>";

    while (list($name, $url) = each($buttons)) {
      $this->DisplayButton($name, $url,
               !$this->IsURLCurrentPage($url));
    }
    echo "</nav>\n";
    }


    public function IsURLCurrentPage($url)
    {
        if(strpos($_SERVER['PHP_SELF'],$url)===false)
        {
            return false;
        }
        else{
            return true;
        }

    }
    public function DisplayButton($name,$url,$active=true)
    {
        if ($active) { ?>
            <div class="menuitem">
                <a href="<?=$url?>">
                    <img src="s-logo.gif" alt="" height="20" width="20" />
                    <span class="menutext"><?=$name?></span>
                </a>
            </div>
            <?php
        } else { ?>
            <div class="menuitem">
                <img src="side-logo.gif">
                <span class="menutext"><?=$name?></span>
            </div>
            <?php
        }
    }
    public function DisplayFooter()
    {
        ?>
        <!--底部 -->
        <footer>
        <p>usher版权所有<br/>
        欢迎查看我们
        <a href="legal.php">关于我们的信息页面 </a>
        .</p>
            </footer>
                <?php
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/4/17
 * Time: 下午1:31
 */
require ("page.php");
$homepage=new page();
$homepage->content="<!-- page content-->
                     <section>
                     <h2>欢迎来到公司网站！</h2>
                     <p>请给一点时间让我们认识彼此</p>
                     <p>我们很期待不久能为你服务！<p>
                     </section>";

$homepage->Display();
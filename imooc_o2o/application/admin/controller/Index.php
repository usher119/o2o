<?php
//namespace app\admin\controller;
//use think\Controller;
//class Index extends  Controller
//{
//    public function index()
//    {
//        return $this->fetch();
//    }
//
//    public function welcome()
//    {
//        return  \Map::getLngLat('武汉盘龙城地铁站');
//        echo "欢迎！";
//    }
//    public function map()
//    {
//       return \Map::staticimage('武汉盘龙城地铁站');
//    }
//    public function email() {
//        $toemail='1016062882@qq.com';
//        $name='usher';
//        $subject='QQ邮件发送测试';
//        $content='恭喜你，邮件测试成功。好好干';
//        dump(send_mail($toemail,$name,$subject,$content));
//    }
//}
$myfile=fopen('/Users/usher/Desktop/1.txt','rb');

while (!foef($myfile)) {
    $or=fgets($file);
    echo htmlspecialchars($or);
}

fclose(handle);

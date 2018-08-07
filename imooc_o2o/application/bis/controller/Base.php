<?php
//namespace app\bis\controller;
//use think\Controller;
//class Base extends  Controller
//{
//    public $account;
//
//    public function _initialize()
//    {
//        // 判定用户是否登录
//        $isLogin = $this->isLogin();
//        if (!$isLogin) {
//            return $this->redirect(url('login/index'));
//        }
//    }
//
//    //判定是否登录
//    public function isLogin()
//    {
//        // 获取sesssion
//        $user = $this->getLoginUser();
//        if ($user && $user->id) {
//            return true;
//        }
//        return false;
//
//    }
//
//    public function getLoginUser()
//    {
//        if (!$this->account) {
//            $this->account = session('bisAccount', '', 'bis');
//        }
//        return $this->account;
//    }
//}
//}
namespace app\bis\controller;
use think\Controller;

class Base extends Controller
{
    public $account;

    public function _initialize()
    {

        if(!$this->isLogin()) {
            return $this->redirect(url('login/index'));
        }
    }


    public function isLogin()
    {
        //获取session值
        $sa=$this->getLoginUser();
        if($sa && $sa->id)
        {
          return true;
        }
        else
        {
            return false;
        }

    }
   public  function getLoginUser()
    {
        $ss=$this->account;
        if(!$ss){
            $ss=$this->account =session('bisAccount', '', 'bis');
        }
        return $this->account;
    }
}
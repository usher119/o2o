<?php
namespace app\bis\controller;
use think\Controller;
class Login extends  Controller
{
	public function login()
    {
         //$ss=password_hash("1", PASSWORD_DEFAULT);
        if(request()->isPost()) {
            // 登录的逻辑
            //获取相关的数据
            $data = input('post.');
            // 通过用户名 获取 用户相关信息
            // 严格的判定

            $ret = model('BisAccount')->get(['username'=>$data['username']]);

            if(!$ret || $ret->status !=1 ) {
                $this->error('改用户不存在，获取用户未被审核通过');
            }
            $passwd=$data['password'];
            dump($ret->password);

            if(!password_verify($passwd, $ret->password)) {
                echo "密码错了！";
            }


            model('BisAccount')->updateById(['last_login_time'=>time()], $ret->id);

            session('bisAccount', $ret, 'bis');

            return $this->success('登录成功', url('index/index'));


        }else {
            // 获取session
            $account = session('bisAccount', '', 'bis');
            dump($account);
            if($account && $account->id) {
                return $this->redirect(url('index/index'));
            }

            return $this->fetch();
        }
    }
    public function index()
    {
        $account = session('bisAccount', '', 'bis');

        if($account && $account->id) {
            return $this->redirect(url('index/index'));
        }
        return $this->fetch();
    }

    public function logout() {
        // 清除session
        session(null, 'bis');
        // 跳出
        $this->redirect('login/index');
    }
}
//namespace app\bis\controller;
//use think\Controller;
//use app\bis\validate;
//use think\Session;
//
//class Login extends Controller
//{
//    public function Login()
//    {
//        if(request()->isPost()){
//        $data=input('post.');
//        $validate=validate('Bis');
//            if(!$validate->check($data))
//            {
//                $this->error($validate->getError());
//            }
//        $res=model('bis_account')->get(['username'=>$data['username']]);
////            print_r($res);
////           die;
//        //$password=$res->password;
//        //验证登录
//            model('bis_account')->updateById(['last_login_time'=>time()], $res->id);
//
//           // $ss=session('bisAccount', $res, 'bis');
//            $ss=Session::set('bisAccount','$res->username','bis');
//            dump(Session::has('bisAccount','bis'));
//            dump($ss);
//
//            return $this->success('登录成功', url('index/index'));
//
//        }
//        else{
//           // $abc=session('bisAccount', '', 'bis');
////            if($abc)
////            {
////                return $this->success('登录成功', url('index/index'));
////            }
////            else{
////                return $this->error('成功失败', url('login/index'));
////            }
////          //  return $this->fetch();
////            echo "x";
//        }
//    }
//    public function index()
//    {
//        return $this->fetch();
//    }
//    public function Logout()
//    {
//        session(null, 'bis');
//       return $this->redirect('login/index');
//    }
//}

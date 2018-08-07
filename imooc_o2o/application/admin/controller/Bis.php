<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/5/15
 * Time: 下午3:37
 */

namespace app\admin\controller;
use think\Controller;
use app\common\model;

class Bis extends Controller
{

    public function index()
    {
        $Bis=model('Bis')->getBisByStatus($status=1);
        $this->assign('Bis',$Bis);
        return $this->fetch();
    }
    public function apply()
    {
        $bis=model('Bis')->getBisByStatus($status=0);
        $this->assign('bis',$bis);
        return $this->fetch();
    }
    public function  detail()
    {
        $id=input('get.id');
        $citys = model('City')->getNormalCitysByParentId();
        $categorys = model('Category')->getNormalCategoryByParentId();
        $bisData=model('Bis')->get($id);
        $LocationData=model('BisLocation')->get(['bis_id'=>$id,'is_main'=>1]);

         $accountData=model('BisAccount')->get(['bis_id'=>$id,'is_main'=>1]);
        $this->assign(['citys'=>$citys,
            'categorys'=>$categorys,
           'bisData'=>$bisData,
            'LocationData'=>$LocationData,
            'accountData'=>$accountData,
            ]);
//
       // return $this->fetch('index');
        return $this->fetch();
    }
    public  function status()
    {
        $data=input('get.');
        $res=model('Bis')->save(['status'=>$data['status']],['id'=>$data['id']]);
        if($res)
        {

            $this->success("更新成功");
        }
        else
        {
            $this->error("更新失败");
        }
    }
    public function dellist()
    {
        $bis=model('Bis')->getBisByStatus($status=-1);
        $this->assign('bis',$bis);
        return $this->fetch();
    }
}
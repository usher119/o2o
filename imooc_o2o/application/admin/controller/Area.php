<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/5/7
 * Time: 上午10:10
 */
namespace app\admin\controller;
use think\Controller;
use app\common\model;
class Area extends Controller
{
    //首页index渲染
    public  function index()
    {
        $parentid=input('get.parent_id',0,'intval');

        $category=model('City')->getNormalCitysByParentId($parentid);


        $this->assign('Category',$category);
        return $this->fetch();
    }
    public function  add()
    {
        $area=model('Category')->FirstCategory( );
        // dump($category);
        $this->assign('Area',$area);
        // return $this->fetch('',['category'=>'$category']);
        return $this->fetch();
    }
    //保存数据
    public function save()
    {
        $data=input('post.');

        $res=model('City')->save($data);
        dump($res);
        die;
        if($res)
        {
            $this->success("更新成功");
        }
        else
        {
            $this->error("更新失败");
        }
        dump($res);
        die;
   }
    public  function pindex()
    {
        $parentid=input('get.parent_id',0,'intval');

        $category=model('Area')->FirstCategory($parentid);
        dump($category);

        $this->assign('Category',$category);
        return $this->fetch(index);
    }
    //修改状态
    public  function status()
    {
        // dump(input('get.'));
        $data=input('get.');
        // dump($data['status']);
        $res=model('Area')->save(['status'=>$data['status']],['id'=>$data['id']]);
        // echo $res->getLastSql();
        //return $this->fetch('index');
        if($res)
        {

            $this->success("更新成功");
        }
        else
        {
            $this->error("更新失败");
        }
    }
    public function listorder($id,$listorder)
    {
//        dump(['listorder'=>$listorder],['id'=>$id]);
//        die;
        $res= model('City')->save(['listorder'=>$listorder],['id'=>$id]);
        if($res)
        {
            $this->result($_SERVER['HTTP_REFERER'],1,'success');
        }
        else{
            $this->result($_SERVER['HTTP_REFERER'],1,'失败');
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/5/5
 * Time: 下午10:20
 */
namespace app\admin\controller;
use think\Controller;
use app\common\model;

class Category extends Controller
{
    public function  index()
    {
        $parentid=input('get.parent_id',0,'intval');

        $category=model('Category')->FirstCategory($parentid);
        $this->assign('Category',$category);
        return $this->fetch();
    }
    public function  add()
    {
       $category=model('Category')->getNormalFirstCategory(0);
      // dump($category);
        $this->assign('Category',$category);
       // return $this->fetch('',['category'=>'$category']);
        return $this->fetch();
    }
    public function  save()
    {
       $data=input('post.');
       if (!request()->isPost())
       {
           $this->error('请求错误');
       }

       //dump($data);
        //dump(request()->post());
       // return $this->fetch();
        $validate=validate('Category');
        if(!$validate->check($data))
        {
            $this->error($validate->getError());
        }
        if(!empty($data['id']))
        {
            return $this->update($data);
        }
        $data['status']='0';

        $res=model('Category')->save($data);
        if($res)
        {
            $this->success();
        }




    }
    public function edit()
    {
      $a=input('get.id');
      //echo $a;
        $category=model('Category')->getNormalFirstCategory( );
        $categorys=model('Category')->get($a);

        $this->assign(['Category'=>$category,'categorys'=>$categorys]);
        return $this->fetch();
    }
    public function update($data)
    {
        $res= model('Category')->save($data,['id'=>intval($data['id'])]);
        if($res)
        {
            $this->success('更新成功');
        }
        else{
            $this->error('更新失败');
        }
        return;
    }
    //排序
    public function listorder($id,$listorder)
    {
//        dump(['listorder'=>$listorder],['id'=>$id]);
//        die;
       $res= model('Category')->save(['listorder'=>$listorder],['id'=>$id]);
        if($res)
        {
            $this->result($_SERVER['HTTP_REFERER'],1,'success');
        }
        else{
            $this->result($_SERVER['HTTP_REFERER'],1,'失败');
        }
    }
    //修改状态
    public  function status()
    {
        $data=input('get.');

        $res=model('Category')->save(['status'=>$data['status']],['id'=>$data['id']]);

        if($res)
        {

            $this->success("更新成功");
        }
        else
        {
            $this->error("更新失败");
        }
    }
    public function getCategoryByParentId()
    {

    }

}
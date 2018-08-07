<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/5/7
 * Time: 上午10:35
 */
namespace app\common\model;
use think\Model;

class Area extends Model
{

    public function FirstCategory($parentid=0)
    {
        $data=[
            'parent_id'=>$parentid,
            'status'=>['neq',-1]
        ];
        $order=[
            'id'=>'desc',
        ];
        $res=$this->where($data)->order($order)->Paginate(10);
        echo $this->getLastSql();
        return $res;
    }
    public function getNormalFirstCategory(){
        $data=[
            'status'=>1,
            'parent_id'=> 0,
        ];
        $order=[
            'id'=>'desc',
        ];
        return   $this->where($data)->order($order)->select();
    }




}
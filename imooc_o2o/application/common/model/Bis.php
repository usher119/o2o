<?php
namespace app\common\model;

use think\Model;

class Bis extends BaseModel
{
    /**
     * 通过状态获取商家数据
     * @param $status
     */

    public function getBisByStatus($status=0) {
        $order = [
            'id' => 'desc',
        ];

        $data = [
            'status' => $status,
        ];
        $result = $this->where($data)
            ->order($order)
            ->paginate();
        return $result;
    }
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
        //echo $this->getLastSql();
        return $res;
    }
    public function getNormalCitysByParentId($parent_id=0){
        $data=[
            'status'=>1,
            'parent_id'=> $parent_id,
        ];
        $order=[
            'id'=>'desc',
        ];
        return   $this->where($data)->order($order)->select();
    }


}
<?php
namespace app\common\model;
use think\Model;

class BisLocation extends BaseModel
{

    public function getNormalLocationByBisId($bisId) {
        $data = [
            'bis_id' => $bisId,
            'status' => 0,
        ];

        $result = $this->where($data)
            ->order('id', 'desc')
            ->select();
        return $result;
    }

    public function getNormalLocationsInId($ids) {
        $data = [
            'id' => ['in', $ids],
            'status' => 1,
        ];
        return $this->where($data)
            ->select();
    }
    public function getNormalLocationsByParentId($parent_id=0){
        $data=[
            'status'=>"0",
           // 'parent_id'=> $parent_id,
        ];
        $order=[
            'id'=>'desc',
        ];

        //$res=$this->where($data)->order($order)->Paginate(10);
       // $res=$this->where($data)->order($order)->select()->Paginate(10);
        //dump($res);
//         dump($this->fetchSql());
        $res=$this->where($data)->order($order)->Paginate(10);
        return $res;
    }


}
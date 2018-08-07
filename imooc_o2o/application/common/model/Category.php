<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected  $autoWriteTimestamp = true;
    public function add($data) {
        $data['status'] = 1;
        //$data['create_time'] = time();
        $result =  $this->save($data);
        //echo $this->getLastSql();exit;
        return $result;
    }
 public function getNormalFirstCategory($status=1){
        $data=[
            'status'=>$status,
            'parent_id'=> 0,
        ];
     //dump($data);die;
        $order=[
            'id'=>'desc',
            ];
        $res=$this->where($data)->order($order)->select();
//           dump($res);
     return   $res;
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
    public function getNormalCitysParentId($parent_id=0){
        $data=[
            'status'=>1,
            'parent_id'=> $parent_id,
        ];
        $order=[
            'id'=>'desc',
        ];
        $res=$this->where($data)->order($order)->select();
        return   $res;
    }

    public function getNormalCategoryByParentId($ids){
        $data=[
            'status'=>1,
            'parent_id'=> ['in',implode(',',$ids)],
        ];
        $order=[
            'id'=>'desc',
            'listorder'=>'desc',
        ];

// 查询单个数据
//        dump($data);
//        die;
        $res=$this->where($data)->select();
        //dump($res);
//         dump($this->fetchSql());

       return $res;
    }
    public function getNormalRecommendCategoryByParentId($id=0, $limit=5) {
        $data = [
            'parent_id' => $id,
            'status' => 1,
        ];

        $order = [
            'listorder' => 'desc',
            'id' => 'desc',
        ];

        $result = $this->where($data)
            ->order($order);
        if($limit) {
            $result = $result->limit($limit);
        }
        $result=$result->select();

        return $result;

    }
    public function getNormalCategoryIdParentId($ids) {
        $data = [
            'parent_id' => ['in', implode(',', $ids)],
            'status' => 1,
        ];

        $order = [
            'listorder' => 'desc',
            'id' => 'desc',
        ];

        $result = $this->where($data)
            ->order($order)
            ->select();

        return $result;
    }
}
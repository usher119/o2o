<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/6/1
 * Time: 下午1:37
 */

namespace app\admin\controller;
use think\Controller;
use think\Request;

class Featured extends Controller
{
    public function index()
    {
        //获取数据
//        $types=config('featured.featured_type');
//        $type=input('');
//            $type = input('get.type', 0, 'intval');
//            if(!$type){
//           dump($type);
//            }
//            $featured = model('Featured')->getFeaturedsByType($type);
//            // dump($type['type_id']);
//            $this->assign([
//                'types' => $types,
//                'featured' => $featured,
//                'type_id' => empty($type['type_id']) ? '' : $type['type_id'],
//            ]);
//
//        return $this->fetch();
        $types=config('featured.featured_type');
        if(Request()->isPost()){

            $typet=input('post.');
            $type=$typet['type_id'];
           // dump($type['type_id']);
            $featured = model('Featured')->getFeaturedsByType($type);
                        $this->assign([
                'types' => $types,
                'featured' => $featured,
                'type_id' => empty($typet['type_id']) ? '' : $typet['type_id'],
            ]);
            return $this->fetch();
        }
        else
            {
                $type=0;
                $featured = model('Featured')->getNormalFeatured();
                $this->assign([
                    'types' => $types,
                    'featured' => $featured,
                    'type_id' => empty($type['type_id']) ? '' : $type['type_id'],
                ]);
                return $this->fetch();
        }
    }
  public  function add()
  {
       if(request()->isPost()){
           $data=input('post.');
           //验证数据
           $id=model('Featured')->add($data);
           if($id){
               $this->success('添加成功');
           }else{
               $this->error('更新失败');
           }
       }
       else{
      $types=config('featured.featured_type');
      $this->assign('types',$types);
      return $this->fetch();
        }
  }
}
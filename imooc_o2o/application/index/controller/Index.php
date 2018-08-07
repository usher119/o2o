<?php
namespace app\index\controller;
use think\Controller;

class Index extends Base
//class Index extends Controller
{
    public function index()
    {
        //dump(input('param.'));exit;
        //return [1,2];
        // 获取首页大图 相关数据
        // 获取广告位相关的数据
        // 商品分类 数据-美食 推荐的数据
       // $types=config('featured.featured_type');
        //dump($types);

        //dump($ss);die;
        $datas = model('Deal')->getNormalDealByCategoryCityId(1, $this->city->id);
        // 获取4个子分类
//         dump($datas);
//         die;
        $meishicates = model('Category')->getNormalRecommendCategoryByParentId(1, 4);
        $ss=$this->getside($type=0);
        $rs=$this->getside(1);
        //dump($meishicates);
        $this->assign('ss',$ss);
        $this->assign('rs',$rs);
        return $this->fetch('',[
            'datas' => $datas,
            'meishicates' => $meishicates,
            'controller' => 'ms',

        ]);
       // return $this->fetch();
    }
    public function getside($type)
    {
        $types=config('featured.featured_type');
        $side=model('Featured')->getFeaturedsByType($type);
        return $side;
    }


}

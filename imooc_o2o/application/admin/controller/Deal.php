<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/5/31
 * Time: 下午1:07
 */
namespace app\admin\controller;
use think\Controller;

class Deal extends Controller
{
    public function index()
    {
        $data=input();
        $datas=[];
        $arrcate=$arrcity=[];

        if(!empty($data['category_id']))
        {
            $datas['category_id']=$data['category_id'];
        }

        if(!empty($data['city_id']))
        {
            $datas['city_id']=$data['city_id'];
        }

        if(!empty($data['start_time']) && !empty($data['end_time'])&& strtotime($data['end_time'])-strtotime($data['start_time'])>0)
        {
            $datas['create_time']=[
                ['gt',strtotime($data['start_time'])],
                ['lt',strtotime($data['end_time'])]
            ];
        }

        if(!empty($data['name']))
        {
            $datas['name']=['like','%'.$data['name'].'%'];
        }


        $category=model('Category')->getNormalFirstCategory( );
        foreach ($category as $arr)
        {

              $arrcate[$arr->id]=$arr->name;
        }
//        dump($arrcate);
//        die;

        $city=model('City')->getNormalCitys( );
        foreach ($city as $arr1)
        {

            $arrcity[$arr1->id]=$arr1->name;
        }

        $deal=model('Deal')->getNormalDeals($datas);


        return $this->fetch('index',
            [
                'Category' => $category,
                'City' =>$city,
                'Deal' => $deal,
                'arrcate'=>$arrcate,
                'arrcity'=>$arrcity,
                'category_id'=>empty($data['category_id'])?'':$data['category_id'],
                'city_id'=>empty($data['city_id'])?'':$data['city_id'],
                'name'=>empty($data['name'])?'':$data['name'],
                'start_time'=>empty($data['start_time'])?'':$data['start_time'],
                'end_time'=>empty($data['end_time'])?'':$data['end_time'],
        ]
        );


    }
    public function apply()
    {
        $deal=model('Deal')->getNormalDealByParentId( );
          $this->assign('deal',$deal);
        return $this->fetch();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: usher
 * Date: 2018/5/30
 * Time: 下午2:12
 */
namespace app\bis\validate;
use think\Validate;

class Bis extends Validate
{
    protected  $rule = [
        ['username','require|max:20|min:3','必须填写用户名'],
        ['password','require','必须填写密码']
    ];
}
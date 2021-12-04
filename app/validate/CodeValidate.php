<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class CodeValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'title'=>"require|max:20",
        'Id'=>"require|max:20",
        'url'=>"require|max:255"
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'title.require'=>"标题不能为空",
        'Id.require'=>"参数错误",
        'url.require'=>"地址不能为空",
   ];

    protected $scene=[
        "add"=>['title','url'],
        "delete"=>['Id'],
        "update"=>['title','url','Id'],
        "addStroke"=>['title']
    ];
}

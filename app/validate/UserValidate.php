<?php
declare (strict_types = 1);

namespace app\validate;


class UserValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username'  =>  'require|max:25',
        'password' =>  'require|max:50',
        'repassword'=>'require|confirm:password',
        "email"=>"require|email",
        "name"=>"require|max:25",
        "oldPassword"=>"require|max:50",
        "newPassword"=>"require|max:50",
        "rePassword"=>"require|confirm:newPassword",
        "content"=>"require|max:1000",
        "contact"=>"max:30"
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */
    protected $message = [
        "username.require"=>"用户名必须填",
        "password.require"=>"密码必须要填",
        "repassword.require"=>"重复密码必须要填",
        "repassword.confirm"=>"两次密码要一致",
        "email.require"=>"邮箱必须要填",
        "email.email"=>"邮箱格式不正确",
        "name.require"=>"昵称必须填",
        "oldPassword.require"=>"原密码必须要填",
        "newPassword.require"=>"新密码必须要填",
        "rePassword.require"=>"重复密码必须要填",
        "rePassword.confirm"=>"两次密码要一致",
        "content.require"=>"说点什么吧",
        "contact.max"=>"联系方式也太长了吧"
    ];
    protected $scene=[
        "login"=>['username','password'],
        "reg"=>['username','password',"repassword","email"],
        "updatePass"=>['oldPassword','newPassword',"rePassword"],
        "updateName"=>['name'],
        "feedback"=>['content','contact'],
        "edit"=>['username']
    ];
}

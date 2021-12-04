<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\View;
use app\BaseController;
use app\model\User as UserModel;
use app\validate\UserValidate;
use think\facade\Cache;
class User extends BaseController
{
    protected $middleware = ['user'];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return 1;
    }
    // MVC
    public function login(){
        // GET POST  url   www.baidu.com/user/login?user="1123"&pass="12312";  body
       if(request()->method()=="GET"){
           return View::fetch();
       }else{
          (new UserValidate())->goCheck('login');   //做参数验证
           $res=(new UserModel())->login();

           return self::showData(200,'登录成功',$res);
       }

    }
    public function user()
    {
        $res=(new UserModel())->getUserList();
        View::assign('userList',$res);
        return View::fetch();
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}

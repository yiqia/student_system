<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\View;
use app\BaseController;
use app\model\User as UserModel;
use think\facade\Cache;
use app\model\System as SystemModel;
class System extends BaseController
{
    protected $middleware = ['student'];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $userInfo = (new UserModel())->getUserInfo($request->session_token);
        if($userInfo['power']===0){
            Header("Location:/student/stroke");
            exit();
        }
        $res=(new SystemModel())->getSystem();
        View::assign('system',$res);

        return View::fetch('index');
        //
    }
    public function update(){
        $res=(new SystemModel())->up();
        if($res)return self::showData(200,'更新成功');
    }
    public function closeLogin(){
        Cache::clear();
        Header("Location:/user/login");
    }
}

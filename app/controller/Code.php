<?php
declare (strict_types = 1);

namespace app\controller;
use think\Request;
use think\facade\View;
use app\BaseController;
use app\model\User as UserModel;
use app\model\Code as CodeModel;
use app\validate\CodeValidate;

class Code extends BaseController
{
    protected $middleware = ['student'];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $res=(new CodeModel())->getCode();
        View::assign('codes',$res);
        return View::fetch();
    }

    public function add(){
        (new CodeValidate())->goCheck('add');
        $res=(new CodeModel())->add();
        if($res)return self::showData(200,'添加成功');
    }
    public function delete(){
        (new CodeValidate())->goCheck('delete');
        $res=(new CodeModel())->del();
        if($res)return self::showData(200,'删除成功');
    }
    public function update(){
        (new CodeValidate())->goCheck('update');
        $res=(new CodeModel())->up();
        if($res)return self::showData(200,'更新成功');
    }
    public function getCodeOne(){
        (new CodeValidate())->goCheck('delete');
        $res=(new CodeModel())->getCodeOne();
        if($res)return self::showData(200,'查询成功',$res);
    }

    // 校内活动监测
    public function stroke()
    {
        $res=(new CodeModel())->getStroke();
        View::assign('strokes',$res);
        return View::fetch();
    }
    public function addStroke(){
        (new CodeValidate())->goCheck('addStroke');
        $userInfo = (new UserModel())->getUserInfo();
        $res=(new CodeModel())->addStroke($userInfo['Id']);
        if($res)return "<script>alert('成功');window.location.href=\"http://www.baidu.com\";</script>";
    }
    public function deleteStroke(){
        (new CodeValidate())->goCheck('deleteStroke');
        $res=(new CodeModel())->deleteStroke();
        if($res)return self::showData(200,'删除成功');
    }
    public function updateStroke(){
        (new CodeValidate())->goCheck('update');
        $res=(new CodeModel())->updateStroke();
        if($res)return self::showData(200,'更新成功');
    }
    public function getCodeOneStroke(){
        (new CodeValidate())->goCheck('delete');
        $res=(new CodeModel())->getCodeOneStroke();
        if($res)return self::showData(200,'查询成功',$res);
    }

}

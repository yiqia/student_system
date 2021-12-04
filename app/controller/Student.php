<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\View;
use think\facade\Cookie;
use think\facade\Cache;
use app\BaseController;
use app\model\User as UserModel;
use app\validate\StudentValidate;
use app\model\Student as StudentModel;
class Student extends BaseController
{
    protected $middleware = ['student'];
    /**
     * 显示资源列表
     *
     * @return string
     */
    public function index(Request $request)
    {
        $userInfo = (new UserModel())->getUserInfo($request->session_token);
        if($userInfo['power']===0){
            Header("Location:/student/stroke");
            exit();
        }
        View::assign('userInfo',$userInfo);
        return View::fetch('index');
    }
    public function student(){
        $res=(new StudentModel())->getStudent();
        View::assign('students',$res);
        return View::fetch();
    }
    // 学生信息的增删查改
    public function add(){
        (new StudentValidate())->goCheck('add');
        $res=(new StudentModel())->add();
        if($res)return self::showData(200,'添加成功');
    }
    public function delete(){
        (new StudentValidate())->goCheck('delete');
        $res=(new StudentModel())->del();
        if($res)return self::showData(200,'删除成功');
    }
    public function update(){
        (new StudentValidate())->goCheck('update');
        $res=(new StudentModel())->up();
        if($res)return self::showData(200,'更新成功');
    }
    public function getStudentOne(){
        (new StudentValidate())->goCheck('delete');
        $res=(new StudentModel())->getStudentOne();
        if($res)return self::showData(200,'查询成功',$res);
    }

    // 学生行程监测的增删查改
    public function stroke(){
        $userInfo = (new UserModel())->getUserInfo();
        View::assign('userInfo',$userInfo);
        return View::fetch();
    }
    public function strokes(){
        $res=(new StudentModel())->getStroke();
        View::assign('strokes',$res);
        return View::fetch('strokes');
    }
    public function strokeOne(){
        (new StudentValidate())->goCheck('delete');

        $res = (new StudentModel())->getStudentStrokeOne();
        View::assign('strokes',$res);
        return View::fetch('stroke_one');
    }
    public function addStroke(){
        (new StudentValidate())->goCheck('addStroke');
        $res=(new StudentModel())->addStroke();
        if($res)return self::showData(200,'添加成功');
    }
    public function deleteStroke(){
        (new StudentValidate())->goCheck('delete');
        $res=(new StudentModel())->deleteStroke();
        if($res)return self::showData(200,'删除成功');
    }
    public function getStudentStrokeOne(){
        (new StudentValidate())->goCheck('delete');
        $res=(new StudentModel())->getStudentStrokeOne();
        if($res)return self::showData(200,'查询成功',$res);
    }


}

<?php
declare (strict_types = 1);

namespace app\model;
use think\facade\Db;
use think\Model;
use app\lib\exception\BaseException;
/**
 * @mixin \think\Model
 */
class Student extends Model
{
    // add 添加新的数据 del 删除数据 up 更新数据 show 查看数据
    public function add(){
        $data=request()->post();
        Db::name("student")->insert($data);
        return true;
    }
    public function del(){
        $data=request()->get();
        $res = Db::name('student')->where("Id",$data['Id'])->delete();
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'删除失败','errorCode'=>10003]);
    }
    public function up(){
        $data=request()->post();
        $Id=$data['Id'];
        unset($data->Id);
        $res = Db::name("student")->where("Id",$Id)->update($data);
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'更新失败','errorCode'=>10003]);
    }
    public function getStudent(){
        $res = Db::name('student')->select();
        return $res;
    }
    public function getStudentOne(){
        $data=request()->get();
        $res = Db::name('student')->where("Id",$data['Id'])->select();
        return $res;
    }

    // 学生行程相关增删查改
    public function addStroke(){
        $data=request()->post();
        $data['creat_time']=date('Y-m-d H:i:s');
        Db::name("stroke")->insert($data);
        return true;
    }
    public function deleteStroke(){
        $data=request()->get();
        $res = Db::name('stroke')->where("Id",$data['Id'])->delete();
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'删除失败','errorCode'=>10003]);
    }
    public function getStroke(){
        $res = Db::name('stroke')->alias('s')->leftJoin('student st','st.Id=s.student_id')
            ->field('s.Id,s.student_id,s.start_time,s.end_time,s.start_address,s.end_address,s.traffic,s.train_number,s.temperature,s.creat_time,
            st.name,st.header,st.number')
            ->select();
        return $res;
    }
    public function getStudentStrokeOne(){
        $data=request()->get();
        $res = Db::name('stroke')->alias('s')->leftJoin('student st','st.Id=s.student_id')
            ->field('s.Id,s.student_id,s.start_time,s.end_time,s.start_address,s.end_address,s.traffic,s.train_number,s.temperature,s.creat_time,
            st.name,st.header,st.number')->where("student_id",$data['Id'])->select();
        return $res;
    }
}

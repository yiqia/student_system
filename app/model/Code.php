<?php
declare (strict_types = 1);

namespace app\model;

use think\facade\Db;
use think\Model;
use app\lib\exception\BaseException;
/**
 * @mixin \think\Model
 */
class Code extends Model
{
    //
    public function add(){
        $data=request()->post();
        $data['creat_time']=date('Y-m-d H:i:s');
        Db::name("code")->insert($data);
        return true;
    }
    public function del(){
        $data=request()->get();
        $res = Db::name('code')->where("Id",$data['Id'])->delete();
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'删除失败','errorCode'=>10003]);
    }
    public function up(){
        $data=request()->post();
        $Id=$data['Id'];
        unset($data->Id);
        $res = Db::name("code")->where("Id",$Id)->update($data);
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'更新失败','errorCode'=>10003]);
    }
    public function getCode(){
        $res = Db::name('code')->select();
        return $res;
    }
    public function getCodeOne(){
        $data=request()->get();
        $res = Db::name('code')->where("Id",$data['Id'])->select();
        return $res;
    }
    // 校内活动监测

    public function addStroke($Id){
        $data=request()->get();
        $data['student_id']=$Id;
        $data['creat_time']=date('Y-m-d H:i:s');
        Db::name("log")->insert($data);
        return true;
    }
    public function deleteStroke(){
        $data=request()->get();
        $res = Db::name('log')->where("Id",$data['Id'])->delete();
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'删除失败','errorCode'=>10003]);
    }
    public function updateStroke(){
        $data=request()->post();
        $Id=$data['Id'];
        unset($data->Id);
        $res = Db::name("log")->where("Id",$Id)->update($data);
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'更新失败','errorCode'=>10003]);
    }
    public function getStroke(){
        $res = Db::name('log')->alias('l')->leftJoin('admin a','a.Id=l.student_id')->leftJoin('student st','st.number=a.username')
            ->field('l.Id,l.title, l.creat_time,st.name,st.header,st.number')->select();

        return $res;
    }
    public function getCodeOneStroke(){
        $data=request()->get();
        $res = Db::name('log')->where("Id",$data['Id'])->select();
        return $res;
    }
}

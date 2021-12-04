<?php
declare (strict_types = 1);

namespace app\model;

use think\facade\Db;
use app\lib\exception\BaseException;
use think\Model;

/**
 * @mixin \think\Model
 */
class System extends Model
{
    //
    public function up(){
        $data=request()->post();
        $res = Db::name("system")->where("Id",1)->update($data);
        if($res)return true;
        throw new BaseException(['code'=>400,'msg'=>'更新失败','errorCode'=>10003]);
    }
    public function getSystem(){
        $res = Db::name('system')->where('Id',1)->find();
        return $res;
    }
}

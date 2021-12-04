<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;
use think\facade\Db;
use app\lib\exception\BaseException;
use think\facade\Cache;
/**
 * @mixin \think\Model
 */
class User extends Model
{
    protected $name = 'admin';
   public function login(){
       $data=request()->post();
       $password=md5($data['password']);    // 密码MD5加密
       $res=Db::name('admin')->where('username',$data['username'])->where('password',$password)->find();
       if($res){
            // token
           $session_key=md5(uniqid(md5(strval(microtime(true)).$data['username']),true));
           $hcToken=strval(Cache::get($data['username']));

           $hcUser=Cache::get($hcToken);

           if($hcUser){
               Cache::delete($hcToken);
           }

           Cache::set($session_key,$data['username'],"7200");
           Cache::set($data['username'],$session_key,"7200");


           $userInfo=(new User())->getUserInfo($session_key);
           session('userInfo',$userInfo);
           return ['token'=>$session_key,'userInfo'=>$userInfo];
       }else{
           throw new BaseException(['code'=>208,'msg'=>'用户不存在或者密码错误','errorCode'=>10003]);
       }



   }
    //通过token获取用户信息
    public function getUserInfo($session_key=false){
        if($session_key){
            $token=$session_key;
        }else{
            if((array_key_exists('session_token',$_COOKIE))){
                $token=$_COOKIE['session_token'];
            }else{
                return false;
            }
        }
        $user=Cache::get(strval($token));
        $student=Db::name('admin')->alias('a')->leftJoin('student s','s.number=a.username')->where('a.username',$user)->field(['a.Id','s.class','s.dormitory','s.id_card','s.major','s.name','s.number','a.power','s.sex','s.teacher','a.username'])->find();
        $student=array_diff_key($student,['password'=>"1"]);
        if($student){
            return $student;
        }else{
            return false;
        }
    }
    public function getUserList(){
        $user=Db::name('admin')->field(['Id','username','power'])->select();
        if($user){
            return $user;
        }else{
            return false;
        }
    }
}
